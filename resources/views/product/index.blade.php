
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('title')

    <title>The Products Page</title>

@endsection

@section('content')



        <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/product'>Products</a></li>
        </ol>

        <h1>Products</h1>

        @include('product.datatable')

        <div> <a href="/product/create">
              <button type="button" class="btn btn-lg btn-primary">
                        Create New
              </button></a>
            </div>



@endsection

@section('scripts')

    @include('product.datatable-script')

@endsection