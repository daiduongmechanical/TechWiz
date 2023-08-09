<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_product()
    {
        $product = product::with('images')->with('provider')->get();


        return view('admin.product.index')->with('product', $product);
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);


        if ($request->hasFile('image')) { //kiem tra xem co chon hinh ko
            $file = $request->file('image');
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
        } else { //neu ko chon thi de mac dinh
            $fileName =  $product->image;
        }
        $product->image = $fileName;
        $productImages = [];
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

        if ($request->hasFile('images')) { //kiem tra xem co chon hinh ko
            $file = $request->file('images');
            foreach ($file as $file) {
                $ext = $file->extension();
                $accept_ext = ['png', 'jpeg', 'jpg', 'gif'];
                if (in_array($ext, $accept_ext)) {
                    $size = $file->getSize();
                    if ($size < 2 * 1024 * 1024) {
                        //doi ten hinh de up len server
                        $fileName = time() . rand(0, 10000) . '.' . $ext;
                        $file->move('productImage/', $fileName);
                    } else {
                        $error = 'image phai nho hon 2MB';
                        return back()->with('error', $error);
                    }
                } else {
                    $error = 'image phai co duoi jpg,png,jpeg,gif';
                    return back()->with('error', $error);
                }
            }
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description =   $request->description;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->provider_id = $request->provider_id;

        foreach ($file as $file) {
            $ext = $file->extension();
            $fileName = time() . rand(0, 10000) . '.' . $ext;
            $image = new Image();
            $image->product_id = $product->product_id;

            $image->path = $fileName;
            $image->save();
        }




        $product->save();
        $productImages = [];
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $image) {
                if ($image->isValid()) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('fontend/Image'), $imageName);
                    $productImages[] = $imageName;
                }
            }
        }


        return redirect('/all-product')->with('message', 'Add Product Successful');
    }
}
