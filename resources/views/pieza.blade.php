@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <!-- Imagen y detalles de la pieza -->
            <div class="card">
                <img src="{{ asset('storage/' . $pieza->imagen) }}" class="card-img-top" alt="{{ $pieza->nombre }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $pieza->nombre }}</h3>
                    <p><strong>Marca:</strong> {{ $pieza->marca }}</p>
                    <p><strong>Modelo:</strong> {{ $pieza->modelo }}</p>
                    <p><strong>Tipo:</strong> {{ $pieza->tipo }}</p>
                    <p><strong>Descripción:</strong> {{ $pieza->descripcion }}</p>
                    <p><strong>Puntuación Promedio:</strong> 
                        @if($pieza->puntuacion->avg('valor'))
                            ⭐ {{ number_format($pieza->puntuacion->avg('valor'), 1) }}
                        @else
                            Sin puntuaciones
                        @endif
                    </p>

                    <!-- Comentarios -->
                    <div class="mt-4">
                        <h5>Comentarios:</h5>
                        @if($pieza->comentarios->count())
                            <ul class="list-group">
                                @foreach($pieza->comentarios as $comentario)
                                    <li class="list-group-item">
                                        <strong>{{ $comentario->usuario->name }}:</strong> 
                                        <p>{{ $comentario->texto }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No hay comentarios para esta pieza.</p>
                        @endif
                    </div>
                    
                    <!-- Formulario para dejar un comentario -->
                    @auth
                    <div class="mt-4">
                        <form action="{{ route('comentarios.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comentario">Deja tu comentario:</label>
                                <textarea name="comentario" id="comentario" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Publicar Comentario</button>
                        </form>
                    </div>
                    @else
                    <p class="mt-3">Inicia sesión para dejar un comentario.</p>
                    @endauth
                </div>
            </div>
        </div>
        <!-- Información adicional o enlaces a otras piezas -->
        <div class="col-md-4">
            <h5>Más Piezas</h5>
            <ul class="list-group">
                @foreach($piezas as $pieza)
                    <li class="list-group-item">
                        <a href="{{ route('pieza.show', $pieza->id) }}">
                            <img src="{{ asset('storage/' . $pieza->imagen) }}" alt="{{ $pieza->nombre }}" class="img-thumbnail" width="50">
                            {{ $pieza->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
