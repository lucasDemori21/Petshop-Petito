<?php

namespace App\Http\Controllers;

use App\Mail\EmailResetPassword;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function index(): View
    {
        return view('index');
    }

    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::guard('cliente')->logout();
        Auth::guard('funcionario')->logout();
        return redirect()->route('login.show');
    }

    public function cadastrar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required',
                'email' => 'required|email',
                'cpf' => 'required',
                'data' => 'required|date|before:' . now()->subYears(18)->format('Y-m-d'),
                'telefone' => 'required',
                'password' => 'required|min:4|confirmed',
                'password_confirmation' => 'required|min:4',
                'telefone' => 'required',
                'bairro' => 'required',
                'estado' => 'required',
                'cidade' => 'required',
                'numero' => 'required'
            ],
            [
                'nome.required' => 'O campo "Nome Completo" precisa ser preenchido!',

                'email.required' => 'O campo "E-mail" precisa ser preenchido!',
                'email.email' => 'E-mail inválido',

                'cpf.required' => 'O campo "CPF" precisa ser preenchido!',

                'data.required' => 'O campo "Data de nascimento" precisa ser preenchido!',
                'data.date' => 'O campo "Data de nascimento" precisa ser uma data válida!',
                'data.before' => 'Você precisa ser maior de 18 anos para efetuar compras nesse site!',

                'password.required' => 'O campo "Senha" precisa ser preenchido!',
                'password.min' => 'O campo "Senha" precisa ter no minimo min: caracteres!',
                'password.confirmed' => 'As senhas precisam ser idênticas.',
                'password_confirmation.required' => 'O campo "Confirmar senha" é obrigatório.',

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


        if ($cliente) {
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
        } else {
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



        $credentials = $request->only('email', 'password');


        $cliente = Cliente::where('email', $request->email)->first();
        $funcionario = Funcionario::where('email', $request->email)->first();

        if ((!$cliente) && (!$funcionario)) {
            return back()->withErrors(['error-email-login' => 'Email não cadastrado!'])->withInput();
        }


        if (Auth::guard('cliente')->attempt($credentials)) {

            $request->session()->regenerate();

            $scriptSuccess = "<script>
                                Swal.fire({
                                    title: 'Sucesso!',
                                    text: 'Login realizado com sucesso!',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            </script>";

            return redirect()->route('index')->with(['login' => $scriptSuccess]);
        }

        if (Auth::guard('funcionario')->attempt($credentials)) {

            $request->session()->regenerate();

            $scriptSuccess = "<script>
                                Swal.fire({
                                    title: 'Sucesso!',
                                    text: 'Login realizado com sucesso!',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                setTimeout(() => {
                                    document.getElementById('email-cadastro').focus();
                                }, 2000);
                            </script>";

            return redirect()->route('index')->with(['login' => $scriptSuccess]);
        }

        return back()->withErrors(['error-login' => "Senha incorreta!"])->withInput();
    }

    public function sendEmailResetPassword(Request $request)
    {

        $cliente = Cliente::where('email', $request->remember_email)->first();
        $funcionario = Funcionario::where('email', $request->remember_email)->first();

        if ($cliente || $funcionario) {

            $token = Str::random(40);
            $dominio = URL::to('/');
            $url = $dominio . '/reset-password?token=' . $token;

            PasswordReset::create(['email' => $request->remember_email, 'token' => $token]);

            $data = [
                'url' => $url,
                'email' => $request->remember_email,
                'title' => 'Redefinição de senha',
                'body' => 'Por favor, click no link para redefinir sua senha.'
            ];


            Mail::to($request->remember_email)->send(new EmailResetPassword($data));

            $script = "<script>
                            Swal.fire({
                                title: 'Sucesso!',
                                text: 'Verifique seu email e clique no link enviado para realizar a alteração da senha.',
                                icon: 'success',
                                showConfirmButton: true
                            });
                        </script>";

            return back()->with(['verify' => $script]);
        } else {

            $script = "<script>
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Email não cadastrado.',
                                icon: 'error',
                                showConfirmButton: true
                            });
                        </script>";
            return back()->with(['verify' => $script]);
        }
    }

    public function showResetPassword(Request $request)
    {

        $token = $request->token;
        $data = PasswordReset::where('token', $token)->get();

        if (count($data) == 0) {
            return redirect()->route('index');
            // dd($token);
        }

        return view('auth.resetPassword');
    }

    public function updatePassword(Request $request)
    {

        // dd($request);

        $request->validate([
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required|min:4'
        ], [
            'password.required' => 'O campo "Senha" é obrigatório.',
            'password.confirmed' => 'As senhas precisam ser idênticas.',
            'password.min' => 'Sua senha precisa ter no mínimo :min caracteres.',
            'password_confirmation.required' => 'O campo "Confirmar senha" é obrigatório.',
        ]);


        $user = Cliente::where('email', $request->email)->first();

        if (!$user) {
            $user = Funcionario::where('email', $request->email)->first();
        }

        if ($user->update(['password' => Hash::make($request->password)])) {

            PasswordReset::where('email', $request->email)->delete();

            $script = "<script>
                            Swal.fire({
                                title: 'Sucesso!',
                                text: 'Senha alterada com sucesso.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        </script>";
            return redirect()->route('login.show')->with(['updatePass' => $script]);
        }

        $script = "<script>
                        Swal.fire({
                            title: 'Erro',
                            text: 'Ocorreu algum erro ao atualizar sua senha, tente novamente mais tarde.',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    </script>";
        return back()->with(['updatePass' => $script]);
    }
}
