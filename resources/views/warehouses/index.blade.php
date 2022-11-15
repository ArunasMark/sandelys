@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">SANDELIAI</div>
                    <div class="card-body">
                        <div class="mt-3">
                        <form method="post" action="{{route('warehouse.search')}}">
                            @csrf
                            <label class="form-label">Paieska pagal miesta: </label>
                            <input type="text" value="" name="city" class="form-text">
                            <button class="btn btn-sm btn-secondary ms-3">Ieskoti</button>
                        </form>

                            @can('create')
                                <a class="btn btn-secondary float-end" href="{{route('warehouse.create')}}">Prideti nauja sandeli</a>
                            @endcan
                        </div>

                        <table class="table" >

                            <thead class="text-center">
                            <tr>
                                <th >Pavadinimas </th>
                                <th >Adresas</th>
                                <th >Miestas</th>

                                <th ></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warehouses as $warehouse)
                                <tr class="text-center">
                                    <td >{{$warehouse->name}}</td>
                                    <td >{{$warehouse->address}}</td>
                                    <td >{{$warehouse->city}}</td>

                                    {{--tam tikro sandelio prekes--}}
                                    <td  class="text-center d-flex justify-content-end " >
                                        <a href="{{route('warehouseProducts', $warehouse->id)}}" class="btn
                                        btn-info me-5">Prekes</a>
                                    {{--redagavimo mygtukas--}}
                                        @can('edit')
                                        <a class="btn btn-secondary me-3" href="{{route('warehouse.edit',
                                        $warehouse->id)}}">Redaguoti</a>
                                        @endcan
                                    {{--trynimo forma ir mygtukas--}}
                                        @can('delete')
                                        <form action="{{route('warehouse.destroy', $warehouse->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Istrinti</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

