@extends('layouts.app')
@section('css')
	{!! HTML::style('/packages/dropzone/dropzone.css') !!}

@section('title')
	<title>Create a Product</title>
@endsection
@section('content')
	<ol class='breadcrumb'>
		<li><a href='/'>Home</a></li>
		<li><a href='/product'>Products</a></li>
		<li class='active'>Create</li>
	</ol>
	<h2>Create a New Product</h2>
	<hr/>
	<form class="form" role="form" method="POST" action="{{ url('/product') }}" enctype="multipart/form-data">
		{!! csrf_field() !!}
		@if(!empty($errors))
			@if($errors->any())
				<ul class="alert alert-danger" style="list-style-type: none">
					@foreach($errors->all() as $error)
						<li>{!! $error !!}</li>
					@endforeach
				</ul>
			@endif
		@endif
		<div class="row">
			<!-- Price Field -->
			<div class="form-group col-sm-2">
				{!! Form::label('price', 'Price:') !!}
				{!! Form::number('price', null, ['class' => 'form-control', 'required'=>'required']) !!}
			</div>
			<!-- Upc Field -->
			<div class="form-group col-sm-2">
				{!! Form::label('upc', 'Upc:') !!}
				{!! Form::text('upc', null, ['class' => 'form-control']) !!}
			</div>
			<!-- Sku Field -->
			<div class="form-group col-sm-2">
				{!! Form::label('sku', 'Sku:') !!}
				{!! Form::text('sku', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="row">
			<!-- product_name Form Input -->
			<div class="form-group col-sm-8 {{ $errors->has('product_name') ? ' has-error' : '' }}">
				<label class="control-label">Product Name</label>
				<input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">
				@if ($errors->has('product_name'))
					<span class="help-block">  <strong>{{ $errors->first('product_name') }}</strong>  </span>
				@endif
			</div>
		</div>
		<div class="row">
			<!-- Description Field -->
			<div class="form-group col-sm-12 col-lg-12">
				{!! Form::label('description', 'Description:') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
			</div>
		</div>


		{{--
		<div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">--}}
		{{--<label class="control-label">images</label>--}}
		{{--<input type="file" class="form-control" name="images" value="{{ old('images') }}" multiple>--}}
		{{--@if ($errors->has('images'))--}}
		{{--<span class="help-block"> <strong>{{ $errors->first('images') }}</strong>  </span>--}}
		{{--@endif--}}
		{{--
	</div>
	--}}
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-lg">
				Create
			</button>
		</div>
	</form>
<hr style="clear:both" />

<form action="/product/upload/images" method="post" class="dropzone" enctype="multipart/form-data" files="true">
{{  csrf_field() }}

</form>

	<br style="clear:both" />

@endsection

@section('scripts')
	{!! HTML::script('/packages/dropzone/dropzone.js') !!}
	{!! HTML::script('/assets/js/dropzone-config.js') !!}
@endsection
