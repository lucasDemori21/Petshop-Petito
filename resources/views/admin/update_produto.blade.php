@include('parts.navbar')

<div class="d-flex mx-auto flex-column">
    <div class="d-flex w-100 d-flex w-100 justify-content-end justify-content-end">
        <a href="{{ url()->previous() }}" class="btn btn-danger me-5"><i class="bi bi-arrow-return-left"></i></a>
    </div>


    @foreach ($updateProduto as $produto)

        <form action="{{ route('admin.update', $produto->id_produto) }}" method="post" class="d-flex flex-column w-50 mx-auto" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control mt-3" name="titulo" id="titulo" class="mt-4"
                value="{{ $produto->titulo }}" />
            <input type="text" class="form-control mt-3" name="descricao" id="descricao" class="mt-4"
                value="{{ $produto->descricao }}" />
            <input type="text" class="form-control mt-3" name="qtd_produto" id="qtd_produto" class="mt-4"
                value="{{ $produto->qtd_produto }}" />
            <input type="text" class="form-control mt-3" name="valor" id="valor" class="mt-4"
                value="{{ $produto->valor }}" />

            <select class="form-select mt-3" name="id_categoria" required>
                <option selected disabled>Selecione</option>
                @foreach ($categoria as $categorias)
                    <option value="{{ $categorias->id_categoria }}"
                        {{ $produto->id_categoria == $categorias->id_categoria ? 'selected' : '' }}>
                        {{ $categorias->nome_categoria }}
                    </option>
                @endforeach
            </select>

            <?php $imgs = explode(',', $produto->img_produto); ?>

            <input type="file" class="form-control mt-3" class="mt-4" name="img_produto[]" id="img_produto" accept="image/*" multiple>
            <input type="hidden" name="imgs" value="{{$produto->img_produto}}">

            @foreach ($imgs as $img)
                <img src="{{ asset('storage/images/produtos/' . $img) }}" class="img-fluid mt-4" width="200px" alt="IMAGEM TESTE">
            @endforeach

            <button type="submit" class="btn btn-success mt-4 w-25">Editar anuncio</button>
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



    @endforeach

</div>


</body>
