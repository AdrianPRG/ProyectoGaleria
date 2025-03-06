<!-- CSS dentro de una etiqueta <style> -->
<style>
    /* Contenedor principal */
    div {
        height: 100%; /* Asegura que el div ocupe el 100% de la altura disponible */
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start; /* Alinea las piezas al inicio */
        flex-wrap: wrap;
        margin: 20px;
        gap: 30px; /* Espacio entre las piezas */
        background-color: rgb(203, 207, 205);
        padding: 20px;
    }

    /* Estilo de cada pieza */
    .pieza {
        flex-direction: column;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgb(178, 194, 207);
        border-radius: 10px;
        border: 1px solid #ccc; /* Borde más suave */
        width: 350px;
        height: 500px;
        padding: 20px; /* Espaciado interno */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidad */
        transition: transform 0.3s ease-in-out; /* Efecto suave al hacer hover */
    }

    /* Estilo de las piezas cuando se pasa el ratón por encima */
    .pieza:hover {
        transform: translateY(-10px); /* Movimiento al pasar el ratón */
    }

    /* Imagen dentro de la pieza */
    .pieza img {
        width: 200px; /* Tamaño adecuado para la imagen */
        height: 200px;
        object-fit: cover; /* Asegura que la imagen mantenga su proporción sin deformarse */
        border-radius: 8px; /* Bordes redondeados */
        margin-bottom: 15px; /* Espacio debajo de la imagen */
    }

    /* Estilo de los textos dentro de las piezas */
    .pieza h2 {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .pieza p {
        font-size: 16px;
        color: #555;
        margin: 5px 0;
    }

    /* Mejorar el estilo de los párrafos específicos */
    .pieza .tipo, .pieza .marca, .pieza .modelo {
        font-size: 14px;
        color: #777;
    }
</style>

<!-- El contenido de la vista -->
<div>
    @foreach($piezas as $pieza)
        <div class="pieza">
            <h2>{{ $pieza->nombre }}</h2>
            <img src="{{ $pieza->imagen }}" alt="{{ $pieza->nombre }}">
            <p class="tipo">- Tipo: {{ $pieza->tipo }}</p>
            <p class="marca">- Marca: {{ $pieza->marca }}</p>
            <p class="modelo">- Modelo: {{ $pieza->modelo }}</p>
        </div>
    @endforeach
</div>
