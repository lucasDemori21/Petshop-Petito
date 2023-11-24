@include('parts.navbar')

<style>

</style>
<style>
    body,
    html {
        height: 80%;
    }

    .nav-categorias {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        width: 20%;
        margin: auto;

    }

    .container-produtos {
        width: 80%;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin: 0 auto;
    }

    .produtos {

        background-color: aliceblue;
        margin: 1.5% 1%;
        box-shadow: 0 0 10px 1px rgba(0,0,0, 0.3);
        border-radius: 6px;
        width: 200px;
        height: 200px;

    }

    .container-shop {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 100%;
    }

    @media(max-width: 768px) {
        .container-shop {
            flex-direction: column;
        }
    }

    .bloco {
        text-align: center;
    }
</style>
<div class="container-shop">
    <div class="nav-categorias">
        <span class="title" style="font-family: 'Cotane Beach', sans-serif; font-size: 25px;">Categoria</span>
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
        <a href="#" class="produtos">
            <div class="bloco">
                <div class="bloco-produto mt-1">
                    <img src="{{ asset('images/produtos/racao.png') }}" width='120px' alt="img">
                </div>
                <div class="bloco-produto d-flex flex-column mt-2">
                    <span>Pacote 3 kg ração</span>
                    <span>R$ 49,90</span>
                </div>
            </div>
        </a>
        <a href="#" class="produtos">
            <div class="bloco">
                <div class="bloco-produto mt-1">
                    <img src="{{ asset('images/produtos/racao.png') }}" width='120px' alt="img">
                </div>
                <div class="bloco-produto d-flex flex-column mt-2">
                    <span>Pacote 3 kg ração</span>
                    <span>R$ 49,90</span>
                </div>
            </div>
        </a>
        <a href="#" class="produtos">
            <div class="bloco">
                <div class="bloco-produto mt-1">
                    <img src="{{ asset('images/produtos/racao.png') }}" width='120px' alt="img">
                </div>
                <div class="bloco-produto d-flex flex-column mt-2">
                    <span>Pacote 3 kg ração</span>
                    <span>R$ 49,90</span>
                </div>
            </div>
        </a>
        <a href="#" class="produtos">
            <div class="bloco">
                <div class="bloco-produto mt-1">
                    <img src="{{ asset('images/produtos/racao.png') }}" width='120px' alt="img">
                </div>
                <div class="bloco-produto d-flex flex-column mt-2">
                    <span>Pacote 3 kg ração</span>
                    <span>R$ 49,90</span>
                </div>
            </div>
        </a>
        
    </div>
</div>



</body>

</html>
