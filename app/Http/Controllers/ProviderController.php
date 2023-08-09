<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use Exception;

class ProviderController extends Controller
{

    public function index()
    {

        $data = Provider::with('product')->get();
        return $data;
    }

    public function addProvider(Request $request)
    {

        try {

            $fileName = "";
            if ($request->hasFile('images')) {

                $file = $request->file('images');

                $ext = $file->extension();
                $fileName = time() . '.' . $ext;
                $accept_ext = ['png', 'jpeg', 'jpg', 'gif'];
                if (in_array($ext, $accept_ext)) {
                    $size = $file->getSize();
                    if ($size < 2 * 1024 * 1024) {
                        //doi ten hinh de up len server

                        $file->move(public_path('productImages'), $fileName);
                    } else {
                        $error = 'image phai nho hon 2MB';

                        return back()->with('error', $error);
                    }
                } else {
                    $error = 'image phai co duoi jpg,png,jpeg,gif';

                    return back()->with('error', $error);
                }


                Provider::create([
                    'name' => $request->name,
                    'country' => $request->country,
                    'logo' => 'localhost:8000/productImage/' . $fileName

                ]);
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function updateProvider(Request $request, $id)
    {
        $fileName = "";
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $ext = $file->extension();
            $fileName = time() . '.' . $ext;
            $accept_ext = ['png', 'jpeg', 'jpg', 'gif'];
            if (in_array($ext, $accept_ext)) {
                $size = $file->getSize();
                if ($size < 2 * 1024 * 1024) {
                    //doi ten hinh de up len server

                    $file->move(public_path('productImages'), $fileName);
                } else {
                    $error = 'image phai nho hon 2MB';
                    return back()->with('error', $error);
                }
            } else {
                $error = 'image phai co duoi jpg,png,jpeg,gif';
                return back()->with('error', $error);
            }


            $provider = Provider::find($id);
            $provider->name = $request->name;
            $provider->country = $request->country;
            $provider->logo = 'localhost:8000/productImage/' . $fileName;
            $provider->save();
        } else {
            $provider = Provider::find($id);
            $provider->name = $request->name;
            $provider->country = $request->country;
            $provider->save();
        }

        return 'ok';
    }
}
