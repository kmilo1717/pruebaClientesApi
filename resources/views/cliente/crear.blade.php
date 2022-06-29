@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar curso</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('salvar.cliente') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" >Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{old('name')??''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="surname" >Apellidos</label>
                                <input type="text" class="form-control" placeholder="Apellidos" name="surname" value="{{old('surname')??''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="address" >Direccion</label>
                                <input type="text" class="form-control" placeholder="Direccion" name="address" value="{{old('nameaddress')??''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="population" >Poblacion</label>
                                <input type="number" class="form-control" min="1" placeholder="Poblacion" name="population" value="{{old('population')??''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="telephone" >Telefono</label>
                                <input type="text" class="form-control" placeholder="Telefono" name="telephone" value="{{old('telephone')??''}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email" >Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')??''}}" required>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-success">
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
