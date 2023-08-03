@extends ('layout.adminLayout')
@section('title', 'Product List')
@section ('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Admin Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Admin</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->

<br><br><br><br>



<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">List Admin</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="product" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Dob</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->fullName }}</td>
                            <td>{{ $a->email }}</td>
                            <td>{{ $a->password }}</td>
                            <td>{{ $a->dob }}</td>
                            <td>{{ $a->role }}</td>

   
                            <td class="text-right">
                               
                                <a class="btn btn-info btn-sm" href="{{ url('admin/edit/'.$a->id) }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ url('admin/delete/'.$a->id) }}" onclick="return confirm('Are you sure??')">
                                    
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                           
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                       
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
