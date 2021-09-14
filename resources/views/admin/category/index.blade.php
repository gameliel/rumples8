@extends('layouts.back.base')

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Categories Table</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      ID
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Slug
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($categories as $cate)
                    <tr>
                        <td>{{ $cate->id }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>{{ $cate->slug }}</td>
                        <td class="td-actions text-right">
                          <a href="{{ url('edit-cate/'.$cate->id) }}" type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </a>
                          <a href="{{ url('delete-category/'.$cate->id)}}" type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">
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

@endsection
