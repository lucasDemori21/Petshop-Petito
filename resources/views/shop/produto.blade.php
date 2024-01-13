@include('parts.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">

<script src="/js/produto.js"></script>

@foreach ($dados as $produto)
    <?php
    $imgs = explode(',', $produto->img_produto);
    $i = 1;
    ?>
    <div class="card-wrapper">
        <div class="card">
            <div class="product-imgs">
                <div class="img-display">
                    <div class = "img-showcase">
                        @foreach ($imgs as $img)
                            <img src="{{ asset('storage/images/produtos/' . $img) }}" class="d-block w-100"
                                alt="IMAGEM TESTE">
                        @endforeach
                    </div>
                </div>
                <div class="img-select">
                    @foreach ($imgs as $img)
                        <div class = "img-item">
                            <a data-id ="{{ $i }}">
                                <img src="{{ asset('storage/images/produtos/' . $img) }}" class="d-block w-100"
                                    alt="IMAGEM TESTE">
                            </a>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
            <div class="product-content">
                @if (auth('funcionario')->check())
                    <div class="position-absolute" style="top: 15px; right: 15px;">
                        <a href="{{ route('show.update', $produto->id_produto) }}" class="btn btn-light"><i
                                class="bi bi-pen-fill"></i></a>
                    </div>
                @endif
                <div class="text-center mt-3">
                    <span class="fs-5 fw-bold">{{ $produto->titulo }}</span>
                </div>
                <div class="d-flex flex-column ms-3">
                    <label class="form-label fw-bold">Descrição: </label>
                    <p>{{ $produto->descricao }}</p>
                </div>

                <span class="text-center fs-3">Valor: R$ {{ str_replace('.', ',', $produto->valor) }}<p class="fs-5">
                        Ou em até 12x sem juros</p></span>

                
                <div class="btns-group">
                    <button type="button" onclick="addCar(true, {{$produto->id_produto}})" class="btn btn-warning">Adicionar ao carrinho</button>
                    <button type="button" onclick="addCar(false, {{$produto->id_produto}})" class="btn btn-warning">Comprar</button>
                </div>
            </div>
        </div>
    </div>

    </div>
@endforeach
<script src="/js/productDatail.js"></script>
</body>

</html>
