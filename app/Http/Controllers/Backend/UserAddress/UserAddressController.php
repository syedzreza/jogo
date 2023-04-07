<?php

namespace App\Http\Controllers\Backend\UserAddress;

use App\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    public function index()
    {
        $useraddress=UserAddress::all();
        return view('admin.User_Address.All', compact('useraddress'));
    }

    public function addUser()
    {
        return view('admin.User_Address.Add');
    }
    public function saveUserAddress(Request $request)
    {
        $msg = [
            'name.required' => 'Enter Your Name',
            'phone.required' => 'Enter Your Phone',
            'state.required' => 'Enter Your State',
            'city.required' => 'Enter Your City',
            'pincode.required' => 'Enter Your Pincode',
            'address.required' => 'Enter Your Address',
        ];
        $this->validate($request, [
            'name' => 'required','city' => 'required',
            'phone' => 'required','pincode' => 'required',
            'state' => 'required', 'address' => 'required',
        ], $msg);

        $name = $request->get('name');
        $phone = $request->get('phone');
        $state = $request->get('state');
        $city = $request->get('city');
        $pincode = $request->get('pincode');
        $address = $request->get('address');

        $useraddress = new UserAddress();
        $useraddress->user_id = Auth::user()->id;
        $useraddress->name = $name;
        $useraddress->phone = $phone;
        $useraddress->state = $state;
        $useraddress->city = $city;
        $useraddress->pincode = $pincode;
        $useraddress->address = $address;
        $useraddress->status = "Inactive";
        $useraddress->save();
        return redirect()->back()->with('success','User Address Added Successfully !!!');
    }
    public function editUserForm(Request $request)
    {
        $id = $request->get('id');
        $useraddress = UserAddress::find($id);
//        return view('Frontendtheme.pages.myaccount', compact('useraddress'));

        return response()->json(['status'=>"success",'e_u_address'=>$useraddress,'msg'=>"Edit Successfull"]);
    }

    public function editUser(Request $request)
    {
        $msg = [
            'name.required' => 'Enter Your Name',
            'phone.required' => 'Enter Your Phone',
            'state.required' => 'Enter Your State',
            'city.required' => 'Enter Your City',
            'pincode.required' => 'Enter Your Pincode',
            'address.required' => 'Enter Your Address',
        ];
        $this->validate($request, [
            'name' => 'required','city' => 'required',
            'phone' => 'required','pincode' => 'required',
            'state' => 'required', 'address' => 'required',
        ], $msg);

        $id = $request->get('id');
        $name = $request->get('name');
        $phone = $request->get('phone');
        $state = $request->get('state');
        $city = $request->get('city');
        $pincode = $request->get('pincode');
        $address = $request->get('address');
        UserAddress:: where('id',$id)->update([
            'name' => $name,
            'phone' => $phone,
            'state' => $state,
            'city' => $city,
            'pincode' => $pincode,
            'address' => $address,
            'status' => 'Inactive'
        ]);

        return response()->json(['status' => "success",'msg' => 'User Address Updated Successfully !!!']);
    }

    public function active_inactive_user(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');
        if($status=='Active'){
            UserAddress::where('id',$id)->update([
                'status' => 'Inactive',
            ]);
            $st='Inactive';
            $html='<a href="javascript:void(0);" class="btn btn-warning" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }
        else{
            UserAddress::where('id',$id)->update([
                'status' => 'Active',
            ]);
            $st='Active';
            $html='<a href="javascript:void(0);" class="btn btn-success" onclick="active_inactive_user('.$id.','.$st.')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }

    }

    public function delUser(Request $request)
    {
        $id = $request->get('id');
        UserAddress:: where('id', $id)->delete();
        return response()->json(['status' => 'success','msg' => 'User Address Deleted Successfully !!!']);
    }
}
