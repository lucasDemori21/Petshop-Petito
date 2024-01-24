@include('parts.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}">
<div class="w-50 mx-auto">
    @foreach ($pet as $dataPet)
        <form action="{{ route('agendar.pet', $dataPet->id_pet) }}" method="post" enctype="multipart/form-data">
            @csrf

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
                <label for="id_func" class="form-label">Profissional:</label>
                <select name="id_func" class="form-select">
                    <option value="" selected disabled>Selecione</option>
                    @foreach ($func as $funcs)
                        <option value="{{ $funcs->id_func }}" {{ old('id_func') == $funcs->id_func ? 'selected' : '' }}>
                            {{ $funcs->nome_func }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="procedimento" class="form-label">Procedimento:</label>
                <select name="procedimento" class="form-select">
                    <option value="" selected disabled>Selecione</option>
                    @foreach ([1 => 'Vacina', 2 => 'Banho', 3 => 'Tosa', 4 => 'Banho + tosa', 5 => 'Cirurgia'] as $value => $label)
                        <option value="{{ $value }}" {{ old('procedimento') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="data" class="form-label">Data:</label>
                <input type="date" class="form-control" name="data" id="data" value="{{ old('data') }}">
            </div>
            
            <div class="mb-3">
                <label for="horario" class="form-label">Horario:</label>
                <select name="horario" class="form-control">
                    <option value="" selected disabled>Selecione</option>
                    @foreach (['00:00', '01:00'] as $time)
                        <option value="{{ $time }}" {{ old('horario') == $time ? 'selected' : '' }}>
                            {{ $time }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="descricao" class="form-label">Observações:</label>
                <textarea name="descricao" class="form-control" id="descricao" cols="30" rows="10">{{ old('descricao') }}</textarea>
            </div>

            <div class="d-flex justify-content-end w-100">
                <div>
                    <div class="w-100 d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning mb-5">Agendar</button>
                    </div>

                    @if ($errors->any())
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro',
                            html: '<ul class="text-start">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                                showConfirmButton: true,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                        </script>
                    @elseif (session('status_agendamento'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Agendamento realizado com sucesso',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(() => {
                                window.location.href = '/shop';
                            }, 2000);
                        </script>
                    @endif
                </div>
            </div>
        </form>
        </form>
    @endforeach
</div>
