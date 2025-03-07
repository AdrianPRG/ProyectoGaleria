@extends('layouts.app')

@section('content')
<style>
    /* Estilo General */
    body {
        background-color: #121212;
        color: #d4af37; /* Dorado */
        font-family: 'Georgia', serif;
    }

    .container {
        padding-top: 40px;
    }

    /* Tarjeta del Fabricante */
    .card {
        background: #1e1e1e;
        border: 2px solid #d4af37;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 16px rgba(212, 175, 55, 0.5);
    }

    .card-title {
        font-size: 28px;
        font-weight: bold;
        color: #fff;
    }

    .card-body p {
        color: #c0c0c0;
    }

    /* Imagenes de los Fabricantes y Piezas */
    .card-img-top {
        border-bottom: 2px solid #d4af37;
        height: 300px;
        object-fit: cover;
    }

    /* Botón de Pieza */
    .btn-primary {
        background-color: #d4af37;
        border: none;
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #b89629;
        color: #fff;
    }

    /* Sección de Piezas */
    .piezas-container {
        background: #1e1e1e;
        padding: 20px;
        border-radius: 10px;
        border: 2px solid #d4af37;
    }

    .piezas-container h4 {
        color: #fff;
        font-size: 24px;
        border-bottom: 1px solid #d4af37;
        padding-bottom: 10px;
    }
</style>

<div class="container">
    <div class="row">
        <!-- Columna principal con detalles del fabricante -->
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset('storage/' . $fabricante->imagen) }}" class="card-img-top" alt="{{ $fabricante->nombre }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $fabricante->nombre }}</h3>
                    <p><strong>Descripción:</strong> {{ $fabricante->descripcion }}</p>
                    <p><strong>Estado:</strong> 
                        @if($fabricante->activo)
                            <span class="text-success">Activo</span>
                        @else
                            <span class="text-danger">Inactivo</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Sección de Piezas del Fabricante -->
            <div class="piezas-container mt-4">
                <h4>Piezas de {{ $fabricante->nombre }}</h4>
                @if($fabricante->pieza->count())
                    <div class="row">
                        @foreach($fabricante->pieza as $pieza)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $pieza->imagen) }}" class="card-img-top" alt="{{ $pieza->nombre }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $pieza->nombre }}</h5>
                                        <p><strong>Tipo:</strong> {{ $pieza->tipo }}</p>
                                        <p><strong>Modelo:</strong> {{ $pieza->modelo }}</p>
                                        <a href="{{ route('pieza.show', $pieza->id) }}" class="btn btn-primary">Ver Pieza</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No hay piezas disponibles de este fabricante.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
