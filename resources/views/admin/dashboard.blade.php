@extends('layouts.back.base')

@section('content')


<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Products</p>
              <h3 class="card-title">100
                <small>Items</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">store</i>
                <a href="#pablo" class="warning-link">Check</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">category</i>
              </div>
              <p class="card-category">Categories</p>
              <h3 class="card-title">40
                <small>Categories</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">category</i> Check
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">polymer</i>
              </div>
              <p class="card-category">Brands</p>
              <h3 class="card-title">20 Brands</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">polymer</i> Check
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">personoutline</i>
              </div>
              <p class="card-category">Users</p>
              <h3 class="card-title">30
                <small>Customers</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">personoutline</i> Check
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header card-header-tabs card-header-warning">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">Tasks:</span>
                    <ul class="nav nav-tabs" data-tabs="tabs">
                      <li class="nav-item">
                        <a class="nav-link active" href="#profile" data-toggle="tab">
                          <i class="material-icons">bug_report</i> Bugs
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#messages" data-toggle="tab">
                          <i class="material-icons">code</i> Website
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#settings" data-toggle="tab">
                          <i class="material-icons">cloud</i> Server
                          <div class="ripple-container"></div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="profile">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Brief</th>
                        <th>Price</th>
                        <th>Discount price</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Size</th>
                        <th>Brand</th>
                      </thead>
                      <tbody>
                        @foreach ($products as $prod)
                        <tr>
                          <td>{{ $prod->id }}</td>
                          <td>{{ $prod->name }}</td>
                          <td>{{ $prod->short_description }}</td>
                          <td>{{ $prod->price }}</td>
                          <td>{{ $prod->discount_price }}</td>
                          <td>{{ $prod->stock_status }}</td>
                          <td>{{ $prod->image }}</td>
                          <td>{{ $prod->category_id }}</td>
                          <td>{{ $prod->size_id }}</td>
                          <td>{{ $prod->brand_id }}</td>
                          <td class="td-actions text-right">
                            <a href="{{ url('edit-product/'. $prod->id) }}" type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </a>
                              <a href="{{ url('delete-product/'. $prod->id)}}" type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">
                                <i class="material-icons">close</i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>


@endsection
