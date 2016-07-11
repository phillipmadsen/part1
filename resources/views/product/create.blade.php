@extends('layouts.app')

@section('title')

    <title>Create a Product</title>

@endsection

@section('content')

        <ol class='breadcrumb'><li><a href='/'>Home</a></li><li><a href='/product'>Products</a></li><li class='active'>Create</li></ol>

        <h2>Create a New Product</h2>

        <hr/>
                {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}

        <form class="form" role="form" method="POST" action="{{ url('/product') }}" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <!-- product_name Form Input -->
            <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                <label class="control-label">Product Name</label>

                    <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">

                    @if ($errors->has('product_name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                <label class="control-label">images</label>

                    <input type="file" class="form-control" name="images" value="{{ old('images') }}" multiple>

                    @if ($errors->has('images'))
                        <span class="help-block"> <strong>{{ $errors->first('images') }}</strong>  </span>
                    @endif

            </div>


            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Create
                    </button>
            </div>

        </form>

@endsection
