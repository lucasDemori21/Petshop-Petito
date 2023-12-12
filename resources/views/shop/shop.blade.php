@include('parts.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">

<div class="container-shop">
    <div class="nav-categorias">
        <span class="title" style="font-family: 'Cotane Beach', sans-serif; font-size: 25px;">Categoria</span>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Ração</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Petisco</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Brinquedo</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Roupa</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Para dormir</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Higiene</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Acessorio de transporte</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Acessorio de alimentação</a>
    </div>
    <div class="container-produtos">
        @foreach ($produto as $item)
            <a href="{{ route('show.produto', $item->id_produto) }}" class="produtos">
                <div class="bloco">
                    <div class="bloco-produto mt-1">
                        <?php $imgs = explode(',', $item->img_produto); ?>

                            @foreach ($imgs as $img)
                                <img src="{{ asset('storage/images/produtos/' . $img) }}" class="img-fluid mt-4" width="200px" alt="IMAGEM TESTE">
                            @endforeach

                    </div>
                    <div class="bloco-produto d-flex flex-column mt-2">
                        <span>{{ $item->titulo }}</span>
                        <span>
                            {{ 'R$ ' . number_format($item->valor, 2, ',', '.') }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
</body>

</html>
