@include('parts.navbar')

{{-- {{ dd($compra) }} --}}

<h1 class="text-center my-3">Meus pedidos</h1>


<div class="container-table">
    <table id="table-container" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Id</th>
                <th>Titulo</th>
                <th>Data compra</th>
                <th>Valor total</th>
                <th>##</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($compra as $venda)
                <tr>
                    <td class="text-center"><img src="{{ asset('storage/images/produtos/' . $venda->img_produto) }}" width='80px' height="80px" alt="imagem Pet"></td>
                    <td>{{ $venda->id_venda }}</td>
                    <td>{{ $venda->titulo }}</td>
                    <td>{{ date('d/m/Y', strtotime($venda->date_compra)) }}</td>
                    <td>{{  'R$ '.number_format($venda->valor, 2, ',', '.') }}</td>
                    <td><a href="{{route('show.purchasing.info', $venda->id_venda)}}" class="btn btn-primary">Mais informações...</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    new DataTable('#table-container');
</script>
