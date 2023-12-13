@include('parts.navbar')

<script>
    async function addCar() {
        try {
            const resposta = await axios.post('{{ route('add.carrinho') }}', {id: {{ $dados[0]->id_produto }} });

            document.getElementById('qtdCar').innerHTML = resposta.data.id
            console.log(resposta.data);
        } catch (error) {
            console.log('Erro na requisição: ' + error);
        }
    }
</script>

@foreach ($dados as $produto)
    <?php
    $imgs = explode(',', $produto->img_produto);
    $i = 1;
    ?>
    <div class="card-wrapper">
        <div class="card">
            <div class="product-imgs">
                <div class="img-display">
                    <div class = "img-showcase">
                        @foreach ($imgs as $img)
                            <img src="{{ asset('storage/images/produtos/' . $img) }}" class="d-block w-100"
                                alt="IMAGEM TESTE">
                        @endforeach
                    </div>
                </div>
                <div class="img-select">
                    @foreach ($imgs as $img)
                        <div class = "img-item">
                            <a data-id ="{{ $i }}">
                                <img src="{{ asset('storage/images/produtos/' . $img) }}" class="d-block w-100"
                                    alt="IMAGEM TESTE">
                            </a>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
            <div class="product-content">
                @if (auth('funcionario')->check())
                    <div class="w-100 d-flex justify-content-end">
                        <a href="{{ route('show.update', $produto->id_produto) }}" class="btn btn-warning w-25">Editar anuncio</a>
                    </div>
                @endif
                <div>
                    <span class="fs-5 fw-bold">{{ $produto->titulo }}</span>
                </div>
                <div class="d-flex flex-column">
                    <label class="form-label fw-bold">Descrição</label>
                    <p>{{ $produto->descricao }}</p>
                </div>
            
                <span>R$ {{ str_replace('.', ',', $produto->valor) }}</span>

                <div class="btns-group">
                    <button type="button" onclick="addCar()" class="btn btn-warning">Adicionar ao carrinho</button>
                    <a href="#" class="btn btn-warning">Comprar</a>
                </div>
            </div>
        </div>
    </div>

    </div>
@endforeach


<script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);

</script>
</body>

</html>
