<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showCadastrarProduto(): View
    {


        $categorias = DB::table('categoria')->get();

        return view('admin.cadastro_produto', ['categoria' => $categorias]);
    }

    public function cadastrarProduto(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'descricao' => 'required|max:255',
            'id_categoria' => 'required',
            'qtd_produto' => 'required|numeric|min:0',
            'img_produto.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'valor' => 'required',
        ], [
            'titulo.required' => 'O campo título é obrigatório.',
            'qtd_produto.required' => 'O campo quantidade é obrigatório.',
            'qtd_produto.min' => 'O campo quantidade não pode ser menor que 0.',
            'titulo.max' => 'O campo título pode conter até :max caracteres.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.max' => 'O campo descrição pode conter até :max caracteres.',
            'id_categoria.required' => 'O campo categoria é obrigatório.',
            'img_produto.*.required' => 'É obrigatório escolher uma imagem para seu produto.',
            'img_produto.*.image' => 'O arquivo deve ser uma imagem.',
            'img_produto.*.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'valor.required' => 'O campo valor é obrigatório.',
        ]);

        $fileNames = '';

        foreach ($request->file('img_produto') as $file) {
            $hashFile = md5($file->getClientOriginalName() . microtime()) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images/produtos/', $hashFile);
            $fileNames .= $hashFile . ',';
        }

        $fileNames = rtrim($fileNames, ',');

        $data = $request->all();
        $data['img_produto'] = $fileNames;

        $valor = preg_replace('/[^0-9,.]/', '', $data['valor']);
        $valor_formatado = str_replace('.', '', $valor);
        $valor_formatado = str_replace(',', '.', $valor_formatado);

        $data['valor'] = $valor_formatado;

        if (Produto::create($data)) {
        // dd($data);
        return redirect()->back()->with('status_cadastro', 'success');
        }
    }

    public function showUpdate(String|int $id): View{
        
        $produto = DB::table('produto')->where('id_produto', $id)->get();
        $categoria = DB::table('categoria')->get();

        
        return view('admin.update_produto', ['updateProduto' => $produto], ['categoria' => $categoria]);
    }
}
