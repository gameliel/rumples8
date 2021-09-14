@extends('layouts.back.base')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="mx-auto col-xl-8 col-lg-8 col-md-8 col-offset-2">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit brand</h4>
                    {{-- <p class="card-brand">New employees on 15th September, 2016</p> --}}
                  </div>
                  <div class="card-body table-responsive">
                    <form action="{{ url('update-brand/' . $brand->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{$brand->name}}" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input type="text" value="{{$brand->slug}}" name="slug" class="form-control" id="slug">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="update" name="submit" class="btn btn-secondary" id="slug">
                        </div>

                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
