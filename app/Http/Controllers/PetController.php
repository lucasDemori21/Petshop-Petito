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

        $pets = DB::table('pets')->where(['tipo_user' => $user, 'id'=> '1'])->get();// configurar migration e ajeitar a query para os pets

        return view('shop.services', ['pets' => $pets]);

    }

    public function cadastrarPet(Request $request){

    }
}
