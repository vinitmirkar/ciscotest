@extends('layout.1column')

@section('content')
    @include('pages.create-btn')
    @include('pages.update')
    
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>SAPID</th>
                <th>HOSTNAME</th>
                <th>LOOPBACK</th>
                <th>MACADDRESS</th>
                <th>TYPE</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@stop