@include('parts.navbar')


<div class="container-table">
    <table id="table-container" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Procedimento</th>
                <th>Nome Pet</th>
                <th>Nome Funcionario</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>##</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($agendamento as $agendamentos)
                <tr>
                    <td>{{ $agendamentos->id_agendamento }}</td>
                    <td>{{ $agendamentos->titulo }}</td>
                    <td>{{ $agendamentos->nome }}</td>
                    <td>{{ $agendamentos->nome_func }}</td>
                    <td>{{ $agendamentos->descricao }}</td>
                    <td>{{ $agendamentos->data }}</td>

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
