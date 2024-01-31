@include('parts.navbar')

<form action="{{ route('show.checkout') }}" method="POST">
    @csrf

    @foreach ($produtos as $produto)
        <div class="container-car d-flex mx-auto w-50 flex-column produto shadow p-3 bg-body-tertiary rounded"
            style="background-color: beige" data-valor="{{ $produto->valor }}">
            <div class="h5 py-2 text-dark flex-row">
                <div class="d-flex flex-row flex-wrap">
                    <span><img width="70%" style="min-width: 150px; max-width: 250px;"
                            src="storage/images/produtos/{{ explode(',', $produto->img_produto)[0] }}"
                            alt="Imagem produto"></span>
                    <span class="mx-2">
                        {{ $produto->titulo }}
                    </span>

                    <span class="id-produto d-none">{{ $produto->id_produto }}</span>
                    <span class="valor-produto mx-5">{{ $produto->valor }}</span>

                    <label for="qtd">Quantidade: </label>
                    <input type="number" class="text-center quantidade ms-3" style="width: 50px; height: 25px"
                        name="qtd-{{ $produto->id_produto }}" id="qtd" value="1"
                        max="{{ $produto->qtd_produto }}" data-qtd-estoque="{{ $produto->qtd_produto }}">
                </div>
                <span class="d-flex justify-content-end" style="font-size: 15px;">Tem {{ $produto->qtd_produto }} un em
                    estoque</span>

            </div>
        </div>
    @endforeach

    <div class="w-100 d-flex justify-content-end p-3">
        <div class="d-flex justify-content-end flex-column shadow p-4 bg-body-tertiary rounded"
            style="background-color: transparent">
            <div class="title">
                <h3>Resumo do pedido:</h3>
            </div>
            <div class="my-1">
                Quantidade: <span id="qtdTotal">0 un</span>

            </div>
            <div class="my-1">
                Valor total: <span id="valorTotal">R$ 0.00</span>
                <input type="hidden" name="valorTotal" id="reqValorTotal">
            </div>
            <div class="d-flex flex-row mt-2">
                <a class="btn btn-primary mx-1" href="{{ route('shop.search') }}">Continuar comprando</a>
                <button type="submit" class="btn btn-success mx-1">Finalizar</button>
            </div>
        </div>
    </div>

</form>
<script src="/js/carrinho.js"></script>
