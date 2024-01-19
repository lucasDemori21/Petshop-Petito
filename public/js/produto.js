async function addCar(action, id) {
    var redirect = false;
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
            redirect = true;
        } else {
            Swal.fire({
                icon: "warning",
                title: "Você precisa estar logado para adicionar items ao carrinho."
            });
            redirect = true;
            setTimeout(() => {
                window.location.href = "/login"
            }, 3000);
        }

    } catch (error) {
        console.log('Erro na requisição: ' + error);
    }

    if (!action) {
        if (!redirect) {
            window.location.href = "/carrinho"
        }
    }

}