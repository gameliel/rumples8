@extends('layouts.front.base2')

@section('content')

<div class="about-image pb-5">
    <div class="container py-5">
      <div class="row py-5 align-items-center">
           
      </div>
    </div>
  </div>
    <div class="container" style="margin-bottom: 500px;">
        <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{% url 'frontpage' %}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
              </ol>
        </nav>	
        <h3>
            What you should know !
        </h3>
        <p>RUMPLES is Nigeria’s ultimate Okrika (thrift) store for Men. Our plan is avail the 
            Nigerian gentleman a more convenient access to high-end secondhand clothing at the 
            fairest prices. To always think secondhand first. </p>
           <p>You can shop like-new and neatly used top brand clothing for Men at our online and 
               physical stores, finding your favorite brands for less. Have fun shopping tons of new arrivals daily.</p>
    </div>

@endsection