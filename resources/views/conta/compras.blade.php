@include('parts.navbar')

@foreach ($compra as $venda)
    <li>{{$venda}}</li>    
@endforeach