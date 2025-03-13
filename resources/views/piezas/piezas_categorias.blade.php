<link href="{{ asset('css/piezas.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@include('components.cabecera')
<div class="atras">
    <a href="/piezas" style="color:red">Volver</a>
</div>
<div class="galeria">
   @if(count($piezasCategoria) == 0)
        <div style="flex-direction: column;dsplay:flex">
        <img src="{{ asset('storage/imagenesApp/iconsad.png') }}" style="width:200px" height="200px" alt="">
        <br>
        <h3>No hay piezas en esta categoria</h3>
        </div>
   @else 
        @foreach($piezasCategoria as $pieza)
            <div class="pieza">
                <div class="seccion tituloPieza">
                <h2>{{ @substr($pieza->nombre, 0, 20) }}...</h2>
                    @if(Auth::user()->is_admin)
                        <a class="ms-3" href="pieza/{{ $pieza->id }}/eliminar"> <i class="fa fa-trash rojo"></i></a>
                    @endif
                </div>
                <img src="{{ asset('storage/' . $pieza->imagen) }}" alt="{{ $pieza->nombre }}">
                
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
   @endif
</div>