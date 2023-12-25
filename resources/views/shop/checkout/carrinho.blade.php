@include('parts.navbar')



@foreach($produtos as $produto)
<div class="container-car d-flex mx-auto w-50 flex-column border arounded" style="background-color: beige">
    <div class="h5 py-2 text-dark flex-row border border-dark">
        {{$produto->titulo}}
        <span>{{$produto->id_produto}}</span>
    <span>{{$produto->valor}}</span>
    <input type="number" name="qtd" id="qtd" value="1" max="{{$produto->qtd_produto}}">
    <span>Tem {{$produto->qtd_produto}}un em estoque</span>
    <span>{{$produto->img_produto}}</span>

    </div>
</div>
@endforeach