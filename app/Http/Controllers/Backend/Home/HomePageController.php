<?php

namespace App\Http\Controllers\Backend\Home;

use App\HomePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        $homepages = HomePage::all();
        return view('admin.Home.HomePage.All', compact('homepages'));
    }

    public function add()
    {
        return view('admin.Home.HomePage.Add');
    }
    public function save(Request $request)
    {
        $msg = [
            'title.required' => 'Enter Title Name',
            'description.required' => 'Enter Description Name',
            'button_name.required' => 'Enter Button Name Name',
            'delivery.required' => 'Enter Delivery Name',
            'link.required' => 'Enter Link Name',
        ];
        $this->validate($request, [
            'title' => 'required','delivery' => 'required',
            'description' => 'required','link' => 'required',
            'button_name' => 'required',
        ],$msg);

        $title = $request->get('title');
        $description = $request->get('description');
        $shop = $request->get('button_name');
        $delivery = $request->get('delivery');
        $link = $request->get('link');

        $homepages = new HomePage();
        $homepages->title = $title;
        $homepages->description = $description;
        $homepages->shop = $shop;
        $homepages->delivery = $delivery;
        $homepages->link = $link;
        $homepages->save();

        return redirect()->back()->with('success','Home Page Added Successfully !!!');
    }
    public function edit($id){
        $homepages = HomePage::where('id', $id)->first();
        return view('admin.Home.HomePage.Edit', compact('homepages'));
    }

    public function update(Request $request , $id)
    {
        $msg = [
            'title.required' => 'Enter Title Name',
            'description.required' => 'Enter Description Name',
            'button_name.required' => 'Enter Button Name Name',
            'delivery.required' => 'Enter Delivery Name',
            'link.required' => 'Enter Link Name',
        ];
        $this->validate($request, [
            'title' => 'required','delivery' => 'required',
            'description' => 'required','link' => 'required',
            'button_name' => 'required',
        ], $msg);
        $title = $request->get('title');
        $description = $request->get('description');
        $shop = $request->get('button_name');
        $delivery = $request->get('delivery');
        $link = $request->get('link');

        $homepages = HomePage:: where('id',$id)->first();
        $homepages->title = $title;
        $homepages->description = $description;
        $homepages->button_name = $shop;
        $homepages->link = $link;
        $homepages->delivery = $delivery;

        $homepages->save();

        return redirect()->back()->with('success', 'Home Page Updated Successfully !!!');
    }

    public function active_inactive_user(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');
        if($status=='Active'){
            HomePage::where('id',$id)->update([
                'status' => 'Inactive',
            ]);
            $st='Inactive';
            $html='<a href="javascript:void(0);" class="btn btn-warning" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }
        else{
            HomePage::where('id',$id)->update([
                'status' => 'Active',
            ]);
            $st='Active';
            $html='<a href="javascript:void(0);" class="btn btn-success" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }

    }

    public function delete($id)
    {
        $homepages = HomePage:: find($id);

        $homepages->delete();
        return redirect()->back()->with('success', 'Home Page Deleted Successfully !!!');
    }
}
