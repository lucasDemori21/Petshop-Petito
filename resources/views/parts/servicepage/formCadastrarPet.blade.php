<div class="w-50 mx-auto">
    <form action="{{ route('cadastrar.pet') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tipo_pet" class="form-label">Pet:</label>
            <select name="tipo_pet" class="form-select">
                <option value="" selected disabled>Selecione</option>
                <option value="1">Cachorro</option>
                <option value="2">Gato</option>
                <option value="3">Tartaruga</option>
                <option value="4">Rammster</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo:</label>
            <select name="sexo" class="form-control">
                <option value="" selected disabled>Selecione</option>
                <option value="1">Macho</option>
                <option value="2">Fêmea</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="data_nasc" class="form-label">Idade aproximada:</label>
            <input type="date" name="data_nasc" class="form-control">
        </div>
        <div class="mb-3">
            <label for="castrado" class="form-label">Castrado(a):</label>
            <select class="form-select" name="castrado">
                <option value="" selected disabled>Selecione</option>
                <option value="1">Sim</option>
                <option value="2">Não</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="raca" class="form-label">Raça:</label>
            <input type="text" name="raca" class="form-control">
        </div>
        <div class="mb-3">
            <label for="peso" class="form-label">Peso:</label>
            <input type="number" name="peso" class="form-control">
        </div>
        <div class="mb-3">
            <label for="img_pet" class="form-label">Foto:</label>
            <input type="file" class="form-control" name="img_pet" accept="image/*">
        </div>

        <button type="submit" class="btn btn-warning">Cadastrar</button>
        @if ($errors->any())
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
        @endif

    </form>
</div>
