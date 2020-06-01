@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Danh mục {{$cate->category_name}} </h2>
    @foreach ($cate_id as $item)
    <div class="col-sm-4">
        <a href="{{URL::to('/chi-tiet-san-pham/'. $item->product_id)}}">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/uploads/product/'.$item->product_image)}}" alt="" height="200" width="200" />
                            <h2>{{number_format($item->product_price).' '.'VNĐ'}}</h2>
                            <p>{{$item->product_name}}</p>
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
                @if($cate_id->currentPage() != 1)
                <li><a href="{!!$cate_id->url($cate_id->currentPage()-1)!!}">Trước</a></li>
                @endif
                @for  ($i = 1; $i <= $cate_id->lastPage(); $i = $i + 1 )
                <li class="{!! ($cate_id->currentPage() == $i) ? 'active' : '' !!}">
                <a href="{!!$cate_id->url($i)!!}">{!! $i !!}</a></li>
                <!-- @if($i>5)
                <li class="unactive"><a href="#">...</a></li>
                <li class="$cate_id->lastPage()"></li>
                @endif  thêm khi trang sản phẩm nhiều hơn 5--> 
                @endfor
                @if($cate_id->currentPage() != $cate_id->lastPage())
                <li><a href="{!!$cate_id->url($cate_id->currentPage()+1)!!}">Sau</a></li>
                @endif
            </ul>
</nav>
@endsection