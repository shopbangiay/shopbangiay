@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Thương Hiệu {{$brand->brand_name}} </h2>
    @foreach ($brand_by_id as $item)
    <div class="col-sm-4">
        <a href="{{URL::to('/chi-tiet-san-pham/'. $item->product_id)}}">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    
                        <img src="{{URL::to('public/uploads/product/'.$item->product_image)}}" alt="" height="200" width="200" />
                        <h2>{{number_format($item->product_price).'vnđ'}}</h2>
                        <p>{{$item->product_name}}</p>
                    
                    <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng </a> -->
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích </a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                </ul>
            </div>
        </a >   
        </div>
    </div>
    @endforeach
</div><!--features_items-->
<nav aria-label="Page navigation example">
            <ul class="pagination">
                @if($brand_by_id->currentPage() != 1)
                <li><a href="{!!$brand_by_id->url($brand_by_id->currentPage()-1)!!}">Trước</a></li>
                @endif
                @for  ($i = 1; $i <= $brand_by_id->lastPage(); $i = $i + 1 )
                <li class="{!! ($brand_by_id->currentPage() == $i) ? 'active' : '' !!}">
                <a href="{!!$brand_by_id->url($i)!!}">{!! $i !!}</a></li>
                <!-- @if($i>5)
                <li class="unactive"><a href="#">...</a></li>
                <li class="$brand_by_id->lastPage()"></li>
                @endif  thêm khi trang sản phẩm nhiều hơn 5--> 
                @endfor
                @if($brand_by_id->currentPage() != $brand_by_id->lastPage())
                <li><a href="{!!$brand_by_id->url($brand_by_id->currentPage()+1)!!}">Sau</a></li>
                @endif
            </ul>
</nav>
@endsection
