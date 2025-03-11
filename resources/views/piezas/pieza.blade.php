<link rel="stylesheet" href="{{ asset('css/pieza.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@include('components.cabecera')
<div class="container mt-5 me-5">
<a href="/piezas" class="mb-4 btn btn-warning">Volver a piezas</a>
    <div class="row">
        <div class="col-md-8 mb-4">
            <!-- Imagen y detalles de la pieza -->
            <div class="card">
                <div class="card-body">
                    <div class="seccion principal">
                        <img src="{{ asset('storage/imagenesApp/piezaNombre.png')}}" alt="Imagen">
                        <h3 class="card-title">{{ $pieza->nombre }}</h3>
                    </div>
                    <hr>
                    <div class="detalles">
                        <div class="detallesSeccion">
                            <div class="seccion">
                                <img src="{{ asset('storage/imagenesApp/marca.png')}}" alt="Imagen">
                                <p><strong>Marca:</strong> {{ $pieza->marca }}</p>
                            </div>
                            <div class="seccion">
                                <img src="{{ asset('storage/imagenesApp/modelo.png')}}" alt="Imagen">
                                <p><strong>Modelo:</strong> {{ $pieza->modelo }}</p>
                            </div>
                            <div>
                                <div class="seccion">
                                    <img src="{{ asset('storage/imagenesApp/tipo.png')}}" alt="Imagen">
                                    <p><strong>Tipo:</strong> {{ $pieza->tipo }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="detallesReloj">
                            <h5>Imagen {{ $pieza ->tipo}}</h5>
                            <img class="imgreloj" src="data:image/jpeg;base64,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" alt="Imagen">
                        </div>
                    </div>
                    <hr>
                    <div class="seccion">
                        <img src="{{ asset('storage/imagenesApp/desc.png')}}" alt="Imagen">
                        <p><strong>Descripción:</strong></p>
                    </div>
                    <div class="descripcion">
                        <p>
                            {{ $pieza->descripcion }}
                        </p>
                    </div>
                    <div class="seccion">
                        <img src="{{ asset('storage/imagenesApp/fabricante.png')}}" alt="Imagen">
                        <p><strong>Ver fabricante</strong><a href="/fabricante/{{ $pieza->fabricante_id }}"><i class="ms-3 fa fa-eye"></i></a></p>
                    </div>
                    <!--<p><strong>Puntuación Promedio:</strong> 
                        
                    </p> -->


                    <h4>Dejar un comentario</h4>
                    <!-- Formulario para dejar un comentario -->
                    @auth
                    <div class="mt-4">
                        <!-- Al hacer un comentario, se redirige a la pieza -->
                        <form action="/pieza/{{ $pieza->id }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comentario">Deja tu comentario:</label>
                                <!--Se guarda como un valor oculto el valor de la pieza -->
                                <input type="hidden" name="pieza_id" value="{{ $pieza->id }}">
                                
                                <textarea name="comentario" id="comentario" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Publicar Comentario</button>
                        </form>
                    </div>
                    @else
                    <p class="mt-3">Inicia sesión para dejar un comentario.</p>
                    @endauth

                    <!-- Comentarios -->
                    <div class="mt-4">
                        <h5>Comentarios:</h5>
                        <!--Se comprueba si hay comentarios-->
                        @if($pieza->comentarios->count())
                        <ul class="list-group">
                            <!-- LLamamos a la funcion comentarios de pieza, para obtener los comentarios de la pieza -->
                            @foreach($pieza->comentarios as $comentario)
                            <li class="list-group-item">
                                <!--LLamamos a la funcion getUserName para obtener el nombre de usuario-->
                                <strong>{{ $comentario->getUserName($comentario->user_id) }}:</strong>
                                <!--Obtenemos el comentario-->
                                <p>{{ $comentario->comentario }}</p>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p>No hay comentarios para esta pieza.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>