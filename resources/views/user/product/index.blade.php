@extends('user.layouts.master')
@section('site-title', 'Product List')
@section('big-title', 'Product')
@section('small-title', 'List')

@section('main-content')
	<!-- Alert... -->
	@if(session()->has('message'))
    <div class="callout callout-success">
        {{ session()->get('message') }}
    </div>
	@endif
	<!-- ./Alert -->
	<div class="row margin-bottom">
	<div class="col-lg-2">
		<a class="btn btn-block btn-primary" href="{{route('product.create')}}"><i class="fa fa-archive"></i> Add new</a>
	</div>
</div>

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
				<th class="text-center">Detail</th>
				<th class="text-center">Delete</th>
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
						<td class="text-danger"><strong><i>Expired</i><strong></td>
					@else
						<td class="text-danger"><strong>{{$product->expiredDay}}<strong></td>
					@endif
				@endif
				<td class="text-center"><a href=""><i class="fa fa-chevron-circle-right"></i></a></td>
				<td class="text-center">
					<span
					style="padding: 0 1rem;"
					class="btn-delete-product text-danger"
					meta-product-id="{{$product->id}}"
					meta-product-name="{{$product->name}}"
					data-toggle="modal"
					data-target="#modal-default">
						<i class="fa fa-trash-o"></i>
					</span>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	@endif
</div>
{{ $products->links() }}
<!-- /.table -->

<!-- Delete product modal -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete Alert</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure to delete <strong id="text-delete-product-name" class="text-danger"></strong>?</p>
			</div>
			<div class="modal-footer">
				<div class="col-sm-2">
					<form id="deleteForm" style="display: inline-block;" action="{{route('product.delete', '%product_id%')}}" method="POST">
					    <input type="hidden" name="_method" value="DELETE">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <button id="acceptDeleteBtn" type="button" class="btn btn-danger">Delete</button>
					</form>
				</div>
				<div class="col-sm-2 col-sm-offset-8">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
	<!-- /.modal -->
@stop

@section('javascript-section')
<script type="text/javascript">
 $(document).ready(function(){
 	var deleteProductId = '';
 	$('.btn-delete-product').click(function(){
 		$('#text-delete-product-name').text($(this).attr('meta-product-name'));
 		deleteProductId = $(this).attr('meta-product-id');
 	});

 	$('.callout-success').first().fadeOut(3000);

 	$('#acceptDeleteBtn').click(function(){
 		var routeDeleteProduct = $('#deleteForm').attr("action");
 		$('#deleteForm').attr("action", routeDeleteProduct.replace('%product_id%', deleteProductId));
 		$('#deleteForm').submit();
 	});

 	$('.checkNotiButton').click(function(){
 		$(this).parent().fadeOut(500);
 	});

 	// Toggle class for hide/show notification list
 	$('li.dropdown.notifications-menu a').on('click', function (event) {
    	$(this).parent().toggleClass('open');
	});

 	// Event when click outside notification list
	$('body').on('click', function (e) {
	    if (!$('li.dropdown.notifications-menu').is(e.target) 
	        && $('li.dropdown.notifications-menu').has(e.target).length === 0 
	        && $('.open').has(e.target).length === 0
	    ) {
	        $('li.dropdown.notifications-menu').removeClass('open');
	    	$('li.dropdown.notifications-menu li.footer').removeClass('open');
	    }
	});
 });
</script>
@stop