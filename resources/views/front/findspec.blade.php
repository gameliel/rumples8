@extends('layouts.front.base2')

@section('content')
@section('style')
    <style>
        body{
            background: #f5f5f5;
        }
        .section{
            margin-bottom: 100px;
        }
        .form{
            margin-top: 50px;
            margin-left:50px;
            margin-bottom: 50px;
        }
       .form .form-group .neck{
            margin-left: -113px;
            margin-top: 56px;
        }
        .form .form-group .neck select{
            background: transparent;
            border-color: aliceblue;
            margin-left: -43px;
        }
    </style>
@endsection
<div class="section">
    <div class="container">
        <div class="card">
            <form action="{{ url('insert-spec') }}" method="POST" class="form" >
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('assets/img/spec/head.png')}}" alt="">
                                </div>
                                <div class="col neck">
                                    <select name="neck_id" id="" class="form-control">
                                        @foreach ($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('assets/img/spec/body.png')}}" alt="">
                                </div>
                                <div class="col neck">
                                    <select name="body_id" id="" class="form-control">
                                        @foreach ($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('assets/img/spec/leg.png')}}" alt="">
                                </div>
                                <div class="col neck">
                                    <select name="leg_id" id="" class="form-control">
                                        @foreach ($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('assets/img/spec/Asset 1.svg')}}" style="width: 49%; margin-top:-189px;" alt="">
                                </div>
                                <div class="col neck">
                                    <select name="foot_id" id="" class="form-control">
                                        @foreach ($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="form-group py-5 align-items-center" style="margin-left: 549px;">
                        <button class="btn btn-success">Save spec</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
