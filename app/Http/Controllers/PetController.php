<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function exibirPets(): View{
        $id = '';
        $user = '';

        if(Auth::guard('funcionario')->check()){
            $id = Auth::guard('funcionario')->user()->id_func;
            $user = '1';

        }else if(Auth::guard('cliente')->check()){
            $id = Auth::guard('cliente')->user()->id_cliente;
            $user = '2';
        }

        $pets = DB::table('pet')->where(['tipo_user' => $user, 'id'=> '1'])->get();// configurar migration e ajeitar a query para os pets

        return view('shop.services', ['pets' => $pets]);

    }

    public function cadastrarPet(Request $request){

        $request->validate([
            'nome' => 'required',
            'pet' => 'required',    
            'sexo' => 'required',    
            'data_nasc' => 'required',    
            'castrado' => 'required',    
            'raca' => 'required',    
            'peso' => 'required',    
            'img_pet' => 'required|image|mimes:jpeg,png,jpg,gif',    
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'pet.required' => 'O campo pet é obrigatório',    
            'sexo.required' => 'O campo sexo é obrigatório',    
            'data_nasc.required' => 'O campo idade é obrigatório',    
            'castrado.required' => 'O campo castrado é obrigatório',    
            'raca.required' => 'O campo raça é obrigatório',    
            'peso.required' => 'O campo peso é obrigatório',    
            'img_pet.*.required' => 'É obrigatório escolher uma imagem para seu produto.',
            'img_pet.*.image' => 'O arquivo deve ser uma imagem.',
            'img_pet.*.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',    
        ]);

        $fileNames = '';

        foreach ($request->file('img_pet') as $file) {
            $hashFile = md5($file->getClientOriginalName() . microtime()) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images/pets/', $hashFile);
            $fileNames .= $hashFile;
        }

        $data = $request->all();
        $data['foto'] = $fileNames;

        

        return redirect()->route('')->with('','');

    }
}
