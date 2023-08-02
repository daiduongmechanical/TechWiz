@extends('layout.adminLayout')
@section('title', 'View Product')
@section('content')


<div class="card-body  p-2">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    {{session()->forget('success')}}
    @endif
    <div class=" d-flex align-items-center mb-4">
        <h1>User management</h1>
    </div>
    <table id="discount__table" class="table table-striped table-bordered  border-2 border-dark">
        <thead class="thead-dark ">
            <tr>
                <th>Id</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Dob</th>
                <th>create_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $user)
            <tr>
                <td>{{$user->id}} </td>
                <td>{{$user->fullName}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->dob}}</td>
                <td>{{$user->created_at}}</td>
                <td class="text-center">
                    <button type="button" class="btn btn-warning btn-sm text-dark mr-1">
                        <a class="text-dark " style="font-size: 18px; font-weight:600" href="{{url('/manage/blockUser/'.$user->id)}}"> <i class="fas fa-ban"></i> Block</a>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm ">
                        <a class="text-dark " style="font-size: 18px; font-weight:600" href="{{url('/manage/detailUser/'.$user->id)}}"><i class="fas fa-eye text-light"></i> View</a>
                    </button>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>




@endsection