document.addEventListener('DOMContentLoaded', function () {
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