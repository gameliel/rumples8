@extends('layouts.front.base')

@section('content')


<div class="row">
  <div class="col-md-6 col-sm-12">
    <div class="container">
      <div class="text-background" style="margin-left: 114px; margin-top: 135px;">
        <h2 class="col-md-7 mx-auto text-black " style="font-size: 50px;">Up to 30% off </h2>
        <p class="h5 col-md-7 mx-auto pb-5 mb-5 text-black-50 aa">Hello..  Save on your first order on our  first grade Okrika Shirts when you sign up</p>
        <div class="load-mores">
          <a href="#product" class="btn btn-outline-primary load-more">START PICKING</a>
      </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-sm-12">
    <div class="banner-image pb-5">
      <div class="container py-5">
        <div class="row py-5 align-items-center">

        </div>
      </div>
    </div>
  </div>
</div>
<!-- end of carusel -->
<section class="trending-pro container">
  <div class="header">
    <h1 style="color: #ffffff">TRENDING PICK</h1>
  </div>
  <div class="row first-row">
    @foreach ($categories as $product)
          <div id="product" class="col-lg-3 col-md-3 col-xm-3 col-sm-6 col-xm-6 " style="margin-bottom: 23px;">
            <div class="content">
              <div class="brp">
                <div class="content-overlay"></div>
              <div class="pimg">
                <img src="{{ asset('assets/uploads/category/' .$product->image)}}" class="d-block w-100" alt="image here">
              </div>
              <div class="text-center">
              <p class="title">{{$product->name}}</p>
              </div>
              </div>
              <div class="align-content-center content-details fadeIn-bottom">
                {{-- <a href="#"><img class="order-3 p-2" src="{{ asset('assets/img/SVG/view.svg') }}" style="width: auto%; margin-left: 56px;" alt=""></a>
                <a href="#"><img class="order-2 p-2" src="{{ asset('assets/img/SVG/add_to_cart.svg') }}" style=" margin-left: 140px; margin-top: -74px;" alt=""></a> --}}
                <a href="{{ url('category_detail/'.$product->slug) }}"><img src="{{ asset('assets/img/SVG/view.svg') }}" style="width: 98%;" alt=""></a>
              </div>
            </div>
          </div>
      @endforeach
  </div>
  <div class="text-center load-more">
    <a href="/shop" class="btn btn-outline-primary load-more">Check more</a>
  </div>
</section>
</div>
</div>
<!-- end of first section  -->


<!-- video section -->
{{-- <div class="video">
<video controls>
<source src="../assets/video/VID-20201004-WA0005.mp4" type="video/mp4">
Your browser does not support HTML5 video.
</video>
</div> --}}
<!-- end of video section -->

<!-- newsletter section -->
<div class="newsletter">
<div class="news-background">
<div class="content text-center container">
<h4>Be the first to get notified</h4>
<small style="font-size: 11px; margin-top:-2px;">Let's have your WhatsApp Number to notify you when a new bale opens</small>
<form class="form-inline md-form mr-auto" style="margin-top: 29px;">
  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
  <button class="btn btn-unique btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
</form>
<small style="font-size: 11px; margin-top:-2px;" class="respect">We respect your privacy and anxiousness, so we never share your info
  or send spams.</small>
</div>
</div>
</div>
<!-- end of newsletter section -->
<!-- from IG -->
<div class="instagram">
<div class="container text-center">
<h3 class="ig-experience">Share your Rumple Experience #Rumples</h3>
<p class="ig-text"> <img src="../assets/img/029-instagram.svg" class="ig" alt=""> Follow <b>@Rumplesandco</b> for inspiration. </p>
</div>
<div class="container">
<div class="row">
<div class="col-md-2 col-sm-12">
<img src="../assets/img/download (2).jpeg" class="d-block w-100" alt="">
</div>
<div class="col-md-2 col-sm-12">
<img src="../assets/img/download (3).jpeg" class="d-block w-100" alt="">
</div>
<div class="col-md-2 col-sm-12">
<img src="../assets/img/images.jpeg" class="d-block w-100" alt="">
</div>
<div class="col-md-2 col-sm-12">
<img src="../assets/img/download (2).jpeg" class="d-block w-100" alt="">
</div>
<div class="col-md-2 col-sm-12">
<img src="../assets/img/download (3).jpeg" class="d-block w-100" alt="">
</div>
<div class="col-md-2 col-sm-12">
<img src="../assets/img/images.jpeg" class="d-block w-100" alt="">
</div>
</div>
</div>

</div>
<!-- end of IG section -->
<!-- horizontal line -->
<div class="container">
<hr>
</div>

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
            }).then(res => res.json()).then((item) => alert(item.message));
        })

    </script>
@endpush
