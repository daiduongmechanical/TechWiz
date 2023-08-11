<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Category;


class ProductController extends Controller
{
    public function all_product()
    {
        $product = product::with('images')->with('provider')->get();


        return view('admin.product.index')->with('product', $product);
    }

    public function all_product_user()
    {

        $product = product::with('images')->with('provider')->get();
        $provider = Provider::all();
        $category = Category::all();

        return view('client.category')->with('products', $product)->with('providers', $provider)->with('categories', $category);
    }

    public function sort_product_user(Request $request)
    {
        return 'hello';
        $data = product::query();
        if (isset($request->provider)) {
            $data->where('provider_id', $request->provider);
        }
        if (isset($request->price)) {
            $data->where('price', '>', $request->price)->where('price', '<', (int)($request->price) + 5);
        }
        if (isset($request->type)) {
            $data->where('type', $request->type);
        }

        return $data->get();
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);


        if ($request->hasFile('images')) { //kiem tra xem co chon hinh ko
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $accept_ext = ['png', 'jpeg', 'jpg', 'gif'];
            if (in_array($ext, $accept_ext)) {
                $size = $file->getSize();
                if ($size < 2 * 1024 * 1024) {
                    //doi ten hinh de up len server
                    $fileName = date('Y-m-d') . '-' . $fileName;
                    $file->move('/productImages', $fileName);
                } else {
                    $error = 'image phai nho hon 2MB';
                    return back()->with('error', $error);
                }
            } else {
                $error = 'image phai co duoi jpg,png,jpeg,gif';
                return back()->with('error', $error);
            }
        }


        if ($request->hasFile('product_image')) {
            $image = Image::where('product_id', $id);
            $image->delete();
            foreach ($request->file('product_image') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('productImages'), $imageName);
                    $productImages[] = $imageName;
                }
            }
        }
        foreach ($productImages as $imageName) {

            $image = new Image();
            $image->product_id = $product->product_id;

            $image->path = $imageName;
            $image->save();
        }


        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->type = $request->type;
        $product->provider_id = $request->provider_id;
        $product->save();
        return redirect('/all-product')->with('message', 'Update Product Successful');
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
        $product->provider_id = $request->providerId;
        $product->save();



        foreach ($file as $x) {

            $fileName = time() . rand(0, 10000) . '.' . $x->extension();
            $x->move(public_path('productImages'), $fileName);
            $image = new Image();
            $image->product_id = $product->product_id;
            $image->url = 'localhost:8000/productImages/' . $fileName;
            $image->save();
        }

        return 'die';
        return redirect('/all-product')->with('message', 'Add Product Successful');
    }
}
