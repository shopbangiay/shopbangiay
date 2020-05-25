@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Danh mục {{$cate->category_name}} </h2>
    @foreach ($cate_id as $item)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            
                    @foreach($detail_sp as $item_sp)
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{URL::to('chi-tiet-san-pham/'. $item_sp->product_id)}}">
                        <img src="{{asset('public/frontend/images/product1.jpg')}}" alt="" />
                        <h2>{{number_format($item->product_price).'vnđ'}}</h2>
                        <p>{{$item->product_name}}</p>
                    </a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
            </div>
                    @endforeach
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
            
        </div>
    </div>
    @endforeach
</div><!--features_items-->

@endsection