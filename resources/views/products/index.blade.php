@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">PREKES</div>
                    <div class="card-body">
                        @can('create')
                            <a class="btn btn-secondary float-end" href="{{route('products.create')}}">Prideti
                                nauja preke</a>
                        @endcan
                        {{--Filtravimo laukelis--}}
                            @if(isset($warehouses))
                        <div class="mb-3 mt-5">
                            <h5 class="mb-3">Prekiu filtravimas</h5>
                            <form method="post" action="{{route('products.filter')}}">
                                @csrf
                                <label class="form-label">Pasirinkite sandeli: </label>
                                    <select  class="form-select-sm" name="warehouse_id">
                                        @foreach($warehouses as $warehouse)
                                            <option value=""></option>
                                            <option value="{{$warehouse->id}}">{{$warehouse->name}}
                                                ({{$warehouse->city}})
                                                </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-sm btn-secondary ms-3">Filtruoti</button>
                            </form>
                        </div>
                             @endif
{{--                        Prekiu paieskos laukelis--}}
                            <div class="my-5">
                                <h5>Prekiu paieska</h5>
                                <div class="d-flex">
                                <form method="post" action="{{route('products.search')}}">
                                    @csrf
                                    <label class="form-label">Pagal pavadinima (ar teksta): </label>
                                    <input type="text" value="" name="name" class="form-text">
                                    <button class="btn btn-sm btn-secondary ms-3">Ieskoti</button>
                                </form>
                                <form method="post" action="{{route('products.search')}}">
                                    @csrf
                                    <label class="form-label ms-5">Pagal vnt kaina (ar skaiciu): </label>
                                    <input type="number" value="" name="price" class="form-text">
                                    <button class="btn btn-sm btn-secondary ms-3">Ieskoti</button>
                                </form>
                                </div>
                            </div>
{{--                            Prekiu sarasas--}}
                            <div class="border-top border-bottom text-center">
                                <h5 class="my-3">Prekiu sarasas</h5>
                            </div>
                        <table class="table">
                            <thead class="">
                            <tr>

                                <th >
                                    Pavadinimas

                                    <a class="text-decoration-none ms-2" href="{{route('products.index',
                                    'name')
                                    }}">

                                    &uparrow;
                                    </a>

                                    <a class="text-decoration-none ms-2" href="{{route('products.sort', 'name')
                                    }}">
                                        &downarrow;
                                    </a>

                                </th>
                                <th >
                                    Kiekis <a class="text-decoration-none ms-2" href="{{route('products.index', 'quantity')
                                    }}">&uparrow;</a>
                                    <a class="text-decoration-none ms-2" href="{{route('products.sort', 'quantity')
                                    }}">&downarrow;</a>
                                </th>
                                <th>
                                    Vnt. kaina <a class="text-decoration-none ms-2" href="{{route('products.index',
                                    'price')}}">&uparrow;</a>
                                    <a class="text-decoration-none ms-2" href="{{route('products.sort', 'price')}}">&downarrow;</a>
                                </th>
                                <th>Bendra suma</th>
                                <th>Sandelys</th>
                                <th>Miestas</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)

                                <tr>
                                    <td> {{$product->name}}</td>
                                    <td>{{$product->quantity}} vnt</td>
                                    <td>{{$product->price}} eur</td>
                                    <td>{{$product->price*$product->quantity}} eur</td>
                                    <td>{{$product->warehouse->name}}</td>
                                    <td>{{$product->warehouse->city}}</td>

                                    <td class="d-flex justify-content-end">
                                        @can('edit')
                                            <a class="btn btn-secondary me-2" href="{{route ('products.edit', $product->id)
                                         }}">Redaguoti</a>
                                        @endcan
                                        @can('delete')
                                            <form action="{{route('products.destroy', $product->id)}}" method="post">
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


