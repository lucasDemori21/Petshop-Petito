<?php

namespace App\Http\Controllers;

use App\Models\Pets;
use App\Models\Agendamento;
use App\Models\Funcionario;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PetController extends Controller
{
    public function exibirPets(): View
    {
        $id = '';
        $user = '';


        if (Auth::guard('funcionario')->check()) {
            $id = Auth::guard('funcionario')->user()->id_func;
            $user = '1';
        } else if (Auth::guard('cliente')->check()) {
            $id = Auth::guard('cliente')->user()->id_cliente;
            $user = '2';
        }

        $pets = DB::table('pets')->where(['dono' => $user, 'usn_cod' => $id])->get();

        return view('shop.services', ['pets' => $pets]);
    }

    public function cadastrarPets(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'tipo_pet' => 'required',
            'sexo' => 'required',
            'data_nasc' => 'required',
            'castrado' => 'required',
            'raca' => 'required',
            'peso' => 'required',
            'img_pet' => 'required|image|mimes:jpeg,png,jpg,gif',
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'tipo_pet.required' => 'O campo pet é obrigatório',
            'sexo.required' => 'O campo sexo é obrigatório',
            'data_nasc.required' => 'O campo idade é obrigatório',
            'castrado.required' => 'O campo castrado é obrigatório',
            'raca.required' => 'O campo raça é obrigatório',
            'peso.required' => 'O campo peso é obrigatório',
            'img_pet.required' => 'É obrigatório escolher uma imagem para seu pet.',
            'img_pet.image' => 'O arquivo deve ser uma imagem.',
            'img_pet.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
        ]);

        $file = $request->file('img_pet');

        $hashFile = md5($file->getClientOriginalName() . microtime()) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/pets/', $hashFile);
        $fileNames = $hashFile;

        $data = $request->all();
        $data['img_pet'] = $fileNames;
        $data['peso'] = number_format($data['peso'], 3, '.', '');
        $data['raca'] = $request->raca;

        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
        }

        Pets::create($data);

        return redirect()->route('show.servicos')->with('status_cadastro', 'success');
    }

    public function showAgendamento(String|int $id){
        $pet = Pets::where('id_pet', $id)->get();
        $func = Funcionario::all();
        
        return view('shop.agendamento', ['pet' => $pet, 'func' => $func]);
    }

    public function agendar(String|int $id, Request $request){

        $request->validate([
            'procedimento' => 'required',
            'horario' => 'required',
            'data' => [
                'required',
                'date',
                'after_or_equal:' . now()->toDateString(),
                'before_or_equal:' . now()->addYear()->toDateString(),
            ],
            'descricao' => 'required',
            'id_func' => 'required',
        ], [
            'horario.required' => 'O campo horário é obrigatório',
            'procedimento.required' => 'O campo procedimento é obrigatório',
            'descricao.required' => 'O campo procedimento é obrigatório',
            'id_func.required' => 'O campo procedimento é obrigatório',
            'data.required' => 'O campo data é obrigatório',
            'data.after_or_equal' => 'A data não pode ser anterior a hoje',
            'data.before_or_equal' => 'A data não pode ser mais de 1 ano para frente',
        ]);
        
        $data = $request->only(['descricao', 'id_func']);
        
        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
            $data['nomeDono'] = Auth::guard('funcionario')->user()->nome_func;
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
            $data['nomeDono'] = Auth::guard('cliente')->user()->nome_cliente;
        }

        $procedimento = DB::table('procedimento')->where('id_procedimento', $request->procedimento)->first();
        $data['id_procedimento'] = $procedimento->id_procedimento;
        $data['id_pet'] = $id;
        $data['data'] = $request->data . ' ' . $request->horario;
        $data['valor'] = $procedimento->valor;
        $data['created_at'] = now();
        $data['updated_at'] = now();
        $data['forma_pagamento'] = 'Crédito(Fixo)';
        
        if(Agendamento::insert($data)){   
            return redirect()->back()->with('status_agendamento', 'Agendamento realizado com sucesso');
        }else{
            return redirect()->back()->withErrors('errors', 'Falha ao realizar o agendamento');
        }
    }

    public function exibirPet(){
        $id = '';
        $user = '';

        if (Auth::guard('funcionario')->check()) {
            $id = Auth::guard('funcionario')->user()->id_func;
            $user = '1';
        } else if (Auth::guard('cliente')->check()) {
            $id = Auth::guard('cliente')->user()->id_cliente;
            $user = '2';
        }

        $pet = Pets::where(['dono' => $user, 'usn_cod' => $id])->get();

        return view('conta.pets', ['pet' => $pet]);
    }

    public function exibirAgendamento(): View{
        $id = '';
        $user = '';

        if (Auth::guard('funcionario')->check()) {
            $id = Auth::guard('funcionario')->user()->id_func;
            $user = '1';
            
        } else if (Auth::guard('cliente')->check()) {
            $id = Auth::guard('cliente')->user()->id_cliente;
            $user = '2';
        }
        $agendamento = Agendamento::join('funcionario', 'funcionario.id_func', '=', 'agendamento.id_func')
            ->join('pets', 'pets.id_pet', '=', 'agendamento.id_pet')
            ->join('procedimento', 'procedimento.id_procedimento', '=', 'agendamento.id_procedimento')
            ->where(['agendamento.dono' => $user, 'agendamento.usn_cod' => $id])
            ->select('agendamento.id_agendamento', 'pets.nome', 'funcionario.nome_func', 'agendamento.data', 'procedimento.titulo', 'agendamento.descricao')->get();



        // dd($agendamento);
        return view('conta.agendamento', ['agendamento' => $agendamento]);

    }

    public function updatePet(String|int $id): View{

        $pet = Pets::where('id_pet', $id)->first();

        return view('conta.updatePet', ['pet' => $pet]);
    }
}
