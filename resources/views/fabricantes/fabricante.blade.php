<link href="{{ asset('css/fabricante.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@include('components.cabecera')
<div class="container">
    <!-- Botón para salir de la página del fabricante -->    
    <div class="row">
    <a href="/piezas" class="exit-button">Salir de Fabricante</a>

        <!-- Columna principal con detalles del fabricante -->
        <div class="col-md-8">
            <div class="card">
                <img style="margin-top: 20px;" src="{{ asset('storage/' . $fabricante->imagen) }}"  width="300px" height="200px" alt="{{ $fabricante->nombre }}">
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
                                        <!-- Botón para redirigir a la página de detalles de la pieza -->
                                        <a style="margin-bottom: 20px;" href="{{ route('pieza.show', ['id' => $pieza->id]) }}" class="view-piece-button">Ver Pieza</a>
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
