@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
<div class="fb-like" data-href="http://nhom3th05.ml/" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    @foreach($all_product as $key => $product)  
    <div class="col-sm-4">
        <a href="{{URL::to('/chi-tiet-san-pham/'. $product->product_id)}}">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" height="270" width="150" />
                        <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                        <p>{{$product->product_name}}</p>
                        
                        {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a> --}}
                    </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                </ul>
            </div>
        </div>
        </a>
    </div>
    @endforeach
</div><!--features_items-->
<nav aria-label="Page navigation example">
            <ul class="pagination">
                @if($all_product->currentPage() != 1)
                <li><a href="{!!$all_product->url($all_product->currentPage()-1)!!}">Trước</a></li>
                @endif
                @for  ($i = 1; $i <= $all_product->lastPage(); $i = $i + 1 )
                <li class="{!! ($all_product->currentPage() == $i) ? 'active' : '' !!}">
                <a href="{!!$all_product->url($i)!!}">{!! $i !!}</a></li>
                <!-- @if($i>5)
                <li class="unactive"><a href="#">...</a></li>
                <li class="$all_product->lastPage()"></li>
                @endif  thêm khi trang sản phẩm nhiều hơn 5--> 
                @endfor
                @if($all_product->currentPage() != $all_product->lastPage())
                <li><a href="{!!$all_product->url($all_product->currentPage()+1)!!}">Sau</a></li>
                @endif
            </ul>
</nav>
<div class="fb-comments" data-href="http://nhom3th05.ml/" data-numposts="15" data-width=""></div>
@endsection