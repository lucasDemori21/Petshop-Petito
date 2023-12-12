@include('parts.navbar')

<div class="d-flex mx-auto flex-column">

    
    @foreach ($dados as $produto)
    
    @if(auth('funcionario')->check())
        <a href="{{route('show.update', $produto->id_produto)}}" class="btn btn-warning w-25">Editar anuncio</a>
    @endif

        <span class="mt-4">{{ $produto->titulo }}</span>
        <span class="mt-4">{{ $produto->descricao }}</span>
        <span class="mt-4">{{ $produto->qtd_produto }}</span>
        <span class="mt-4">{{ $produto->valor }}</span>
        
        <?php $imgs = explode(',', $produto->img_produto)?>
       
        @foreach ($imgs as $img)

            <img src="{{ asset('storage/images/produtos/' . $img) }}" class="img-fluid mt-4" width="200px" alt="IMAGEM TESTE">
       
        @endforeach
         
    @endforeach
</div>


</body>

</html>
