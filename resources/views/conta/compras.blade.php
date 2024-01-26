@include('parts.navbar')

{{ dd($compra) }}

<div class="container-table">
    <table id="table-container" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Data compra</th>
                <th>Valor total</th>
                <th>##</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($compra as $venda)
                <tr>
                    <td>{{ $venda->id_venda }}</td>
                    <td>{{ $venda->date_compra }}</td>
                    <td>{{ $venda->valor_total }}</td>
                    <td>
                        <a href="" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    new DataTable('#table-container');
</script>
