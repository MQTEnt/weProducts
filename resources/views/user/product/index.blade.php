@extends('user.layouts.master')
@section('site-title', 'Product List')
@section('big-title', 'Product')
@section('small-title', 'List')

@section('main-content')
	<div class="row margin-bottom">
	<div class="col-lg-2">
		<a class="btn btn-block btn-primary" href="{{route('product.create')}}"><i class="fa fa-archive"></i> Add new</a>
	</div>
</div>

<!-- Alert... -->

<!-- table -->
<div class="box">
	<div class="box-header">
		<h3 class="box-title">
			@if(count($products) > 0)
				Product list
			@else
				No record
			@endif
		</h3>
		<div class="box-tools">
			<form action="">
				<div class="input-group input-group-sm" style="width: 200px;">
					<input type="text" name="q" class="form-control pull-right" placeholder="Search...">
					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- /.box-header -->
	@if(count($products) > 0)
	<div class="box-body table-responsive no-padding">
		<table class="table table-hover">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Vipon Link</th>
				<th>Amazon Link</th>
				<th>Sold Price</th>
				<th>Item Cost</th>
				<th>Count Down</th>
				<th style='text-align: center'>Detail</th>
			</tr>
			@foreach($products as $product)
			<tr style="cursor: pointer">
				<td>{{$product->id}}</td>
				<td>{{str_limit($product->name, 35)}}</td>
				<td><a href="{{$product->vipon_link}}" target="_blank"><i>Link</i></a></td>
				<td><a href="{{$product->amazon_link}}" target="_blank"><i>Link</i></a></td>
				<td>{{$product->sold_price}}</td>
				<td>{{$product->item_cost}}</td>
				@if($product->expired_day > 3)
					<td>{{$product->expiredDay}}</td>
				@else
					@if($product->expired_day <= 0)
						<td style="color: red;"><strong><i>Expired</i><strong></td>
					@else
						<td style="color: red;"><strong>{{$product->expiredDay}}<strong></td>
					@endif
				@endif
				<td style='text-align: center'><a href=""><i class="fa fa-chevron-circle-right"></i></a></td>
			</tr>
			@endforeach
		</table>
	</div>
	@endif
</div>
<!-- /.table -->
@stop