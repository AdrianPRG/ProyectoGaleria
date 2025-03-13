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
                        <img src="{{ asset('storage/imagenesApp/objeto.png')}}" alt="Imagen">
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
                            <img class="imgreloj" src="{{ asset('storage/' . $pieza->imagen) }}" alt="{{ $pieza->nombre }}">
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