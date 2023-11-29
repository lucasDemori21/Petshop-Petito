@include('parts.navbar')

<div class="w-50 m-auto">
    <form action="{{ route('cadastro.cadastrar_produto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titulo do produto:</label>
            <input type="text" class="form-control" name="titulo" id="exampleFormControlInput1" placeholder="Titulo do produto">
        </div>
        <div class="mb-3">
            <select class="form-select" name="categoria" aria-label="Default select example">
                <option selected disabled>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="img_produto" class="form-label">Imagens do produto</label>
            <input type="file" class="form-control w-50" id="img_produto" name="img_produto[]" accept="image/*" multiple>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>

    </form>
</div>
