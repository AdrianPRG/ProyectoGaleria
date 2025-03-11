<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Nueva Pieza</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" style="padding:50px;margin:50px;border-radius: 10px;border: 2px solid #000000;">
        <h2>Insertar Nueva Pieza</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="reloj">Reloj</option>
                    <option value="brujula">Brujula</option>
                    <option value="collar">Collar</option>
                    <option value="pulsera">Pulsera</option>
                    <option value="anillo">Anillo</option>
                    <option value="pendiente">Pendiente</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control" accept="image/*" required>
            </div>
            
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Eliga una categoria</label>
                <select name="categoria" id="categoria" class="form-control">
                @foreach ($conjunto['categorias'] as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fabricante" class="form-label">Eliga un fabricante</label>
                <select name="fabricante" id="fabricante" class="form-control">
                @foreach ($conjunto['fabricantes'] as $fabricante)
                    <option value="{{ $fabricante->id }}">{{ $fabricante->nombre }}</option>
                @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>


