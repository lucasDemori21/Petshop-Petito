async function addCar(action, id) {
    try {
        const resposta = await axios.post('/add/carrinho', {
            id_produto: id
        });

        if (resposta.data.cadastro == "concluido") {
            location.reload();
        } else if (resposta.data.cadastro == "2") {
            Swal.fire({
                icon: "warning",
                title: "Este item já foi adicionado no carrinho"
            });
        }
        // console.log(resposta.data);
    } catch (error) {
        console.log('Erro na requisição: ' + error);
    }

    if (!action) {
        window.location.href = "{{ route('show.carrinho') }}"
    }
}