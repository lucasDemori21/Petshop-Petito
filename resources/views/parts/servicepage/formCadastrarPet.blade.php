<div class="w-50 mx-auto">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pet" class="form-label">Pet:</label>
            <select name="pet" class="form-select">
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
                <option value="M">Macho</option>
                <option value="F">Fêmea</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade aproximada:</label>
            <input type="date" name="idade" class="form-control">
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
            <label for="foto" class="form-label">Foto:</label>
            <input type="file" class="form-control" name="foto" accept="image/*">
        </div>

        <button type="submit" class="btn btn-warning">Cadastrar</button>
    </form>
</div>
