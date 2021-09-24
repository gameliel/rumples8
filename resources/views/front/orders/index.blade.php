@extends('layouts.front.base2')

@section('content')

<div class="container py-5">
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card1">
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Date created</th>
                                <th>Tracking number</th>
                                <th>Total price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($item->created_at))}}</td>
                                    <td>{{ $item->tracking_no }}</td>
                                    <td>{{ $item->total_price}}</td>
                                    <td>{{ $item->status === '0' ?'pending' : 'completed'}}</td>
                                    <td>
                                        <a href="{{ url('/view-order/'.$item->id) }}" class="btn btn-success">View</a>
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

@endsection
