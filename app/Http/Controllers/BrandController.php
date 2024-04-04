<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;


class BrandController extends Controller
{

    public function index(): Response
    {
      $brands = Brand::all();

      return response(view('brand', ['brands' => $brands]));

    }


    public function create(): Response
    {
        return response(view('brands.create'));
    }


    public function store(StoreBrandRequest $request): RedirectResponse
    {
      if (Brand::create($request->validated())) {
          return redirect(route('index'))->with('success', 'Added!');
      }

    }


    public function edit(string $id): Response
    {
      $brand = Brand::findOrFail($id);

      return response(view('brands.edit', ['brand' => $brand]));
    }


    public function show($id)
    {
        //
    }


    public function update(UpdateBrandRequest $request, string $id): RedirectResponse
    {
        $brand = Brand::findOrFail($id);
  
        if ($brand->update($request->validated())) {
            return redirect(route('index'))->with('success', 'Updated!'); 
        }
    }
  
  
    public function destroy(string $id): RedirectResponse
    {
        $brand = Brand::findOrFail($id);
  
        if ($brand->delete()) {
            return redirect(route('index'))->with('success', 'Deleted!');
        }
  
        return redirect(route('index'))->with('error', 'Sorry, unable to delete this!');
    }

}
