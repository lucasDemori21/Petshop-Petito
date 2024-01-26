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
                    <td>{{ $pet->img_pet }}</td>
                    <td>{{ $pet->nome }}</td>
                    <td>{{ $pet->peso }}</td>
                    <td>
                        <a href="{{ route('update.pet', $pet->id_pet) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    new DataTable('#table-container');
</script>