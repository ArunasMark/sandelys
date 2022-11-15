@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">PREKES</div>
                    <div class="card-body text-center">
                        <a class="btn btn-secondary" href="{{route('products.index')}}">Atgal i sarasa</a>
                        <form method="POST" action="{{isset($product)?route('products.update',$product->id):route('products.store')}}">
                            @csrf
                            @if (isset($product))
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label float-start" >Pavadinimas:</label>
                                <input class="form-control"  name="name" type="text" value="{{isset($product)?
                                $product->name:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label float-start" >Kiekis:</label>
                                <input class="form-control"  name="quantity" type="number"
                                       value="{{isset($product)?$product->quantity:''}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label float-start" >Vnt. kaina:</label>
                                <input class="form-control"  name="price" type="text" value="{{isset
                                ($product)?$product->price:''}}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label float-start">Pasirinkite sandeli:</label>
                                <select name="warehouse_id" class="form-select" >
                                    @foreach($warehouses as $warehouse)
                                        <option value=""></option>
                                        <option value="{{$warehouse->id}}" {{isset($product)&&
                                        ($warehouse->id==$product->warehouse_id)?'selected':''}} >
                                            {{$warehouse->name}} ({{$warehouse->city}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">{{isset($product)
                            ?'Issaugoti':'Prideti'}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



