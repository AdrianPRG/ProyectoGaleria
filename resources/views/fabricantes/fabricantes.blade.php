<link href="{{ asset('css/fabricantes.css') }}" rel="stylesheet">
@include('components.cabecera')

<div class="container">
    <h1>Lista de Fabricantes</h1>

    @if(Auth()->user()->is_admin)
        <a href="aa" class="btn btn-success">Agregar Nuevo Fabricante</a>
    @endif

    <div class="grid-container">
        @foreach ($fabricantes as $fabricante)
        <div class="column"> <!-- Cambié 'card' por 'column' -->
            <h2>{{ $fabricante->nombre }}</h2>
            <div class="image-container">
                @if ($fabricante->imagen)
                    <img src="{{ asset('storage/' . $fabricante->imagen) }}" alt="{{ $fabricante->nombre }}">
                @else
                    <p class="no-image">Imagen no disponible</p>
                @endif
            </div>
            <p><strong>ID:</strong> {{ $fabricante->id }}</p>
            <p><strong>Activo:</strong> 
                <span class="status {{ $fabricante->activo ? 'activo' : 'inactivo' }}">
                    {{ $fabricante->activo ? 'Sí' : 'No' }}
                </span>
            </p>
            <div class="column-buttons"> <!-- Cambié 'card-buttons' por 'column-buttons' -->
                <a href="fabricante/{{ $fabricante->id }}" class="btn btn-success">Ver</a>
                @if(Auth()->user()->is_admin)
                    <a href="fabricante/{{ $fabricante->id }}/eliminar" class="btn btn-danger">Eliminar</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
