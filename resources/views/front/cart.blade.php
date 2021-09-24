@extends('layouts.front.base2')

@section('content')

<div class="container">
    <div class="cart-detail">
        <div class="row ">
            @if($cartitems->count() > 0)
            <div class="col-md-9 col-sm-12" >
                @foreach ($cartitems as $cart)
                <div class="row">
                    <div class="col-md-4 col-sm-12 prodimagegrid">
                        <div class="prodimgcard ">
                            <img src="{{ asset('assets/uploads/products/'.$cart->products->image )}}" class="prodimage" alt="missing">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12" style="margin-bottom:1em;">
                        <div class="prod-detail-card ">
                            <div class="container">
                                {{-- <button class="deleteCartItem" data-product-id="{{$cart->product_id}}" style="margin-left: 34rem;"><i class="far fa-times-circle"></i></button> --}}
                                <button class="deleteCartItem btn btn-danger" data-product-id="{{$cart->product_id}}" style="margin-left: 32rem;"><i class="fa fa-trash"></i> Remove</button>
                                <div class="row">
                                    <div class="col-md-3">
                                        {{-- <div class="clock-bg">
                                            <i class="far fa-clock"></i>
                                            <p class="time-interval">300s</p>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-7 details">
                                        <p class="cart-prod-title cart-display"> {{ $cart->products->name }} </p>
                                        <p class="cart-prod-price cart-display"> {{ $cart->products->price }}</p>
                                        <hr class="cart-hr">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- promo code -->
            <div class="col-md-3 col-sm-12">
              <div class="summary-display-card card1">
                <div class="container-fluid">
                <h4 class="subtitle">Order Summary</h4>
                <p class="title">Summary</p>
                <table class="table table-sm table-borderless">
                  <tbody>
                    @php $total = 0;@endphp
                    @foreach ($cartitems as $item)
                    <tr class="">
                        <td>{{$item->products->name}}</td>
                        <td>{{$item->products->price}}</td>
                    </tr>
                        @php $total += $item->products->price; @endphp
                    @endforeach
                  </tbody>
                </table>
                <hr class="summary-hr">
                <p class="total_price">Total Price: {{ $total }}</p>
                <form>
                    <div class="field" style="margin-left: 27px;">
                        <div class="control">
                            <a href="{{ route('user_checkout') }}" type="button" class="btn btn-success btn-block">Proceed to Check out</a>
                        </div>
                    </div>
                </form>
                </div>
              </div>
            </div>
            @else
            <div class="container" >
                <!-- <h3 style="margin-top: 200px; color: grey;"><span style="margin-left: 89px;">Such void! </span><br> Add some product to cart</h3> -->
                <div class="noitem">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="item_text_notfound">
                                <h3>You don't have any item in your cart</h3>
                            <p>Explore our resources and mark the ones you like the most so you don’t lose sight of them.</p>
                                <a href="{{ url('/')}}" class="btn btn-primary btn-block" > Look for item</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <img src="{{ asset('assets/img/SVG/Asset 30void.svg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        let deleteCartItem = document.querySelector(".deleteCartItem");
        deleteCartItem.addEventListener("click", function(e){
            e.preventDefault();
            let productId = deleteCartItem.getAttribute("data-product-id")
            let url = "{{route('user_delete_cart')}}"
            let token =  document.head.querySelector('meta[name="csrf-token"]');
            let data = {
                "product_id": productId,
                "_token":token.content
            };
            fetch(url, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            }).then(res => res.json()).then((item) => alert(item.message));
        })

    </script>
@endpush
