<?php

namespace App\Http\Controllers\Backend\Category;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('admin.Category.All', compact('categories'));
    }

    public function add()
    {
        return view('admin.Category.Add');
    }
    public function save(Request $request)
    {
        $msg = [
            'category_name.required' => 'Enter Category Name',
            'image' => 'Please Choose Image'
        ];
        $this->validate($request, [
            'category_name' => 'required',
            'image' => 'required',
        ],$msg);

        $f_name = $request->get('category_name');
        $slug = Str::slug($request->get('category_name'));
        if($request->hasFile('image'))
        {
             $image = $request->file('image');
             $imageName = time().'.'.$image->getClientOriginalExtension();
             $destinationpath = public_path()."/Category/image/";
             $image->move($destinationpath,$imageName);
        }
        $categories = new Category();
        $categories->category_name = $f_name;
        $categories->image = $imageName;
        $categories->slug = $slug;
        $categories->save();

        return redirect()->back()->with('success','Category Added Successfully !!!');
    }
    public function edit($id){
        $categories = Category::where('id', $id)->first();
        return view('admin.Category.Edit', compact('categories'));
    }

    public function update(Request $request , $id)
    {
        $msg = [
            'category_name.required' => 'Enter Category Name',
        ];
        $this->validate($request, [
            'category_name' => 'required',
        ], $msg);

        $f_name = $request->get('category_name');
        $slug = Str::slug($request->get('category_name'));
        $categories = Category:: where('id',$id)->first();

        $old = Category::find($id)->image;
        if($request->hasFile('image')){
            $path = public_path().'/Category/image/'.$old;
            if (file_exists($path)){
                unlink($path);
            }
            $image            = $request->file('image');
            $destinationPath = public_path().'/Category/image/';
            $imageName        = time().'.'. $image->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $imageName);
            $profile = $imageName;
        }else{
            $profile = $old;
        }
        $categories->category_name = $f_name;
        $categories->image = $profile;
        $categories->slug = $slug;
        $categories->save();

        return redirect()->back()->with('success', 'Category Updated Successfully !!!');
    }

    public function active_inactive_user(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');
        if($status=='Active'){
            Category::where('id',$id)->update([
                'status' => 'Inactive',
            ]);
            $st='Inactive';
            $html='<a href="javascript:void(0);" class="btn btn-warning" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }
        else{
            Category::where('id',$id)->update([
                'status' => 'Active',
            ]);
            $st='Active';
            $html='<a href="javascript:void(0);" class="btn btn-success" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }

    }

    public function delete($id)
    {
        $categories = Category:: find($id);
        $path = public_path().'/Category/image/'.$categories->image;
        if (file_exists($path)){
            unlink($path);
        }
        $categories->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully !!!');
    }

}
