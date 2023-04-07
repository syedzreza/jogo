<?php

namespace App\Http\Controllers\Backend\Product;

use App\Category;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Calculation\Database;


class ProductController extends Controller
{
    public function index()
    {
        $products=Product::OrderBy('cat_id','asc')->get();
        return view('admin.Product.all', compact('products'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.Product.add',compact('categories'));
    }
    public function save(Request $request)
    {
        $msg = [
            'product_name.required' => 'Enter Product Name',
            'product_image.required' => 'Enter Product Image',
            'product_title.required' => 'Enter Product Title',
            'product_description.required' => 'Enter Product Description',
            'sale_price' => 'Enter Product Sale Price',
            'regular_price' => 'Enter Product Regular Price',
        ];
        $this->validate($request, [
            'product_name' => 'required',
            'product_image' => 'required|file',
            'product_title' => 'required',
            'product_description' => 'required',
            'sale_price' => 'required',
            'regular_price' => 'required',
            'in_stock' => 'required',
        ],$msg);

        $cat_id = $request->get('cat_id');
        $name = $request->get('product_name');
        $title = $request->get('product_title');
        $desc = $request->get('product_description');
        $saleprice = $request->get('sale_price');
        $regularprice = $request->get('regular_price');
        $stock = $request->get('in_stock');
        $slug = Str::slug($request->get('product_name'));

        if ($request->hasFile('product_image'))
        {
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationpath = public_path().'/Product/image/';
            $image->move($destinationpath,$imageName);
        }

        $products = new Product();
        $products->cat_id = $cat_id;
        $products->product_name = $name;
        $products->product_image = $imageName;
        $products->product_title = $title;
        $products->product_description = $desc;
        $products->sale_price = $saleprice;
        $products->regular_price = $regularprice;
        $products->in_stock = $stock;
        $products->slug = $slug;
        $products->status = "InActive";
        $products->save();

        return redirect()->back()->with('success','Product Added Successfully !!!');
    }
    public function edit($id)
    {
        $categories = Category::all();
        $products = Product::find($id);
        return view('admin.Product.edit', compact('products','categories'));
    }

    public function update(Request $request ,$id)
    {
        $msg = [
        'product_name.required' => 'Enter Product Name',
        'product_title.required' => 'Enter Product Title',
        'product_description.required' => 'Enter Product Description',
        'sale_price' => 'Enter Product Sale Price',
        'regular_price' => 'Enter Product Regular Price',
    ];
        $this->validate($request, [
            'product_name' => 'required',
            'product_title' => 'required',
            'product_description' => 'required',
            'sale_price' => 'required',
            'regular_price' => 'required',
            'in_stock' => 'required',
        ],$msg);

        $cat_id = $request->get('cat_id');
        $name = $request->get('product_name');
        $title = $request->get('product_title');
        $desc = $request->get('product_description');
        $saleprice = $request->get('sale_price');
        $regularprice = $request->get('regular_price');
        $stock = $request->get('in_stock');
        $slug = Str::slug($request->get('product_name'));

        $old = Product::find($id)->product_image;

        if($request->hasFile('product_image'))
        {
            $path = public_path().'/Product/image/'.$old;
            if (file_exists($path)){
                unlink($path);
            }
            $image            = $request->file('product_image');
            $destinationPath = public_path().'/Product/image/';
            $imageName        = time().'.'. $image->getClientOriginalExtension();
            $request->file('product_image')->move($destinationPath, $imageName);
            $profile = $imageName;
        }else{
            $profile = $old;
        }

        $products = Product::where('id',$id)->first();
        $products->cat_id = $cat_id;
        $products->product_name = $name;
        $products->product_image = $profile;
        $products->product_title = $title;
        $products->product_description = $desc;
        $products->sale_price = $saleprice;
        $products->regular_price = $regularprice;
        $products->in_stock = $stock;
        $products->status = "Active";
        $products->slug = $slug;
        $products->save();

        return redirect()->back()->with('success', 'Product Updated Successfully !!!');
    }

    public function active_inactive_user(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');
        if($status=='Active'){
            Product::where('id',$id)->update([
                'status' => 'Inactive',
            ]);
            $st='Inactive';
            $html='<a href="javascript:void(0);" class="btn btn-warning" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }
        else{
            Product::where('id',$id)->update([
                'status' => 'Active',
            ]);
            $st='Active';
            $html='<a href="javascript:void(0);" class="btn btn-success" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }

    }

    public function delete($id)
    {
        $products = Product::where('id',$id)->first();
        $path = public_path().'/Product/image/'.$products->product_image;
        if (file_exists($path)){
            unlink($path);
        }
        $products->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully !!!');
    }
}
