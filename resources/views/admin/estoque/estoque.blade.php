@include('parts.navbar')

<div class="container-table">

    <table id="table-container" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome Produto</th>
            <th>Quantidade</th>
            <th>Descrição</th>
            <th>##</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)

        <tr>
            <td>{{$produto->id_produto}}</td>
            <td>{{$produto->titulo}}</td>
            <td>{{$produto->qtd_produto}}</td>
            <td>{{$produto->descricao}}</td>
            <td>
                <a href="{{ route('show.update', $produto->id_produto) }}" class="btn btn-warning" onclick="">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

</div>

<script>
    new DataTable('#table-container');
</script>