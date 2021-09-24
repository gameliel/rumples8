@extends('layouts.front.base2')

@push('style')
<style>
    *{
        font-family: 'Roboto', sans-serif;
    }
    .checkout-form label{
        font-size: 12px;
        font-weight: 700;
    }
    .checkout-form input{
        font-size: 14px;
        padding: 5px;
        font-weight: 400;
    }
    .bottom-pad{
        margin-bottom: 50px;
    }
</style>
@endpush

@section('content')
<div class="container bottom-pad mt-5">
    <form action="{{ url('place-order') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="card1">
                    <div class="card-body">
                        <h4>Basic Details</h4>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="name">First name</label>
                                <input type="text" class="form-control firstname" name="fname">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Last name</label>
                                <input type="text" class="form-control lastname" name="lname">
                                <span id="lname_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Email</label>
                                <input type="email" class="form-control email" name="email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Phone number</label>
                                <input type="number" class="form-control phone" name="phone">
                                <span id="phone_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="name">Address 1</label>
                                <input type="text" class="form-control address" name="address">
                                <span id="address_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Address 2</label>
                                <input type="text" class="form-control address2" name="address2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="name">City</label>
                                <input type="text" class="form-control city" name="city">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="name">State</label>
                                <input type="text" class="form-control state" name="state">
                                <span id="state_error" class="text-danger"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="name">country</label>
                                <input type="text" class="form-control country" name="country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Postcode</label>
                                <input type="text" class="form-control postcode" name="postcode">
                                <span id="postcode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="card1">
                    <div class="card-body">
                        <h4>Order Details</h4>
                        <hr>
                        <table class="table table-md table-bordered">
                            @foreach ($cartitems as $item)
                            <tbody>
                                <td>{{ $item->products->name}}</td>
                                <td>{{ $item->products->price}}</td>
                            </tbody>
                            @endforeach
                        </table>
                        <button type="submit" class="btn btn-success btn-lg w-100 float-end"><i class="far fa-money-bill-alt"></i>  Place order | COD</button>
                        <button type="submit" class="btn btn-unique btn-lg w-100 mt-3 paystack-btn">Pay with paystack</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
   {{-- i just remove the paystac form just help me out thank u --}}
</div>

@endsection
