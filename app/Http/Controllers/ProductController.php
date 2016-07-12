<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ProductCreateRequest;
use App\Models\ProductImage;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

	    // flash()->overlay('Welcome Aboard!', 'Thank you for signing up');
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
		Product::create($request->all());

	    flash()->success('Success!', 'Your product has been created');

        return Redirect::route('product.index');

    }

	//flash()->success('Successful Upload', 'your product images are saved');
	public function addImage(Request $request)
	{

        // dd($request->file('file'));

		$file = $request->file('file');
		$name = time() . $file->getClientOriginalName();
		$file->move('uploads/products/', $name);

		$product = $request->findOrFail($id)->first();

		$product->images = ProductImage::create(['path' => '/uploads/products/{$name}']);
        //$product->images()->create(['path' => '/uploads/products/{$name}']);
		//$product->images()->create(['image' => 'mightbeWorking.jpg']);

		return 'done';

	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $product = Product::findOrFail($id);
        //$slug = Str::slug($product->name);

        $product = $request->all();


        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $this->validate($request, [
            'product_name' => 'required|string|max:40|unique:products,product_name,' .$id

        ]);
        $product = Product::findOrFail($id);




        flash()->success('Success!!', 'you successfully updated the product');

        $product->update(['product_name' => $request->product_name]);
        $product->update($request->all());

        return Redirect::route('product.index', ['product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return Redirect::route('product.index');
    }
}
