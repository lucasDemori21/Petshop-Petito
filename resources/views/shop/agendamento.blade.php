@include('parts.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">
<div class="w-50 mx-auto">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        @foreach ($pet as $dataPet)
            <div class="mb-1 d-flex flex-column">
                <div class="small-12 large-4 columns mx-auto">
                    <div class="containers">
                        <div class="imageWrapper">
                            <img class="image w-100 h-100 object-fit-cover rounded"
                                src="{{ asset('storage/images/pets/' . $dataPet->img_pet) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center fs-5 fw-bold">
                <span>{{ $dataPet->nome }}</span>
            </div>
            <div class="mb-3">
                <label for="procedimento" class="form-label">Procedimento:</label>
                <select name="procedimento" class="form-select">
                    <option value="" selected disabled>Selecione</option>
                    <option value="1">Cachorro</option>
                    <option value="2">Gato</option>
                    <option value="3">Tartaruga</option>
                    <option value="4">Rammster</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="horario" class="form-label">Horario:</label>
                <select name="horario" class="form-control">
                    <option value="" selected disabled>Selecione</option>
                    <option value="1">Macho</option>
                    <option value="2">Fêmea</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="castrado" class="form-label">Observações:</label>
                <textarea name="obs" class="form-control" id="obs" cols="30" rows="10"></textarea>
            </div>

            <div class="d-flex justify-content-end w-100">

                <button type="submit" class="btn btn-warning">Agendar</button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif (session('status_agendamento'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Agendamento realizado com sucesso',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                @endif
            </div>
    </form>
    @endforeach
    </form>
</div>
