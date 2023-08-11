@extends('layouts.app')
@section('title', 'View Product')
@section('content')



<style>
    .brand-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .brand-list li {
        display: inline-block;
        margin-right: 10px;
    }
</style>





<div class="address-container  d-flex justify-content-between align-items-center mt-4">

    <div class="address">
        <a href="/"> Home </a>/
        <a href="/product" class="h6 text-secondary"> Product </a>
    </div>

    <div class="col-sm-3">
        <div class="sort-container d-flex align-items-center ">
            <span class="h5 pr-5" style="width:100px ;">Sort By </span>

            <select name="" id="sort-by" class="form-select form-select-lg ">
                <option value="Bestseller">Bestseller</option>
                <option value="Discount">Discount</option>
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
            </select>

        </div>
    </div>
</div>

<section class="product-list">
    <div class="mt-4">
        <div class="row">
            <div class="col-sm-2 " style=" border-right: solid 0.5px rgba(108, 122, 137,0.5); ">

                <div class=" dropdown mb-2" style="width: 100%; height:40px">
                    <div class="dropbtn btn-show-provider " style="width: 100%; height:100%">
                        <span>Provider</span>

                        <i class="fas fa-angle-down i-s-1"></i>
                        <i class="fas fa-angle-up i-s-2" style="display: none;"></i>
                    </div>
                    <div class="dropdown-content dropdown-content--provider " style="width: 100%;">
                        @if(isset($providers))
                        @foreach($providers as $provider)
                        <div class=" d-flex  align-items-center "><input name=" provider" value="{{$provider->provider_id}}" type="checkbox"><span style="margin-left: 10px;"> {{$provider->name}}</span></div>
                        @endforeach
                        @endif
                    </div>
                </div>



                <div class=" dropdown mb-2" style="width: 100%; height:40px">
                    <div class="dropbtn btn-show-price" style="width: 100%; height:100%">
                        <span>Price</span>
                        <i class="fas fa-angle-down i-s-1--price"></i>
                        <i class="fas fa-angle-up i-s-2--price" style="display: none;"></i>
                    </div>
                    <div class="dropdown-content dropdown-content--price " style="width: 100%;">
                        <p><input name="brand" value="5" type="checkbox">1 -> 5 $</p>
                        <p><input name="brand" value="10" type="checkbox">5 -> 10 $</p>
                        <p><input name="brand" value="15" type="checkbox">10 -> 15 $</p>
                        <p><input name="brand" value="20" type="checkbox">15 -> 20 $</p>
                    </div>
                </div>


                <div class=" dropdown mb-2" style="width: 100%; height:40px">
                    <div class="dropbtn btn-show-type" style="width: 100%; height:100%">
                        <span>Type</span>
                        <i class="fas fa-angle-down i-s-1--type"></i>
                        <i class="fas fa-angle-up i-s-2--type" style="display: none;"></i>
                    </div>
                    <div class="dropdown-content dropdown-content--type " style="width: 100%;">
                        <p><input name="brand" value="option 1" type="checkbox">option 1</p>
                        <p><input name="brand" value="option 2" type="checkbox">option 2</p>
                        <p><input name="brand" value="option 3" type="checkbox">option 3</p>
                    </div>
                </div>

            </div>



            <div class="col-sm-10 rounded-sm">
                <div class="row">

                    <div id="message"></div>



                </div>
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                <div class="row " id="product-list ">
                    @if(isset($products))
                    @foreach($products as $product)


                    <div class="col col-lg-3 col-md-6` handleHover">
                        <a href="#!productdetail " class="item__shadow">
                            <div class="card shadow-product mb-2 ">
                                <div class="card-body item__container">


                                    <a href="">
                                        <img src="{{$product->images[0]->url}}" class="border border-primary rounded" alt="error" data-image="1" width="100%" height="280vw">
                                    </a>

                                    <div class="card-info mb--2">

                                        <div class="product-name h5 text-center" style="width: 100%;">{{$product->name}}</div>

                                        <div class="product-name h5 text-center" style="width: 100%;">{{$product->price}} $</div>
                                        <div class="rating d-flex justify-content-center mt-3">
                                            @php
                                            $rating = 3;
                                            $fullStars = floor($rating); // Get the number of full stars
                                            $halfStar = ceil($rating - $fullStars); // Check if there is a half star
                                            $emptyStars = 5 - ($fullStars + $halfStar); // Calculate the number of empty stars
                                            @endphp
                                            @if( $rating > 0)
                                            @for ($i = 0; $i < $fullStars; $i++) <i class="fa-solid fa-star"></i>
                                                @endfor
                                                @if ($halfStar)
                                                <i class="fa-regular fa-star-half-stroke"></i>
                                                @endif
                                                @for ($i = 0; $i < $emptyStars; $i++) <i class="fa-regular fa-star"></i>
                                                    @endfor
                                                    @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </a>

                        {{-- add to cart --}}

                        <form class="card  mb-2  p-1 form__add--card item__container" action="" method="POST">
                            @csrf
                            <div class="buy-action">
                                <div class="quantity">
                                    <span style="color: rgb(8, 27, 240)">Stock: </span><input type="number" class="cart-quantity" min="1" value="1" name="quantity">
                                </div>

                                <input type="hidden" name="product_id" value="1">



                                <div class="add-to-cart d-flex justify-content-center mt-2 mb-1" style="width: 100%;">
                                    <button class="btn btn-primary" type="submit">Add to cart</button>
                                </div>
                            </div>
                        </form>


                        {{-- add to cart --}}


                    </div>
                    @endforeach
                    @endif
                </div>
            </div>

        </div>

    </div>
</section>


<script>
    $(document).ready(function() {
        //DryFuits - weight
        var thongbao = document.getElementById("message");
        $('#sort-by').on('change', function() {
            var sortBy = $(this).val();
            var filterByPrice = $('input[name="filter-price"]:checked').val();
            var filterByWeight = $('input[name="filter-weight"]:checked').val();
            var brandId = $('input[name="brand"]:checked').val(); // Get the selected brand ID

            applySortingAndFiltering(sortBy, filterByPrice, filterByWeight, brandId);
        });

        $('#filter-form-price input[name="filter-price"]').on('change', function() {
            var filterByPrice = $(this).val();
            var sortBy = $('#sort-by').val();
            var filterByWeight = $('input[name="filter-weight"]:checked').val();
            var brandId = $('input[name="brand"]:checked').val(); // Get the selected brand ID

            applySortingAndFiltering(sortBy, filterByPrice, filterByWeight, brandId);
        });

        $('#filter-form-weight input[name="filter-weight"]').on('change', function() {
            var filterByWeight = $(this).val();
            var sortBy = $('#sort-by').val();
            var filterByPrice = $('input[name="filter-price"]:checked').val();
            var brandId = $('input[name="brand"]:checked').val(); // Get the selected brand ID

            applySortingAndFiltering(sortBy, filterByPrice, filterByWeight, brandId);
        });

        $('input[name="brand"]').on('change', function() {
            var brandId = $(this).val();
            var sortBy = $('#sort-by').val();
            var filterByPrice = $('input[name="filter-price"]:checked').val();
            var filterByWeight = $('input[name="filter-weight"]:checked').val();

            applySortingAndFiltering(sortBy, filterByPrice, filterByWeight, brandId);
        });

        function applySortingAndFiltering(sortBy, filterByPrice, filterByWeight, brandId) {
            $.ajax({
                url: "",
                type: 'GET',
                data: {
                    sort_by: sortBy,

                    filter_by_price: filterByPrice,
                    filter_by_weight: filterByWeight,
                    brand_id: brandId // Pass the selected brand ID to the controller
                },
                success: function(response) {
                    thongbao.style.color = "blue";
                    $('#product-list').html(response);
                    $('#message').html('Sort and filter products successfully!').fadeIn();
                    setTimeout(function() {
                        $('#message').fadeOut();
                    }, 1500);
                },
            });
        }
    });





    $('#searchForm').submit(function(e) {
        e.preventDefault();
        var searchTerm = $('#searchTerm').val();
        // Gửi yêu cầu tìm kiếm sản phẩm bằng Ajax
        $.ajax({
            url: "",
            method: 'GET',
            data: {
                term: searchTerm
            },
            success: function(response) {
                $('#product-list').html(response);
                thongbao.style.color = "blue";
                $('#product-list').html(response);
                $('#message').html('Search products successfully!').fadeIn();
                setTimeout(function() {
                    $('#message').fadeOut();
                }, 1500)
            },
        });
        $('#searchTerm').val('');
    });
</script>


{{-- sort by  --}}

{{-- end sort by --}}






@endsection