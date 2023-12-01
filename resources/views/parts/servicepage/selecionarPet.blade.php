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
                <a href="#" onclick="mostrarTelas(2)" class="btn btn-warning p-1 img-agenda-site"
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