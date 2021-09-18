@extends('layouts.front.base2')

@section('content')

<div class="container">
    <div class="row first-row">
        @foreach ($products as $product)
          <div id="product" class="col-lg-3 col-md-3 col-xm-3 col-sm-12 " style="margin-bottom: 23px;">
            <div class="content">
              <div class="brp">
                <div class="content-overlay"></div>
              <div class="pimg">
                <img src="{{ asset('assets/uploads/products/' .$product->image)}}" class="d-block w-100" alt="image here">
              </div>
              <div class="text-center">
              <p class="title">{{$product->name}}</p>
                <p class="price">{{$product->price}}</p>
                <del class="price"><p>{{$product->discount_price}}</p> </del>
              </div>
              </div>
              <div class="align-content-center content-details fadeIn-bottom">
                {{-- <a href="#"><img class="order-3 p-2" src="{{ asset('assets/img/SVG/view.svg') }}" style="width: auto%; margin-left: 56px;" alt=""></a>
                <a href="#"><img class="order-2 p-2" src="{{ asset('assets/img/SVG/add_to_cart.svg') }}" style=" margin-left: 140px; margin-top: -74px;" alt=""></a> --}}
                <a href="{{ url('detail/'.$product->id)}}"><img src="{{ asset('assets/img/SVG/view.svg') }}" style="width: 98%;" alt=""></a>
                <a href="#"><img src="{{ asset('assets/img/SVG/add_to_cart.svg') }}" style="width: 100%;" alt=""></a>
              </div>
            </div>
          </div>
          @endforeach
      </div>
</div>

@endsection
