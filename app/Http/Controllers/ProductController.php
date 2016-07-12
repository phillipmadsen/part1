<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Http\Requests;
use App\Models\ProductImage;
use App\Product;
use Illuminate\Support\Facades\Redirect;

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
    public function store(Request $request)
    {


        $this->validate($request, [
            'product_name' => 'required|unique:products|string|max:30',
        ]);

        $product = Product::create($request->all());

	    flash('Success!', 'Your product has been created');

        $product->save();

        // $imagesname = $request->file('path')->getClientOriginalExtension();
        // $request->file('path')->move(base_path() . '/public/uploads/products/', $imageName);

        return Redirect::route('product.index');

    }

	//flash()->success('Successful Upload', 'your product images are saved');
	public function addImage($id, Request $request)
	{
		//dd($request->file('file'));

		$file = $request->file('file');
		$name = time() . $file->getClientOriginalName();
		$file->move('uploads/products/', $name);

		$product = Product::findOrFail($id)->first();
		$product->images()->create(['path' => '/uploads/products/{$name}']);
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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        //$slug = Str::slug($product->name);


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

        // if (empty($product))
        // {
        //     flash()->error('Product not found', 'try creating it first');

        //     return redirect(route('product.index'));
        // }

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
