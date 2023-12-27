@include('parts.navbar')



@foreach ($produtos as $produto)
    <div class="container-car d-flex mx-auto w-50 flex-column" style="background-color: beige">
        <div class="h5 py-2 text-dark flex-row border border-dark">
            <span><img src="storage/images/produtos/{{ explode(',', $produto->img_produto)[0] }}" alt="Imagem produto"></span>
            {{ $produto->titulo }}
            <span>{{ $produto->id_produto }}</span>
            <span>{{ $produto->valor }}</span>
            <input type="number" class="text-center" style="width: 50px;" name="qtd" id="qtd" value="1" max="{{ $produto->qtd_produto }}">
            <span>Tem {{ $produto->qtd_produto }}un em estoque</span>
        </div>
    </div>
@endforeach

<div class="w-100 d-flex justify-content-end p-5">

<div class="d-flex justify-content-end flex-column p-5 border border-dark" style="background-color: antiquewhite">

    <div class="title">
        <h3>Resumo do pedido:</h3>
    </div>
    <div>
        Quantidade: <span>2 un</span>
    </div>
    <div>
        Valor total: <span>R$ 22,00</span>
    </div>

    <div class=" d-flex flex-row">
        <button class="btn btn-primary mx-1" type="button">Continuar comprando</button>
        <button class="btn btn-primary mx-1" type="button">Finalizar</button>
    </div>
</div>
</div>

