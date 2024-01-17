<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\ItemVenda;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function index(): View
    {
        $produtos = Produto::get();

        // $produtos = DB::table('produto')->get();

        return view('admin.estoque.estoque', ['produtos' => $produtos]);
    }

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
            $file->storeAs('public/images/produtos/', $hashFile);

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
            return redirect()->back()->with('status_cadastro', 'success');
        }
    }

    public function showUpdate(String|int $id): View
    {

        $produto = DB::table('produto')->where('id_produto', $id)->get();
        $categoria = DB::table('categoria')->get();


        return view('admin.update_produto', ['updateProduto' => $produto], ['categoria' => $categoria]);
    }

    public function updateProduto(String|int $id, Request $request)
    {
        // dd($request->all());
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

        $deleteOldImages = explode(',', $request->imgs);

        foreach ($deleteOldImages as $deleteImg) {
            $filePath = 'public/images/produtos/' . $deleteImg;

            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        $fileNames = '';
        foreach ($request->file('img_produto') as $file) {
            $hashFile = md5($file->getClientOriginalName() . microtime()) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/produtos/', $hashFile);
            $fileNames .= $hashFile . ',';
        }
        $fileNames = rtrim($fileNames, ',');

        $data = $request->only('titulo', 'descricao', 'valor', 'qtd_produto', '', '');
        $data['img_produto'] = $fileNames;

        if (DB::table('produto')->where('id_produto', $id)->update($data)) {
            return redirect()->back()->with('status_cadastro', 'success');
        }
    }

    public function destroyProduto(String|int $id)
    {
        $produto = Produto::where('id_produto', $id)->get();

        $deleteOldImages = explode(',', $produto[0]->img_produto);

        foreach ($deleteOldImages as $deleteImg) {
            $filePath = 'public/images/produtos/' . $deleteImg;

            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        ItemVenda::where('id_produto', $id)->delete();

        if (Produto::where('id_produto', $id)->delete()) {
            return 'success';
        }
    }
}
