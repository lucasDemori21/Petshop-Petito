@include('parts.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">

<div class="container-shop">
    <div class="nav-categorias">
        <span class="title ms-5" style="font-family: 'Cotane Beach', sans-serif; font-size: 25px;">Categoria</span>
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


                        <div id="carrouselProduct{{$item->id_produto}}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($imgs as $img)
                                    <div class="carousel-item active p-1" data-bs-interval="5000">
                                        <img src="{{ asset('storage/images/produtos/' . $img) }}" class="d-block w-100" alt="IMAGEM TESTE">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carrouselProduct{{$item->id_produto}}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carrouselProduct{{$item->id_produto}}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>
                    <div class="bloco-produto d-flex flex-column ">
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
