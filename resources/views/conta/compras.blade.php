@include('parts.navbar')

@foreach ($compras as $venda)
    <li>{{$venda}}</li>    
@endforeach