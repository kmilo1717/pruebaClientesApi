@extends('layouts.app')

@section('content')
    <div class="container-xl">

        <div class="row">
            <div class="card text-white bg-info mb-3 col-md-2" style="max-height: 22rem;">
                <div class="card-header">Información clientes</div>
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Hay {{$clientes->count()}} cliente/s registrados</p> <br>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header pt-3"><b>Clientes</b>
                            @csrf
                            <div class="input-group w-50 float-right">
                                <div class="input-group-append">
                                    <select class="custom-select" id="type-filter">
                                        <option value="1">Nombre</option>
                                        <option value="2">Apellido</option>
                                        <option value="3">Direccion</option>
                                        <option value="4">Poblacion</option>
                                        <option value="5">Telefono</option>
                                        <option value="6">Email</option>
                                      </select>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscar cliente"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="buscar" id="buscar">
                            </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!$clientes->isEmpty())
                            <table class="table" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col1">Nombre</th>
                                        <th scope="col2">Apellidos</th>
                                        <th scope="col3">Direccion</th>
                                        <th scope="col4">Poblacion</th>
                                        <th scope="col5">Telefono</th>
                                        <th scope="col6">Email</th>
                                        <th scope="col7"></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td class="col1">{{ $cliente->nombre }}</td>
                                            <td class="col2">{{ $cliente->apellidos }}</td>
                                            <td class="col3">{{ $cliente->direccion }}</td>
                                            <td class="col4">{{ $cliente->poblacion }}</td>
                                            <td class="col5">{{ $cliente->telefono }}</td>
                                            <td class="col6">{{ $cliente->email }}</td>
                                            <td class="col7">  
                                                <a href="{{ route('gestion.cliente', ['id' => $cliente->id]) }}"><i class="bi bi-pencil-square"></i>  Editar</a>                                             
                                          </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <br>
                            <a href="{{ route('crear.cliente') }}" class="btn btn-dark mx-auto">Registrar clientes</a>
                            <br> <br>
                        @else
                            <div class="alert alert-info" role="alert">
                                No tienes ningun cliente registrado... <a href="{{ route('crear.cliente') }}"
                                    class="alert-link">registra un cliente</a>.
                            </div>
                        @endif

                        <div class="alert alert-info disabled" id="no-data" role="alert">
                            No hay coincidencia
                        </div>

                        @if (session('message'))
                            <div class="alert alert-success" id="infalert" role="alert">
                                {{ session('message') }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    $('#infalert').fadeOut(1000);
                                }, 5000);

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
