async function qtdCar() {
    try {

        const resposta = await axios.get('/qtd/carrinho');

        if (resposta.data.qtd != 0 && resposta.data.qtd != undefined) {

            document.getElementById('qtdCar').innerHTML = resposta.data.qtd;
            document.getElementById('qtdCarButton').classList.remove('d-none');
        }

    } catch (error) {

        console.log('Erro na requisição: ' + error)

    }
}

window.onload = qtdCar();