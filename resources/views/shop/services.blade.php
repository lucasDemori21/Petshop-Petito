@include('parts.navbar')

<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">

<div class="container-shop">
    <div class="nav-categorias mx-auto">
        <span class="title" style="font-family: 'Cotane Beach', sans-serif; font-size: 25px;">Categoria</span>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Banho</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Tosa</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Transporte</a>
        <a class="nav-link my-1" style="font-size: 18px;" href="#">Pacotes</a>
    </div>
    <div class="container-produtos me-5 mt-5" id="site">
        <div class="border rounded p-3">

            <div class="w-100 mx-auto d-flex justify-content-center">
                <img src="{{ asset('images/img-agenda.png') }}" class="w-75 rounded" alt="Banner agenda">
            </div>
            <div class="w-100 text-center d-flex flex-column mt-3">
                <h4 style="font-family: 'Cotane Beach', sans-serif; font-size: 30px;">Agende agora</h4>
                <div class="d-flex justify-content-around w-100 my-2">
                    <a onclick="mostrarTelas(1)" class="btn btn-warning p-1 img-agenda-site"
                        style="font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                        <img src="{{ asset('images/logos/petito.png') }}" alt="Logo Petito">
                        Site
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=47996356349&text=Ol%C3%A1,%20eu%20gostaria%20de%20fazer%20um%20agendamento."
                        target="_blank" class="btn btn-warning p-1 img-agenda"
                        style="white-space:nowrap;font-family: 'Cotane Beach', sans-serif; font-size:20px;">
                        <img src="{{ asset('images/logos/logo-whats.png') }}" alt="Logo Petito">
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    

    <div id="escolhaPet" class="d-none w-100 mx-auto">
        @if(count($pets) == 0) <!-- Sem pet cadastrado nesse usuario -->

            @include('parts.servicepage.semPet')
        @else <!-- Selecionar pet -->
            @include('parts.servicepage.selecionarPet')
        @endif

    </div>

    <div id="cadastrarPet" class="d-none w-100 mx-auto mb-5">
        @include('parts.servicepage.formCadastrarPet')
    </div>
</div>
</body>

</html>

<script>
    function toggleActiveClass(id_pet) {
        document.getElementById('pet').value = id_pet;
    }

    function mostrarTelas(tela) {
        if(tela == 1){
            document.getElementById('site').classList.add('d-none');
            document.getElementById('escolhaPet').classList.remove('d-none');
        }else if(tela == 2){
            document.getElementById('escolhaPet').classList.add('d-none');
            document.getElementById('cadastrarPet').classList.remove('d-none');
        }else{
            document.getElementById('escolhaPet').classList.add('d-none');
            document.getElementById('cadastrarPet').classList.add('d-none');
            document.getElementById('site').classList.remove('d-none');
        }
    }

    $('.file-input').change(function(){
    var curElement = $(this).parent().parent().find('.image');
    console.log(curElement);
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        curElement.attr('src', e.target.result);
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});
</script>
