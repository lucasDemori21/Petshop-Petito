@include('parts.navbar')

<div class="d-flex mx-auto flex-column">

    
    @foreach ($updateProduto as $produto)
    
    
    
    <form action="#" method="post" class="d-flex flex-column w-50 mx-auto">
        @csrf
        <input type="text" class="form-control mt-3" name="tituto" id="tituto" class="mt-4" value=" {{ $produto->titulo }}"/>
        <input type="text" class="form-control mt-3" name="descricao" id="descricao" class="mt-4" value=" {{ $produto->descricao }}"/>
        <input type="text" class="form-control mt-3" name="qtd_produto" id="qtd_produto" class="mt-4" value=" {{ $produto->qtd_produto }}"/>
        <input type="text" class="form-control mt-3" name="valor" id="valor" class="mt-4" value=" {{ $produto->valor }} "/>

        <select class="form-select mt-3" name="id_categoria" required>
            <option selected disabled>Selecione</option>
            @foreach ($categoria as $categorias)
                <option value="{{ $categorias->id_categoria }}"
                    {{ $produto->id_categoria == $categorias->id_categoria ? 'selected' : '' }}>
                    {{ $categorias->nome_categoria }}
                </option>
            @endforeach
        </select>
        
        <?php $imgs = explode(',', $produto->img_produto)?>

        <input type="file" class="form-control mt-3" class="mt-4" name="img_produto" id="img_produto"/>


        @foreach ($imgs as $img)

            <img src="{{ $img }}" class="img-fluid mt-4" width="200px" alt="IMAGEM TESTE">
       
        @endforeach

        <button type="submit" href="{{route('show.update', $produto->id_produto)}}" class="btn btn-success mt-4 w-25">Editar anuncio</button>
        </form>
       
         
    @endforeach
</div>


</body>