@include('parts.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">

<script>
    async function addCar(action) {
        try {
            const resposta = await axios.post('{{ route('add.carrinho') }}', {
                id_produto: {{ $dados[0]->id_produto }}
            });

            if (resposta.data.cadastro == "concluido") {
                location.reload();
            } else if (resposta.data.cadastro == "2") {
                Swal.fire({
                    icon: "error",
                    title: "Este item já foi adicionado no carrinho"
                });
            }
            // console.log(resposta.data);
        } catch (error) {
            console.log('Erro na requisição: ' + error);
        }

        if (!action) {
            window.location.href = "{{ route('show.carrinho') }}"
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
                    <div class="position-absolute" style="top: 15px; right: 15px;">
                        <a href="{{ route('show.update', $produto->id_produto) }}" class="btn btn-light"><i
                                class="bi bi-pen-fill"></i></a>
                    </div>
                @endif
                <div class="text-center mt-3">
                    <span class="fs-5 fw-bold">{{ $produto->titulo }}</span>
                </div>
                <div class="d-flex flex-column ms-3">
                    <label class="form-label fw-bold">Descrição: </label>
                    <p>{{ $produto->descricao }}</p>
                </div>

                <span class="text-center fs-3">Valor: R$ {{ str_replace('.', ',', $produto->valor) }}<p class="fs-5">
                        Ou em até 12x sem juros</p></span>


                <div class="btns-group">
                    <button type="button" onclick="addCar(true)" class="btn btn-warning">Adicionar ao carrinho</button>
                    <button type="button" onclick="addCar(false)" class="btn btn-warning">Comprar</button>
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
