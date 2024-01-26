@include('parts.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">

<div class="w-50 mx-auto">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 d-flex flex-column">
            <label for="img_pet" class="form-label w-100">Foto do seu pet:</label>
            <div class="small-12 large-4 columns mx-auto">
                <div class="containers">
                    <div class="imageWrapper">
                        <img class="image w-100 h-100 object-fit-cover rounded" id="img_pet"
                            src="{{ asset('storage/images/pets/' . $pet->img_pet) }}">
                    </div>
                    <button type="button" class="file-upload">
           
                        <input type="file" class="file-input" name="img_pet" accept="image/*" id="img_pet_input">

                        <i class="bi bi-camera-fill" style="color: #FFF;"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{$pet->nome}}">
        </div>
        <div class="mb-3">
            <label for="tipo_pet" class="form-label">Pet:</label>
            <select name="tipo_pet" class="form-select">
                <option value="" disabled>Selecione</option>
                <option value="1" {{ $pet->tipo == 1 ? 'selected' : '' }}>Cachorro</option>
                <option value="2" {{ $pet->tipo == 2 ? 'selected' : '' }}>Gato</option>
                <option value="3" {{ $pet->tipo == 3 ? 'selected' : '' }}>Tartaruga</option>
                <option value="4" {{ $pet->tipo == 4 ? 'selected' : '' }}>Rammster</option>
            </select>            
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo:</label>
            <select name="sexo" class="form-control">
                <option value="" selected disabled>Selecione</option>
                <option value="1" {{ $pet->sexo == 1 ? 'selected' : '' }}>Macho</option>
                <option value="2" {{ $pet->sexo == 2 ? 'selected' : '' }}>Fêmea</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="data_nasc" class="form-label">Idade aproximada:</label>
            <input type="date" name="data_nasc" value="{{$pet->data_nasc}}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="castrado" class="form-label">Castrado(a):</label>
            <select class="form-select" name="castrado">
                <option value="" selected disabled>Selecione</option>
                <option value="1" {{ $pet->castrado == 1 ? 'selected' : '' }}>Sim</option>
                <option value="2" {{ $pet->castrado == 2 ? 'selected' : '' }}>Não</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="raca" class="form-label">Raça:</label>
            <input type="text" name="raca" class="form-control" value="{{ $pet->raca }}">
        </div>
        <div class="mb-3">
            <label for="peso" class="form-label">Peso:</label>
            <input type="number" name="peso" class="form-control" value="{{ $pet->peso }}">
        </div>

        <button type="submit" class="btn btn-warning">Atualizar informações</button>
        {{-- @if ($errors->any())
            <script>
                document.getElementById('site').classList.add('d-none');
                document.getElementById('escolhaPet').classList.add('d-none');
                document.getElementById('cadastrarPet').classList.remove('d-none');
            </script>
            <br>
            @foreach ($errors->all() as $error)
                <span class="text-danger">{{ $error }}<br></span>
            @endforeach
        @endif

        @if (session('status_cadastro') == 'success')
            <script>
                Swal.fire({
                    title: "Sucesso!",
                    text: "Pet cadastrado!",
                    icon: "success"
                });
            </script>
        @endif --}}

    </form>
</div>

<script>

document.getElementById('img_pet_input').addEventListener('change', function() {
    const file = this.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('img_pet').src = e.target.result;
    }
    reader.readAsDataURL(file);
});

</script>
    