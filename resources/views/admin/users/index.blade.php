@extends('layouts.back.base')

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users Table</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Date created</th>
                            <th>Name</th>
                            <th>User Type</th>
                            {{-- <th>Email</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($item->created_at))}}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->user_type}}</td>
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
