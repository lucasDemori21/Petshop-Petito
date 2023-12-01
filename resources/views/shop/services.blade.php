@include('parts.navbar')

<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">

<div class="container-shop">
    <div class="nav-categorias">
        <span class="title" style="font-family: 'Cotane Beach', sans-serif; font-size: 25px;">Categoria</span>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Banho</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Tosa</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Transporte</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Pacotes</a>
    </div>
    <div class="container-produtos me-5 mt-5" id="site">
        <div class="border rounded p-3">

            <div class="w-100 mx-auto d-flex justify-content-center">
                <img src="{{ asset('images/img-agenda.png') }}" class="w-75 rounded" alt="Banner agenda">
            </div>
            <div class="w-100 text-center d-flex flex-column mt-3">
                <h4 style="font-family: 'Cotane Beach', sans-serif; font-size: 30px;">Agende agora</h4>
                <div class="d-flex justify-content-around w-100 my-2">
                    <a onclick="mostrarPets()" class="btn btn-warning p-1 img-agenda-site"
                        style="font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                        <img src="{{ asset('images/logos/petito.png') }}" alt="Logo Petito">
                        Site
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=47996356349&text=Ol%C3%A1,%20eu%20gostaria%20de%20fazer%20um%20agendamento."
                        target="_blank" class="btn btn-warning p-1 img-agenda"
                        style="white-space:nowrap;font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                        <img src="{{ asset('images/logos/logo-whats.png') }}" alt="Logo Petito">
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div id="escolhaPet" class="d-none w-100 mx-auto">

        @if(!empty($pet))
            
        
        <div class="container-produtos me-5 mt-5 w-100">
            <div class="border rounded p-3">
                <h4 style="font-family: 'Cotane Beach', sans-serif; font-size: 30px;">Você não tem nenhum pet cadastrado
                </h4>
                <div class="w-100 mx-auto d-flex justify-content-center">
                    <img src="{{ asset('images/img-sempet.png') }}" class="w-75 rounded" alt="Banner agenda">
                </div>
                <div class="w-100 text-center d-flex flex-column mt-3">
                    <div class="w-50 my-2 mx-auto">
                        <a href="#" class="btn btn-warning p-1 img-agenda-site w-100"
                            style="white-space: nowrap;font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                            Cadastrar Pet
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @else

        <div class="container-produtos me-5 mt-5 w-100">
            <div class="border rounded p-3 text-center">
                <h4 style="font-family: 'Cotane Beach', sans-serif; font-size: 30px;">Escolha o pet</h4>

                <div class="d-flex justify-content-around w-100">
                    <div class="p-2 mx-3 border d-flex flex-column">
                        <label class="form-check-label" for="petId1" onclick="toggleActiveClass(1)">
                            <img src="{{ asset('images/img-sempet.png') }}" class="w-75 rounded mx-auto"
                                alt="Banner agenda">
                        </label>
                        <div class="d-flex mx-auto">
                            <input class="form-check-input" type="radio" name="selectPet" id="petId1"
                                value="option1">
                            <span class="ms-2 mt-1"
                                style="font-family: 'Cotane Beach', sans-serif; font-size: 20px;">Nome do pet</span>
                        </div>
                    </div>
                    <div class="p-2 mx-3 border d-flex flex-column">
                        <label class="form-check-label" for="petId2" onclick="toggleActiveClass(2)">
                            <img src="{{ asset('images/img-sempet.png') }}" class="w-75 rounded mx-auto"
                                alt="Banner agenda">
                        </label>
                        <div class="d-flex mx-auto">
                            <input class="form-check-input" type="radio" name="selectPet" id="petId2"
                                value="option2">
                            <span class="ms-2 mt-1"
                                style="font-family: 'Cotane Beach', sans-serif; font-size: 20px;">Nome do pet</span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="pet" id="pet">

                <div class="w-100 text-center d-flex flex-column mt-3">
                    <div class="d-flex justify-content-around my-2">
                        <a href="#" class="btn btn-warning p-1 img-agenda-site"
                            style="white-space: nowrap; font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                            Cadastrar Pet
                        </a>
                        <a href="#" class="btn btn-warning p-1 img-agenda-site"
                            style="white-space: nowrap; font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                            Continuar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
</body>

</html>

<script>
    function toggleActiveClass(id_pet) {
        document.getElementById('pet').value = id_pet;
    }

    function mostrarPets() {
        document.getElementById('site').classList.add('d-none')
        document.getElementById('escolhaPet').classList.remove('d-none')
    }
</script>
