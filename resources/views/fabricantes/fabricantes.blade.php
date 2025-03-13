<link rel="stylesheet" href="{{ asset('css/fabricantes.css') }}">
<div class="container">
    <h1 class="mb-4">Lista de Fabricantes</h1>

    <a href="aa" class="btn btn-success mb-3">Agregar Nuevo Fabricante</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fabricantes as $fabricante)
                <tr>
                    <td>{{ $fabricante->id }}</td>
                    <td>{{ $fabricante->nombre }}</td>
                    <td>{{ $fabricante->descripcion }}</td>
                    <td>
                        @if ($fabricante->imagen)
                           <!-- <img src="{{ asset('storage/' . $fabricante->imagen) }}" alt="Imagen de {{ $fabricante->nombre }}" width="80"> -->
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>{{ $fabricante->activo ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="fabricante/{{ $fabricante->id }}" class="btn btn-info">Ver</a>
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
