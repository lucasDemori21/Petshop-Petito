@include('parts.navbar')

<div class="container-car d-flex mx-auto w-50 flex-column produto shadow p-3 bg-body-tertiary rounded"
    style="background-color: beige">
    <div class="h5 py-2 text-dark flex-row">
        <div class="d-flex flex-row flex-wrap">
            <span><img width="70%" style="min-width: 150px; max-width: 250px;"
                    src="{{ asset('storage/images/produtos/' . explode(',', $info['img_produto'])[0]) }}"
                    alt="Imagem produto"></span>
            <span class="mx-2">
                {{ $info['titulo'] }}
            </span>

            <span class="id-produto d-none">{{ $info['id_venda'] }}</span><br>
            <span class="valor-produto mx-5">{{ $info['valor_unitario'] }}</span>
            <label for="qtd">Quantidade: </label><span>{{ $info['quantidade'] }}</span>
            <label for="qtd">Nome: </label><span>{{ $info['comprador'] }}</span>
            <label for="qtd">Email: </label><span>{{ $info['email'] }}</span>
            <label for="qtd">Descrição: </label><span>{{ $info['descricao'] }}</span>

        </div>
    </div>
</div>

