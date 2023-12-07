
<div class="container-produtos me-5 mt-5 w-100">
    <div class="border rounded p-3 text-center">
        <h4 style="font-family: 'Cotane Beach', sans-serif; font-size: 30px;">Escolha o pet</h4>

        <div class="d-flex justify-content-around w-100">

            @foreach ($pets as $pet)
                <div class="p-2 mx-3 border d-flex flex-column rounded">
                    <label class="form-check-label" for="petId{{ $pet->id_pet }}"
                        onclick="toggleActiveClass({{ $pet->id_pet }})">
                        <img src="/images/pets/{{ $pet->img_pet }}" width="250px" class="rounded" alt="Imagem do Pet">
                    </label>
                    <div class="d-flex mx-auto">
                        <input class="form-check-input" type="radio" name="selectPet" id="petId{{ $pet->id_pet }}"
                            value="option2">
                        <span class="ms-2 mt-1"
                            style="font-family: 'Cotane Beach', sans-serif; font-size: 20px;">{{ $pet->nome }}</span>
                    </div>
                </div>
            @endforeach

        </div>
        <input type="hidden" name="pet" id="pet">

        <div class="w-100 text-center d-flex flex-column mt-3">
            <div class="d-flex justify-content-around my-2">
                <a onclick="mostrarTelas(2)" class="btn btn-warning p-1"
                    style="white-space: nowrap; font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                    Cadastrar Pet
                </a>
                <a href="#" class="btn btn-warning p-1"
                    style="white-space: nowrap; font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                    Continuar
                </a>
            </div>
        </div>
    </div>
</div>
