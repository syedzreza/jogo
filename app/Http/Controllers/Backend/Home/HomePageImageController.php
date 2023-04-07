<?php

namespace App\Http\Controllers\Backend\Home;

use App\HomePageImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageImageController extends Controller
{
    public function index()
    {
        $homepageimages = HomePageImage::all();
        return view('admin.Home.HomePageImage.all', compact('homepageimages'));
    }

    public function add()
    {
        return view('admin.Home.HomePageImage.add');
    }
    public function save(Request $request)
    {
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationpath = public_path()."/Image/";
            $image->move($destinationpath,$imageName);
        }
        $homepageimages = new HomePageImage();
        $homepageimages->image = $imageName;
        $homepageimages->save();

        return redirect()->back()->with('success','Home Page Image Added Successfully !!!');
    }
    public function edit($id){
        $homepageimages = HomePageImage::where('id', $id)->first();
        return view('admin.Home.HomePageImage.edit', compact('homepageimages'));
    }

    public function update(Request $request , $id)
    {
        $old = HomePageImage::find($id)->image;

        if($request->hasFile('image')){
            $path = public_path().'/Image/'.$old;
            if (file_exists($path)){
                unlink($path);
            }
            $image            = $request->file('image');
            $destinationPath = public_path().'/Product/image/';
            $imageName        = time().'.'. $image->getClientOriginalExtension();
            $request->file('image')->move($destinationPath, $imageName);
            $profile = $imageName;
        }else{
            $profile = $old;
        }

        $homepageimages = HomePageImage:: where('id',$id)->first();
        $homepageimages->image = $profile;

        $homepageimages->save();

        return redirect()->back()->with('success', 'Home Page Image Updated Successfully !!!');
    }

    public function active_inactive_user(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');
        if($status=='Active'){
            HomePageImage::where('id',$id)->update([
                'status' => 'Inactive',
            ]);
            $st='Inactive';
            $html='<a href="javascript:void(0);" class="btn btn-warning" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }
        else{
            HomePageImage::where('id',$id)->update([
                'status' => 'Active',
            ]);
            $st='Active';
            $html='<a href="javascript:void(0);" class="btn btn-success" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }

    }

    public function delete($id)
    {
        $homepageimages = HomePageImage:: find($id);
        $path = public_path().'/Image/'.$homepageimages->image;
        if(file_exists($path))
        {
            unlink($path);
        }
        $homepageimages->delete();
        return redirect()->back()->with('success', 'Home Page Image Deleted Successfully !!!');
    }
}
