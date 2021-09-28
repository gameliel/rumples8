@extends('layouts.back.base')

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Orders     Table</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Date created</th>
                            <th>Tracking number</th>
                            <th>Total price</th>
                            <th>Status</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($item->created_at))}}</td>
                                <td>{{ $item->tracking_no }}</td>
                                <td>{{ $item->total_price}}</td>
                                <td>{{ $item->status === '0' ?'pending' : 'completed'}}</td>
                                {{-- <td>
                                    <a href="" type="hidden" class="btn btn-success"> <i class="fas fa-trash"></i>  Remove</a>
                                </td> --}}
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

@endsection
