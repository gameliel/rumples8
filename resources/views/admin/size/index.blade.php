@extends('layouts.back.base')

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Sizes Table</h4>
              <p class="card-sizegory"> Here is a subtitle for this table</p>
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
                    @foreach ($sizes as $size)
                    <tr>
                        <td>{{ $size->id }}</td>
                        <td>{{ $size->name }}</td>
                        <td>{{ $size->slug }}</td>
                        <td class="td-actions text-right">
                          <a href="{{ url('edit-size/'.$size->id) }}" type="button" rel="tooltip" title="Edit Task" class="btn btn-white btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </a>
                          <a href="{{ url('delete-size/'.$size->id)}}" type="button" rel="tooltip" title="Remove" class="btn btn-white btn-link btn-sm">
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
