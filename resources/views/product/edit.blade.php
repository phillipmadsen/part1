@extends('layouts.app')
@section('title')
<title>Edit Product</title>
@endsection
@section('content')
<ol class='breadcrumb'>
    <li><a href='/'>Home</a></li>
    <li><a href='/product'>Products</a></li>
    <li><a href='/product/{{$product->id}}'>{{$product->product_name}}</a></li>
    <li class='active'>Edit</li>
</ol>
<h1>Edit Product</h1>
<hr/>
{!! Form::model($product, [ 'url' => ['/product', $product->id], 'method' => 'PATCH']) !!}
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
        {!! Form::number('price', null, ['class' => 'form-control', 'required'=>'required'  ]) !!}
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
    <div class="form-group col-md-6 {{ $errors->has('product_name') ? ' has-error' : '' }}">
        <label class="control-label">Product Name</label>
        <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
        @if ($errors->has('product_name'))
        <span class="help-block">
        <strong>{{ $errors->first('product_name') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="row">
    <!-- Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description',  null, ['class' => 'form-control', 'rows' => '5']) !!}
    </div>
</div>
<div class="form-group">
     {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
</form>
@endsection
