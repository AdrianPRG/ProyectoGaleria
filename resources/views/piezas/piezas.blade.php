<link href="{{ asset('css/piezas.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@include('components.cabecera')
<div class="galeria">
    @if(Auth::user()->is_admin)
       <div class="seccionadmin">
        <a href="pieza/create" class="btn btn-success">Añadir Pieza</a>
       </div>
    @endif
    @foreach($piezas as $pieza)
        <div class="pieza">
            <h2>{{ $pieza->nombre }}</h2>
            <img src="{{ $pieza->imagen }}" alt="{{ $pieza->nombre }}">
            
            <div class="seccion">
                <img src="{{ asset('storage/imagenesApp/star.png')}}" alt="Puntuación">
                <p class="tipo"><b>Puntuacion: {{ $pieza->puntuacion }}</b></p>
            </div>

            <div class="seccion">
                <img src="{{ asset('storage/imagenesApp/tipo.png')}}" alt="Tipo">
                <p class="tipo"><b>Tipo de Pieza: {{ $pieza->tipo }}</b></p>
            </div>

            <div class="seccion">
                <img src="{{ asset('storage/imagenesApp/marca.png')}}" alt="Marca">
                <p class="marca">Marca de pieza: {{ $pieza->marca }}</p>
            </div>
            <a href="pieza/{{ $pieza->id }}"><i class="fa fa-eye"></i></a>
        </div>
    @endforeach
</div>