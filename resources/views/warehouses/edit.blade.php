@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">SANDELIAI</div>
                    <div class="card-body text-center">
                        <a class="btn btn-secondary" href="{{route('warehouse.index')}}">Atgal i sarasa</a>
                        <form method="POST" action="{{isset($warehouse)?route('warehouse.update',$warehouse->id):route ('warehouse.store')}}">
                            @csrf
                            @if (isset($warehouse))
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label float-start" >Pavadinimas:</label>
                                <input class="form-control"  name="name" type="text" value="{{isset($warehouse)?
                                $warehouse->name:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label float-start" >Adresas:</label>
                                <input class="form-control"  name="address" type="text"
                                       value="{{isset($warehouse)?$warehouse->address:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label float-start" >Miestas:</label>
                                <input class="form-control"  name="city" type="text" value="{{isset
                                ($warehouse)?$warehouse->city:''}}">
                            </div>
                            <button type="submit" class="btn btn-info">{{isset($warehouse)
                            ?'Issaugoti':'Prideti'}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


