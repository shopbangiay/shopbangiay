@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Danh mục {{$cate->category_name}} </h2>
    @foreach ($cate_id as $item)
    <div class="col-sm-4">
<<<<<<< HEAD
        <div class="product-image-wrapper">
            
                    @foreach($detail_sp as $item_sp)
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{URL::to('chi-tiet-san-pham/'. $item_sp->product_id)}}">
                        <!-- <img src="{{asset('public/frontend/images/product1.jpg')}}" alt="" /> -->
                        <img src="{{URL::to('public/uploads/product/'.$item->product_image)}}" alt="" />
                        <h2>{{number_format($item->product_price).'vnđ'}}</h2>
                        <p>{{$item->product_name}}</p>
                    </a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
=======
        <a href="{{URL::to('/chi-tiet-san-pham/'. $item->product_id)}}">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/uploads/product/'.$item->product_image)}}" alt="" />
                            <h2>{{number_format($item->product_price).' '.'VNĐ'}}</h2>
                            <p>{{$item->product_name}}</p>
                            
                            {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a> --}}
                        </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                    </ul>
>>>>>>> 25ca6ab60b906c3072afd1947f7314add5a6f4f8
                </div>
            </div>
            </a>
    </div>
    @endforeach
</div><!--features_items-->

@endsection