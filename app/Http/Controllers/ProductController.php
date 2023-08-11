<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\product;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_product()
    {
        $product = product::with('images')->with('provider')->get();
        return view('admin.product.index')->with('product', $product);
    }


// Create product


    public function create()
    {
        $providers = Provider::all();
        $file = Image::all();
        return view('admin.product.add_product', compact('providers', 'file')); // Trả về giao diện thêm sản phẩm
    }
    public function add_product(Request $request)
    {
        $file = $request->file('images');
        foreach ($file as $files) {

            $ext = $files->extension();
            $accept_ext = ['png', 'jpeg', 'jpg', 'gif'];
            if (in_array($ext, $accept_ext)) {
                $size = $files->getSize();
                if ($size > 2 * 1024 * 1024) {
                    $error = 'image phai nho hon 2MB';

                    return back()->with('error', $error);
                }
            } else {
                $error = 'image phai co duoi jpg,png,jpeg,gif';

                return back()->with('error', $error);
            }
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description =   $request->description;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->provider_id = $request->provider_id;
        $product->save();

        foreach ($file as $x) {
            $fileName = time() . rand(0, 10000) . '.' . $x->extension();
            $x->move(public_path('productImages'), $fileName);
            $image = new Image();
            $image->product_id = $product->product_id;
            $image->url = 'http://localhost:8000/productImages/' . $fileName;
            $image->save();
        }


        return redirect('admin/product/index')->with('message', 'Add Product Successful');
    }





    //edit product
    public function edit_product($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->get();
        $provider = Provider::all();
        return view('admin.product.edit', compact('product', 'provider', 'images'));
    }

    public function update_product(Request $request, $id)
    {
            //update data in dishimages table
            if (isset($request->imagesDelete)) {
                foreach ($request->imagesDelete as $d) {
                    Image::find((int)$d)->delete();
                }
            }
            if (isset($request->images)) {
                $files = $request->file('images');

                foreach ($files  as $item) {
                    $imageName = time() . rand(0, 10000) . '.' . $item->extension();
                    $item->move(public_path('productImages'), $imageName);
                    Image::create(
                        [
                            'url' => 'http://localhost:8000/productImages/' . $imageName,
                            'product_id' => $id
                        ]
                    );
                }
            }

            \session()->put('success', 'Update successfully');
            return view('admin.product.edit');
        }
}
