<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Funcionario;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(): View{
        return view('index');
    }

    public function showLogin():View
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::guard('cliente')->logout();
        Auth::guard('funcionario')->logout();
        return redirect()->route('login.show');

    }

    public function cadastrar(Request $request){
        $request->validate(
            [
                'nome' => 'required',
                'email' => 'required|email',
                'cpf' => 'required',
                'data' => 'required|date|before:' . now()->subYears(18)->format('Y-m-d'),
                'telefone' => 'required',
                'password' => 'required|min:4',
                'telefone' => 'required',
                'bairro' => 'required',
                'estado' => 'required',
                'cidade' => 'required',
                'numero' => 'required'
            ], [
                'nome.required' => 'O campo "Nome Completo" precisa ser preenchido!',

                'email.required' => 'O campo "E-mail" precisa ser preenchido!',
                'email.email' => 'E-mail inválido',

                'cpf.required' => 'O campo "CPF" precisa ser preenchido!',

                'data.required' => 'O campo "Data de nascimento" precisa ser preenchido!',
                'data.date' => 'O campo "Data de nascimento" precisa ser uma data válida!',
                'data.before' => 'Você precisa ser maior de 18 anos para efetuar compras nesse site!',

                'password.required' => 'O campo "Senha" precisa ser preenchido!',
                'password.min' => 'O campo "Senha" precisa ter no minimo min: caracteres!',

                'telefone.required' => 'O campo "Telefone" precisa ser preenchido!',

                'bairro.required' => 'O campo "Bairro" precisa ser preenchido!',

                'estado.required' => 'O campo "Estado" precisa ser preenchido!',

                'cidade.required' => 'O campo "Cidade" precisa ser preenchido!',

                'numero.required' => 'O campo "Número da casa" precisa ser preenchido!',

            ]
        );
            
            // dd($request->nome);
            // dd($request);


            $clienteData = [
                'nome_cliente' => $request->nome,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
                'cpf' => $request->cpf,
                'data_nasc' => $request->data,
                'status' => '1',
                'estado' => $request->estado,
                'cidade' => $request->cidade,
                'bairro' => $request->bairro,
                'rua' => $request->rua,
                'cep' => str_replace('-', '', $request->cep),
                'numero_casa' => $request->numero,
                'complemento' => $request->complemento,
                'celular' => $request->telefone,
            ];

            // dd($clienteData);
            
            $cliente = Cliente::create($clienteData);
        

        if ($cliente){
            $script = "<script>
                           Swal.fire({
                               title: 'Sucesso!',
                               text: 'Cliente cadastrado com sucesso! Faça seu login',
                               icon: 'success',
                               showConfirmButton: false,
                               timer: 2000
                           });

                           setTimeout(() => {
                                document.getElementById('email-cadastro').focus();
                           }, 2000);
                       </script>";
                       
            return back()->with('success', $script);
        }else{
            $errors = $cliente->getErrors();
            $script = "<script>
                           Swal.fire({
                               title: 'Erro!',
                               text: '" . implode('<br>', $errors) . "',
                               icon: 'error',
                               showConfirmButton: true
                           });
                       </script>";

            return back()->withInput()->withErrors($errors)->with('error-cadastro', $script);
        }

 


    }

    public function login(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:4'
            ], [
                'email.required' => 'Campo email é obrigatório.',
                'email.email' => 'Email não é válido.',
                'password.required' => 'password é obrigatória.',
                'password.min' => 'password precisa ser maior que :min caracteres.']
        );

        $credentials = $request->only('email', 'password');

        
        $cliente = Cliente::where('email', $request->email)->first();
        $funcionario = Funcionario::where('email', $request->email)->first();

        if((!$cliente) && (!$funcionario)){
            return back()->withErrors(['error-email-login' => 'Email não cadastrado!'])->withInput();
        }


        if (Auth::guard('cliente')->attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->route('index');
        }

        if (Auth::guard('funcionario')->attempt($credentials)) {
           
            $request->session()->regenerate();
            return redirect()->route('index');
            
        }

        return back()->withErrors(['error-login' => "Senha incorreta!"])->withInput();
    }
}
