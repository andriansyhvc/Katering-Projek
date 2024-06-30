<?php

namespace App\Http\Controllers\Merchant;

use App\DataTables\ProductDataTable;
use App\Http\Requests\Admin\ProductCreateRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Str;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('merchant.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request): RedirectResponse
    {
        /** Handle image file */
        $imagePath = $this->uploadImage($request, 'image');

        $product = new Product();
        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->quantity = $request->quantity;
        $product->deskripsi = $request->deskripsi;
        $product->show_at_home = $request->show_at_home;
        $product->status = $request->status;
        $product->save();

        toastr()->success('Create Successfully');

        return to_route('merchant.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
