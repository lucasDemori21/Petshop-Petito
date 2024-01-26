@include('parts.navbar')


<div class="container-table">
    <table id="table-container" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome Produto</th>
                <th>Peso</th>
                <th>##</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pet as $pet)
                <tr>
                    <td>
                        <img src="{{ asset('storage/images/pets/' . $pet->img_pet) }}" width='80px' height="80px" alt="imagem Pet">
                        {{ $pet->img_pet }}
                    </td>
                    <td>{{ $pet->nome }}</td>
                    <td>{{ $pet->peso }}</td>
                    <td>
                        <a href="{{ route('show.update.pet', $pet->id_pet) }}" class="btn btn-warning">Editar</a>
                        <a onclick="confirmarDel({{ $pet->id_pet }});" class="btn btn-danger">Excluir pet</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="/js/updatePet.js"></script>
