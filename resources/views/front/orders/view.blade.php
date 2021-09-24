@extends('layouts.front.base2')

@push('style')
<style>
    .order-details label{
        font-size: 12px;
        font-weight: 700;
    }
    .order-details div{
        font-size: 14px;
    }

</style>
@endpush

@section('content')

<div class="container py-5">
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card1">
                <div class="card-header">
                    <h4 class="text-white">Order View</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 order-details">
                            <label for="">first name</label>
                            <div class="border p-2">{{ $orders->fname}}</div>

                            <label for="">last name</label>
                            <div class="border p-2">{{ $orders->lname}}</div>

                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders->email}}</div>

                            <label for="">Contact No</label>
                            <div class="border p-2">{{ $orders->phone}}</div>

                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address }}
                                {{ $orders->address2 }}
                                {{ $orders->city }}
                                {{ $orders->state }}
                                {{ $orders->country }}
                            </div>
                            <label for="">Zipcode</label>
                            <div class="border p-2">{{ $orders->postcode}}</div>
                        </div>
                        <div class="col-xl-6">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->Orderitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td> {{ $item->price }}</td>
                                            <td>
                                                <img src="{{ asset('assets/uploads/products/'.$item->products->image)}}" height="70" width="70" alt="product image">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h5>Grand total: {{ $orders->total_price}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
