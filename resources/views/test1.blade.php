@extends('layout.adminLayout')
@section('title', 'View Product')
@section('content')


<div class="card-body  p-2">
    <div class=" d-flex align-items-center mb-4">
        <h1>Discount List</h1>
    </div>
    <table id="discount__table" class="table table-striped table-bordered  border-2 border-dark">
        <thead thead class="thead-dark ">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Startdate</th>
                <th>Enddate</th>
                <th>Object</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>


                <td>discountid </td>
                <td>discountname</td>
                <td>discountamount</td>
                <td>startdate</td>
                <td>enddate</td>
                <td>object</td>

            </tr>

            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Startdate</th>
                <th>Enddate</th>
                <th>Object</th>
                <th>Action</th>
            </tr>
            </thead>
        <tbody>

            <tr>


                <td>discountid </td>
                <td>discountname</td>
                <td>discountamount</td>
                <td>startdate</td>
                <td>enddate</td>
                <td>object</td>


            </tr>

        </tbody>

    </table>
</div>
</div>
</div>

<script>
    $(function() {
        $('#discount__table').DataTable();
    });
</script>


@endsection