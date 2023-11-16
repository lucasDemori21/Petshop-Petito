@include('parts.navbar')

<div class="w-75 h-50 mx-auto my-3">
    <div id="carouselExampleIndicators" class="carousel slide p-3 border border-light-subtle">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/img1.png') }}" class="d-block w-100" alt="anuncio-img">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/img2.png') }}" class="d-block w-100" alt="anuncio-img">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/img3.png') }}"class="d-block w-100" alt="anuncio-img">
            </div>
        </div>
        <button class="carousel-control-prev pr-5" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

</body>

</html>
