@include('parts.navbar')

<div class="w-50 m-auto">
    <form action="{{ route('cadastro.cadastrar_produto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titulo do produto:</label>
            <input type="text" class="form-control" name="titulo" id="exampleFormControlInput1"
                placeholder="Titulo do produto" value="{{ old('titulo') }}" required>
        </div>
        <div class="mb-3">
            <select class="form-select" name="id_categoria" required>
                <option selected disabled>Selecione</option>
                @foreach ($categoria as $categorias)
                    <option value="{{ $categorias->id_categoria }}"
                        {{ old('id_categoria') == $categorias->id_categoria ? 'selected' : '' }}>
                        {{ $categorias->nome_categoria }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" maxlength="255" rows="5"
                required>{{ old('descricao') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="img_produto" class="form-label">Imagens do produto</label>
            <input type="file" class="form-control" id="img_produto" value="{{ old('img_produto') }}"
                name="img_produto[]" accept="image/*" multiple required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" oninput="formatarParaReal(this)" id="valor"
                value="{{ old('valor') }}" name="valor" required>
        </div>

        <div class="mb-3">
            <label for="qtd_produto" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="qtd_produto" value="{{ old('qtd_produto') }}"
                name="qtd_produto" required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <span class="text-danger">{{ $error }}</span>
            @endforeach
        @endif
        @if (session('status_cadastro') == 'success')
            <script>
                Swal.fire({
                    title: "Sucesso!",
                    text: "Produto cadastrado!",
                    icon: "success"
                });
            </script>
        @endif

    </form>
</div>

<script src="{{}}"></script>

</body>

</html>
