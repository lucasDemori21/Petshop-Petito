@include('parts.navbar')

<form action="{{ route('show.checkout') }}" method="POST">
    @csrf

    @foreach ($produtos as $produto)

        <div class="container-car d-flex mx-auto w-50 flex-column produto" style="background-color: beige"
            data-valor="{{ $produto->valor }}">
            <div class="h5 py-2 text-dark flex-row border border-dark">
                <span><img width="200px" src="storage/images/produtos/{{ explode(',', $produto->img_produto)[0] }}"
                        alt="Imagem produto"></span>
                {{ $produto->titulo }}
                <span class="id-produto">{{ $produto->id_produto }}</span>
                <span class="valor-produto">{{ $produto->valor }}</span>

                <input type="number" class="text-center quantidade" style="width: 50px;" name="qtd-{{$produto->id_produto}}" id="qtd"
                    value="1" max="{{ $produto->qtd_produto }}" data-qtd-estoque="{{ $produto->qtd_produto }}">
                <span>Tem {{ $produto->qtd_produto }} un em estoque</span>
            </div>
        </div>
    @endforeach
    
    <div class="w-100 d-flex justify-content-end p-3">
        <div class="d-flex justify-content-end flex-column shadow p-4 bg-body-tertiary rounded" style="background-color: transparent">
            <div class="title">
                <h3>Resumo do pedido:</h3>
            </div>
            <div class="my-1">
                Quantidade: <span id="qtdTotal">0 un</span>
                
            </div>
            <div class="my-1">
                Valor total: <span id="valorTotal" >R$ 0.00</span>
                <input type="hidden" name="valorTotal" id="reqValorTotal">
            </div>
            <div class="d-flex flex-row mt-2">
                <a class="btn btn-primary mx-1" href="{{ route('shop.search') }}">Continuar comprando</a>
                <button type="submit" class="btn btn-success mx-1">Finalizar</button>
            </div>
        </div>
    </div>

</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const produtos = document.querySelectorAll('.produto');
        const qtdTotalElement = document.getElementById('qtdTotal');
        const valorTotalElement = document.getElementById('valorTotal');
        const valorTotalInput = document.getElementById('valorTotalInput');
        const valorTotalElementReq = document.getElementById('reqValorTotal');

        function calcularTotal() {
            let qtdTotal = 0;
            let valorTotal = 0;

            produtos.forEach(produto => {
                const quantidadeInput = produto.querySelector('.quantidade');
                const valorProduto = parseFloat(produto.querySelector('.valor-produto').textContent);
                const qtdEstoque = parseInt(quantidadeInput.getAttribute('data-qtd-estoque'));
                const idProduto = parseInt(produto.querySelector('.id-produto').textContent);

                let quantidade = parseInt(quantidadeInput.value) || 0;

                if (quantidade <= 0) {
                    Swal.fire({
                        title: "Deseja remover esse item do carrinho?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sim",
                        cancelButtonText: "Não"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                              
                                const removeItemCar = await axios.get(`/remover-do-carrinho/${idProduto}`);

                                if (removeItemCar.data.status == '1') {
                                    Swal.fire({
                                        title: "Item excluido do carrinho",
                                        icon: "success"
                                    });

                                    setTimeout(() => {
                                        location.reload();
                                    }, 2000);
                                } else {
                                    Swal.fire({
                                        title: "Algo deu errado, tente novamente",
                                        icon: "error"
                                    });
                                }
                            } catch (error) {
                                console.error(error);
                            }

                        } else {
                            quantidadeInput.value = 1;
                        }
                    });
                }

                quantidade = Math.min(quantidade, qtdEstoque);

                qtdTotal += quantidade;
                valorTotal += quantidade * valorProduto;
            });

            qtdTotalElement.textContent = `${qtdTotal} un`;
            valorTotalElement.textContent = `R$ ${valorTotal.toFixed(2)}`;
            valorTotalElementReq.value = `${valorTotal.toFixed(2)}`;

            
        }

        produtos.forEach(produto => {
            const quantidadeInput = produto.querySelector('.quantidade');
            quantidadeInput.addEventListener('change', calcularTotal);
        });

        calcularTotal();
    });
</script>
