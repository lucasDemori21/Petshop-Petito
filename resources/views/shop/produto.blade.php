@include('parts.navbar')

{{-- <div class="d-flex mx-auto flex-column">

    
    
    @if (auth('funcionario')->check())
    <a href="{{route('show.update', $produto->id_produto)}}" class="btn btn-warning w-25">Editar anuncio</a>
    @endif

    <span class="mt-4">{{ $produto->titulo }}</span>
        <span class="mt-4">{{ $produto->descricao }}</span>
        <span class="mt-4">{{ $produto->qtd_produto }}</span>
        <span class="mt-4">{{ $produto->valor }}</span>
        
        
       
        @foreach ($imgs as $img)

            <img src="{{ asset('storage/images/produtos/' . $img) }}" class="img-fluid mt-4" width="200px" alt="IMAGEM TESTE">
       
        @endforeach
        
        @endforeach
    </div> --}}

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');


    .card-wrapper {
        max-width: 1100px;
        margin: 0 auto;
    }

    img {
        width: 100%;
        display: block;
    }

    .img-display {
        overflow: hidden;
    }

    .img-showcase {
        display: flex;
        width: 100%;
        transition: all 0.5s ease;
    }

    .img-showcase img {
        min-width: 100%;
    }

    .img-select {
        display: flex;
    }

    .img-item {
        margin: 0.3rem;
    }

    .img-item:nth-child(1),
    .img-item:nth-child(2),
    .img-item:nth-child(3) {
        margin-right: 0;
    }

    .img-item:hover {
        opacity: 0.8;
    }

    @media (min-width: 992px) {
        .card {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 1.5rem;
        }

        .card-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-imgs {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    }
</style>

@foreach ($dados as $produto)
    <?php
    $imgs = explode(',', $produto->img_produto);
    $i = 1;
    ?>
    <div class = "card-wrapper">
        <div class = "card">
            <div class = "product-imgs">
                <div class = "img-display">
                    <div class = "img-showcase">
                        @foreach ($imgs as $img)
                            <img src="{{ asset('storage/images/produtos/' . $img) }}" alt="IMAGEM TESTE">
                        @endforeach
                    </div>
                </div>
                <div class = "img-select">
                    @foreach ($imgs as $img)
                        <div class = "img-item">
                            <a data-id ="{{ $i }}">
                                <img src="{{ asset('storage/images/produtos/' . $img) }}" alt="IMAGEM TESTE">
                            </a>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
            <div class = "product-content">
                @if (auth('funcionario')->check())
                <a href="{{route('show.update', $produto->id_produto)}}" class="btn btn-warning w-25">Editar anuncio</a>
                @endif
            
                <span class="mt-4">{{ $produto->titulo }}</span>
                    <span class="mt-4">{{ $produto->descricao }}</span>
                    <span class="mt-4">{{ $produto->qtd_produto }}</span>
                    <span class="mt-4">{{ $produto->valor }}</span>

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
