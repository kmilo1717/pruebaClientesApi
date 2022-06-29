@extends('layouts.app')

@section('content')
    <div class="container-xl">

        <div class="row">
            <div class="card text-white bg-info mb-3 col-md-2" style="max-height: 30rem;">
                <div class="card-header"><b>Información api</b></div>
                <div class="card-body">
                    <h5 class="card-title"><b>Api</b></h5>
                    <p class="card-text"><b>Token:</b>  {{$api->api_key}}</p> <br>
                    <p class="card-text"><b>Api_key:</b>  {{$api->token}}</p> <br>
                    <p class="card-text"><b>Nit:</b>  {{$api->nit}}</p> <br>
                    <p class="card-text"><b>Date:</b>  {{$api->date}}</p> <br>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header pt-3"><b>Api</b>
                            @csrf
                    </div>

                    <div class="card-body">
                        @if ($api_data)
                            <table class="table" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col1">NoPrescripcion</th>
                                        <th scope="col2">TipoTec</th>
                                        <th scope="col3">ConTec</th>
                                        <th scope="col4">NoEntrega</th>
                                        <th scope="col5">FecDireccionamiento</th>
                                        <th scope="col6">EstDireccionamiento</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($api_data as $data)
                                        <tr>
                                            <th scope="row">{{ $data->ID }}</th>
                                            <td class="col1">{{ $data->NoPrescripcion }}</td>
                                            <td class="col2">{{ $data->TipoTec }}</td>
                                            <td class="col3">{{ $data->ConTec }}</td>
                                            <td class="col4">{{ $data->NoEntrega }}</td>
                                            <td class="col5">{{ $data->FecDireccionamiento }}</td>
                                            <td class="col6">{{ $data->EstDireccionamiento }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info" role="alert">
                                La api no tiene datos...
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
