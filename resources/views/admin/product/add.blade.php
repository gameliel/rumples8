@extends('layouts.back.base')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="mx-auto col-xl-9 col-lg-9 col-md-9 col-offset-2">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Product</h4>
                    {{-- <p class="card-category">New employees on 15th September, 2016</p> --}}
                  </div>
                  <div class="card-body table-responsive">
                    <form action="{{ url('insert-product')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug">
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="name">Breif Description</label>
                        <textarea class="form-control" name="short_description" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Features</label>
                        <textarea class="form-control" name="description" rows="4"></textarea>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                              <label for="name">Price</label>
                              <input type="number" name="price" class="form-control" id="name">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                              <label for="name">Discount Price</label>
                              <input type="number" name="discount_price" class="form-control" id="slug">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                              <label for="name">SKU</label>
                              <input type="text" name="SKU" class="form-control" id="name">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                              <label for="name">Stock status</label>
                              <select class="form-control" name="stock_status" aria-label="Default select example">
                                  <option selected>inStock</option>
                                  <option selected>outofstock</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name">Featured</label>
                                <select class="form-control" name="featured" aria-label="Default select example">
                                  <option selected>0</option>
                                  <option selected>1</option>
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="name">Categories</label>
                            <select class="form-control" name="category_id" aria-label="Default select example">
                                @foreach ($categories as $cate)
                                    <option style="background: #1a2035;" value="{{ $cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                              <label for="name">Brands</label>
                              <select class="form-control" name="brand_id" aria-label="Default select example">
                                @foreach ($brands as $brand)
                                    <option style="background: #1a2035;" value="{{ $brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name">Sizes</label>
                                <select class="form-control" name="size_id" aria-label="Default select example">
                                    @foreach ($sizes as $size)
                                        <option style="background: #1a2035;" value="{{ $size->id}}">{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="image">Image</label>
                          <input type="file" name='image' class="form-control" id="inputGroupFile02">
                      </div>
                        <div class="form-group">
                            <input type="submit" value="add" name="submit" class="btn btn-secondary" id="slug">
                        </div>

                    </form>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
