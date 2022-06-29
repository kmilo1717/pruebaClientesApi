@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem; max-height: 12rem;">
                <div class="card-header">Información cuenta</div>
                <div class="card-body">
                    <h5 class="card-title">Nivel {{ auth()->user()->level }}</h5>
                    @if (auth()->user()->level < 7)
                        <p class="card-text">El usuario actualmente no tiene comentarios. <br> Adquiere mas cursos!</p> <br>
                    @else
                        <p class="card-text">El usuario actualmente es ⭐<b>Diplomado</b>⭐. <br> A por mas cursos!</p> <br>
                    @endif
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pt-3"><b>Cursos tomados</b>
                        <form action="{{ route('encontrar.cliente') }}" method="POST">
                            @csrf
                            <div class="input-group w-50 float-right">
                                <input type="text" class="form-control" placeholder="Buscar cliente"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="buscar" id="buscar">
                                <div class="input-group-append">
                                    <input class="btn btn-outline-secondary" type="submit" value="buscar">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!$cursosfind->isEmpty())
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Caracteristicas</th>
                                        <th scope="col">Puntos</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($cursosfind as $cliente)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $cliente->feature }}</td>
                                            <td>{{ $cliente->points }}</td>
                                            <td>{{ $cliente->status }}</td>
                                            <td>  
                                                <a href="{{ route('gestion.cliente', ['id' => $cliente->id]) }}"><i class="bi bi-pencil-square"></i>  Editar</a>                                             
                                          </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <br>
                            <a href="{{ route('crear.cliente') }}" class="btn btn-dark mx-auto">Registrar cliente</a>
                            <br> <br>
                        @else
                            <div class="alert alert-info" role="alert">
                                No hay ninguna coincidencia exitente. Te recomendamos buscar por palabra clave (Solo 1).
                            </div>
                        @endif

                        @if (session('message'))
                            <div class="alert alert-success"  id="infalert" role="alert">
                                {{ session('message') }}
                            </div>
                            <script>
                                setTimeout(function(){ $('#infalert').fadeOut(1000); }, 5000);
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
