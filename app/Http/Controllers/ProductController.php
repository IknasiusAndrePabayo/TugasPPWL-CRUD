<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;


class ProductController extends Controller
{

    public function index(): Response
    {
      $products = Product::all();

      return response(view('welcome', ['products' => $products]));

    }


    public function create(): Response
    {
        return response(view('products.create'));
    }


    public function store(StoreProductRequest $request): RedirectResponse
    {
      if (Product::create($request->validated())) {
          return redirect(route('index'))->with('success', 'Added!');
      }

    }


    public function edit(string $id): Response
    {
      $product = Product::findOrFail($id);

      return response(view('products.edit', ['product' => $product]));
    }


    public function show($id)
    {
        //
    }


  public function update(UpdateProductRequest $request, string $id): RedirectResponse
  {
      $product = Product::findOrFail($id);

      if ($product->update($request->validated())) {
          return redirect(route('index'))->with('success', 'Updated!'); 
      }
  }


  public function destroy(string $id): RedirectResponse
  {
      $product = Product::findOrFail($id);

      if ($product->delete()) {
          return redirect(route('index'))->with('success', 'Deleted!');
      }

      return redirect(route('index'))->with('error', 'Sorry, unable to delete this!');
  }

}
