@extends('layouts.front.base2')

@section('content')

    <div class="container" style="margin-top: 5rem;">
        <div class="main">
          <div class="row product_data">
              <div class="close">
                  <a href="{{ url('/')}}">
                    <i class="fas fa-times"></i>
                  </a>
              </div>
              <div class="col-md-4">
                <div id="carouselContent" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselContent" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselContent" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  </div>
                  <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active text-left p-4">
                                <img src="{{ asset('assets/uploads/products/' .$product->image)}}" class="bimg para d-block w-100" alt="test">
                        </div>
                        <div class="carousel-item text-left p-4">
                              <img src="{{ asset('assets/uploads/products/' .$product->image)}}" class="bimg para d-block w-100" alt="test">
                        </div>
                  </div>
                  </div>
                  <!-- product card ends here -->
              </div>
              <div class="col-md-6">
                <div class="sec-column">
                  <div class="product-title">
                    <h5>{{$product->name}}</h5>
                  </div>
                  <hr>
                  <p class="pro_price m-price">N{{$product->price}}</p>
                  <del class="pro_price"><p>N{{$product->discount_price}}</p> </del>
                  <!-- product description -->
                  <p>{{ $product->short_description }}</p>
                    <input type="hidden" value="{{ $product->id }}" class="prod_id">
                    <button class="btn btn-primary btn-md my-0 p addToCartBtn" data-product-id="{{$product->id}}">
                      <i class="fas fa-dolly pro_cart-btn"></i>
                      add to cart
                    </button>
                    <hr>
                    <div class="pro-features">
                      <p> {{ $product->description }} </p>
                    </div>
                </div>
              </div>
              <div class="space" style="margin-bottom: 100px;"> </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script>
    // $(document).ready(function (){

    //     $('.addToCartBtn').click(function (e) {
    //         e.preventDefault();

    //         var product_id = $(this).closest('.product_data').find('.prod_id').val();

    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //         $.ajax({
    //             method: "POST",
    //             url: "/add-to-cart",
    //             data: {
    //                 'product_id': product_id,
    //             },
    //             success: function (response) {
    //                 alert(response.status);
    //             }
    //         });

    //     });
    // });
</script>
@endsection

@push('script')
    <script>
        let addToCartBtn = document.querySelector(".addToCartBtn");
        addToCartBtn.addEventListener("click", function(e){
            e.preventDefault();
            let productId = addToCartBtn.getAttribute("data-product-id")
            let url = "{{route('user_add_to_cart')}}"
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
            }).then(res => res.json()).then((item) => console.log(item.message));
        })

    </script>
@endpush
