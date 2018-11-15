@extends('user.layouts.master')
@section('site-title', 'Add new product')
@section('big-title', 'Product')
@section('small-title', 'Add new')

@section('back-page')
	<p>
		<a href="{{route('product.index')}}">
			<i class="fa fa-chevron-left" aria-hidden="true"></i>
			Back to list
		</a>
	</p>
@stop

@section('main-content')
	<div class="box box-primary">
		<!-- form start -->
		<form role="form" method="POST" action="{{route('product.store')}}">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name">Name</label>
					<input 	id="name" 
							type="text" 
							class="form-control" 
							name="name" 
							value="{{ old('name') }}"
							placeholder="Name of product"
							required>
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('vipon_link') ? ' has-error' : '' }}">
					<label for="vipon_link">Vipon Link</label>
					<input 	id="vipon_link" 
							type="text" 
							class="form-control" 
							name="vipon_link" 
							value="{{ old('vipon_link') }}"
							placeholder="Vipon link"
							required>
					@if ($errors->has('vipon_link'))
					<span class="help-block">
						<strong>{{ $errors->first('vipon_link') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('amazon_link') ? ' has-error' : '' }}">
					<label for="amazon_link">Amazon Link</label>
					<input 	id="amazon_link" 
							type="text" 
							class="form-control" 
							name="amazon_link" 
							value="{{ old('amazon_link') }}"
							placeholder="Amazon link"
							required>
					@if ($errors->has('amazon_link'))
					<span class="help-block">
						<strong>{{ $errors->first('amazon_link') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('sold_price') ? ' has-error' : '' }}">
					<label for="sold_price">Sold Price</label>
					<input 	id="sold_price" 
							type="number"
							min="0"
							step="0.01"
							class="form-control" 
							name="sold_price" 
							value="{{ old('sold_price') }}"
							placeholder="Sold price"
							required>
					@if ($errors->has('sold_price'))
					<span class="help-block">
						<strong>{{ $errors->first('sold_price') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('item_cost') ? ' has-error' : '' }}">
					<label for="item_cost">Item Cost</label>
					<input 	id="item_cost" 
							type="number"
							min="0"
							step="0.01"
							class="form-control" 
							name="item_cost" 
							value="{{ old('item_cost') }}"
							placeholder="Item cost"
							required>
					@if ($errors->has('item_cost'))
					<span class="help-block">
						<strong>{{ $errors->first('item_cost') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('expiry_date') ? ' has-error' : '' }}">
					<label for="expiry_date">Expiry Date</label>
					<input 	id="expiry_date" 
							type="number"
							min="0"
							class="form-control" 
							name="expiry_date" 
							value="{{ old('expiry_date') }}"
							placeholder="Expiry Date"
							required>
					@if ($errors->has('expiry_date'))
					<span class="help-block">
						<strong>{{ $errors->first('expiry_date') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
					<label for="code">Code Coupon</label>
					<textarea	
						id="code" 
						class="form-control" 
						name="code" 
						placeholder="Code Coupon">{{old('code')}}</textarea>
					@if ($errors->has('code'))
					<span class="help-block">
						<strong>{{ $errors->first('code') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
					<label for="note">Note</label>
					<textarea	
						id="note" 
						class="form-control" 
						name="note" 
						placeholder="Note">{{old('note')}}</textarea>
					@if ($errors->has('note'))
					<span class="help-block">
						<strong>{{ $errors->first('note') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-share" aria-hidden="true"></i> Create</button>
			</div>
		</form>
	</div>
@stop
