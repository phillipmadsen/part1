@extends('layouts.app')

@section('title')

    <title>Create a Product</title>

@endsection

@section('content')
    {!! HTML::style('/packages/dropzone/dropzone.css') !!}

        <ol class='breadcrumb'><li><a href='/'>Home</a></li><li><a href='/product'>Products</a></li><li class='active'>Create</li></ol>

        <h2>Create a New Product</h2>

        <hr/>
         {{--        {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!} --}}

        <form class="form" role="form" method="POST" action="{{ url('/product') }}" enctype="multipart/form-data" files="true" multiple>

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


            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Create
                    </button>
            </div>

        </form>



        {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}

                <div class="dz-message">

                </div>

                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>

                <div class="dropzone-previews" id="dropzonePreview"></div>

                <h4 style="text-align: center;color:#428bca;">Drop images in this area  <span class="glyphicon glyphicon-hand-down"></span></h4>

        {!! Form::close() !!}



    {!! HTML::script('/packages/dropzone/dropzone.js') !!}
    {!! HTML::script('/assets/js/dropzone-config.js') !!}
@endsection
