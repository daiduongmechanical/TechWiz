@extends ('admin..app')
@section('title', 'Product List')
@section ('content')

<!-- Lưu tại resources/views/product/index.blade.php -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>


                    {{-- check error --}}

                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error')}}
                    </div>
                    @endif
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('provider/update/' . $provider->provider_id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-id">Id</label>
                                <input type="text" class="form-control" id="txt-id" name="id" value="{{$provider->provider_id}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Provider Name</label>
                                <input type="text" class="form-control" id="txt-name" name="name" value="{{$provider->name}}">
                            </div>
                            <div class="form-group">
                                <label for="txt-price">Provider Country</label>
                                <input type="text" class="form-control" id="txt-country" name="country" value="{{$provider->country}}">
                            </div>
                            <div class="form-group">
                                <label for="image">Logo</label>
                                <br>
                                <img src="{{url('img/' .$provider->logo)}}" alt="{{$provider->logo}}" img width="100px">
                                
                                <div class="input-group">                                   
                                    <input type="file" id="image" name="images">
                                </div>
                            </div>
                        </div>
                        
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@section ('script-content')
<script>
    ClassicEditor
      .create( document.querySelector( '.ck-editor' ) )
      .catch( error => {
          console.error( error );
      } );

</script>
@endsection