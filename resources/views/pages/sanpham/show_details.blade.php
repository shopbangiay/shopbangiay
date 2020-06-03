@extends('layout')
@section('content')
@foreach ($detail_sp as $value_detail)
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="{{URL::to('public/uploads/product/'.$value_detail->product_image)}}" alt="" height="200" width="200"/>
			<h3>ZOOM</h3>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">
			
			  <!-- Wrapper for slides -->
				<div class="carousel-inner">
					{{-- <div class="item active">
					  <a href=""><img src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
					</div>
					<div class="item">
					  <a href=""><img src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
					</div>
					<div class="item">
					  <a href=""><img src="{{URL::to('public/frontend/images/similar1.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('public/frontend/images/similar2.jpg')}}" alt=""></a>
					  <a href=""><img src="{{URL::to('public/frontend/images/similar3.jpg')}}" alt=""></a>
					</div> --}}
					
				</div>

			  <!-- Controls -->
			  <a class="left item-control" href="#similar-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right item-control" href="#similar-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>
		</div>

	</div>
	<div class="col-sm-7">
	<div class="fb-like" data-href="http://nhom3th05.ml/chi-tiet-san-pham/.$detail_sp->$product_id" data-width="" data-layout="standard" data-action="like" data-size="large" data-share="true"></div>
		<div class="product-information"><!--/product-information-->
			<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			<h2>{{$value_detail->product_name}}</h2>
			<img src="images/product-details/rating.png" alt="" />
			<form action="{{URL::to('/save-cart')}}" method="POST">
				{{ csrf_field() }}
				<span>
					<span>{{number_format($value_detail->product_price).'vnđ'}}</span>
					<label>Quantity:</label>
					<input type="number" name="qty" min="1" value="1" />
					<input type="hidden" name="productid_hidden" min="1" value="{{$value_detail->product_id}}" />
					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Thêm giỏ hàng
					</button>
				</span>
			</form>
			<p><b>Danh mục:</b> {{$value_detail->category_name}}</p>
			<p><b>Thương hiệu:</b> {{$value_detail->brand_name}}</p>
			<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
			<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
			<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="details" >
			<p>{{$value_detail->product_desc}}</p>
		</div>
		
		<div class="tab-pane fade" id="companyprofile" >
			<p>{{$value_detail->product_content}}</p>
			
		</div>
		
		<div class="tab-pane fade" id="tag" >
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="images/home/gallery1.jpg" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<div class="tab-pane fade " id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				<p><b>Write Your Review</b></p>
				
				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="email" placeholder="Email Address"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div>
		
	</div>
</div><!--/category-tab-->
@endforeach
<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Sản phẩm liên quan</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				@foreach ($relate as $item)
				<a href="{{URL::to('/chi-tiet-san-pham/'.$item->product_id)}}">
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('public/uploads/product/'.$item->product_image)}}" alt="" height="200" width="200" />
								<h2>{{number_format($item->product_price).'vnđ'}}</h2>
								<p>{{$item->product_name}}</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
				</a>
				@endforeach	
			</div>
			
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
</div><!--/recommended_items-->
<div class="fb-comments" data-href="http://nhom3th05.ml/chi-tiet-san-pham/.$detail_sp->$product_id" data-numposts="15" data-width=""></div>	
@endsection