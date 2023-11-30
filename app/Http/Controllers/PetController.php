<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function exibirPets(String|int $id): View{

        $user = 'id_cliente';
        if(Auth::guard('funcionario')->check()){
            $user = 'id_func';
        }

        $pets = DB::table('pets')->where($user, $id)->get();

        return view('shop.services',['pets' => $pets]);

    }
}
