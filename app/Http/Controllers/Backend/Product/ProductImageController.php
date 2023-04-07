<?php

namespace App\Http\Controllers\Backend\Product;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    public function index()
    {
        $productsimage= ProductImage::all();
        return view('admin.ProductImage.All',compact('productsimage'));
    }

    public function add($id)
    {
        $product_images = ProductImage::where('product_id',$id)->get();
        return view('admin.ProductImage.Add',compact('id','product_images'));
    }
    public function save(Request $request)
    {
        $msg = [
            'images.required' => 'Please choose image',
//            'images.max' => 'max image size not greater than 2 mb',
//            'images.dimensions' => 'image dimensions should be 1920 * 1280',
//            'images.height' => 'image width should be 1280px',
        ];
        $this->validate($request, [
            'images' => 'required'
        ],$msg);

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $imageName = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/Product/images');
                $image->move($destinationPath, $imageName);

                $productsimage= new ProductImage();
                $productsimage->images = $imageName;
                $productsimage->product_id = $request->get('product_id');
                $productsimage->save();
            }
        }

        return redirect()->back()->with('success','Product Image Added Successfully !!!');
    }

    public function delete($id)
    {
        $productsimage = ProductImage::where('id',$id)->first();
        $path = public_path().'/Product/images/'.$productsimage->images;
        if (file_exists($path)){
            unlink($path);
        }
        $productsimage->delete();
        return redirect()->back()->with('success', 'Product Image Deleted Successfully !!!');
    }
}
