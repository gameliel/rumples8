@extends('layouts.back.base')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="mx-auto col-xl-8 col-lg-8 col-md-8 col-offset-2">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit category</h4>
                    {{-- <p class="card-category">New employees on 15th September, 2016</p> --}}
                  </div>
                  <div class="card-body table-responsive">
                    <form action="{{ url('update-category/' . $category->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <select class="form-control" name="parent_id">

                          <option value="">Select Parent Category</option>
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{$category->name}}" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Slug</label>
                            <input type="text" value="{{$category->slug}}" name="slug" class="form-control" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="name">Featured</label>
                            <select class="form-control" name="featured" id="">
                                <option value="0">false</option>
                                <option value="1">true</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name='image' class="form-control" id="inputGroupFile02">
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
