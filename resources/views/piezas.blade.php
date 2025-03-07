<link href="{{ asset('css/piezas.css') }}" rel="stylesheet">
<div class="galeria">
    @foreach($piezas as $pieza)
        <div class="pieza">
            <h2>{{ $pieza->nombre }}</h2>
            <img src="{{ $pieza->imagen }}" alt="{{ $pieza->nombre }}">
            
            <div class="seccion">
                <img src="{{ asset('storage/imagenesApp/star.png')}}" alt="Puntuación">
                <p class="tipo">Puntuación: {{ $pieza->puntuacion }}</p>
            </div>

            <div class="seccion">
                <img src="{{ asset('storage/imagenesApp/tipo.png')}}" alt="Tipo">
                <p class="tipo">Tipo: {{ $pieza->tipo }}</p>
            </div>

            <div class="seccion">
                <img src="{{ asset('storage/imagenesApp/marca.png')}}" alt="Marca">
                <p class="marca">Marca: {{ $pieza->marca }}</p>
            </div>
            <a href=""><i class="fa fa-eye"></i>
        </div>
    @endforeach
</div>