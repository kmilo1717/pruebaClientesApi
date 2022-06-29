@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestionar curso</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('actualizar.cliente') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$cliente->id}}" />
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="name" required value="{{$cliente->nombre}}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="surname" required value="{{$cliente->apellidos}}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="address" required value="{{$cliente->direccion}}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="poblacion" class="col-md-4 col-form-label text-md-right">Poblacion</label>

                            <div class="col-md-6">
                                <input id="poblacion" type="number" class="form-control" name="population" value="{{$cliente->poblacion}}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telephone" required value="{{$cliente->telefono}}" autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" required value="{{$cliente->email}}" autofocus required>
                            </div>
                        </div>
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 d-inline-block">
                                <button type="submit" class="btn btn-info">
                                    Actualizar
                                </button>
                                <a href="{{ route('eliminar.cliente', ['id'=> $cliente->id])}}" class="btn btn-danger ml-3">Eliminar</a>
                            </div>                 
                        </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
