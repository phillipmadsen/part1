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


        <form class="form" role="form" method="POST" action="{{ url('/product/'. $product->id) }}">
        <input type="hidden" name="_method" value="patch">
        {!! csrf_field() !!}

        <!-- product_name Form Input -->
            <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                <label class="control-label">Product Name</label>

                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">

                    @if ($errors->has('product_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                    @endif

            </div>

            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Edit
                    </button>
            </div>

        </form>


@endsection