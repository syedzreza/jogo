<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{
    public function frontlogin()
    {
        return view('Frontendtheme.Auth.login');
    }

    public function registersave(Request $request)
    {
        $fname = $request->get('f_name');
        $lname = $request->get('l_name');
        $phone = $request->get('phone');
        $email = $request->get('email');

        $users = new User();
        $users->f_name = $fname;
        $users->l_name = $lname;
        $users->phone = $phone;
        $users->email = $email;
        $users->password = Hash::make($request->get('password'));
        $users->save();

        return response()->json(['status' => 'success','msg' => "Register Successfull"]);
    }

    public function loginsave(Request $request)
    {
        $this->validate($request,[
            'email'=>'required' ,
            'password'=>'required'
        ]);

        $uid = User::where('email', $request->get('email'))->value('id');
        $pass = User::where('id', $uid)->value('password');

        if (Hash::check($request->get('password'), $pass)) {
            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'user_type' => 'User','status' => 'Active'])) {
                $check_email = Auth::user()->email;
                $request->session()->put('email', $check_email);
                return redirect()->route('home')->with('success', 'Login Successfull !!');
            } else {
                return redirect()->back()->with('fails', 'Invalid Credentials.');
            }
        }else{
            return redirect()->back()->with('fails', 'Invalid Credentials.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return view('Frontendtheme.Auth.login')->with('success','Logout Successfully !!!   Please Login First?');
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);
        $old_pass = $request->current_password;
        $new_pass = $request->new_password;
        $confirm_pass = $request->confirm_password;
        $id = Auth::user()->id;
        $pass=User::where('id',$id)->value('password');
        if(Hash::check($old_pass,$pass)){
            if($new_pass == $confirm_pass){
                $password = Hash::make($new_pass);
                $changePass = User::where('id',$id)->update([
                    'password' => $password,
                ]);
                if($changePass == true){
                    return redirect()->back()->with('success',"Password Updated Sucessfully !!!" );
                }
            }
            else{
                return redirect()->back()->with('error',"New Password and Confirm Password are Not Matched !!!" );
            }
        }
        else{
            return redirect()->back()->with('error',"Current Password Not Matched !!!" );
        }
    }

    public function forgetpassword()
    {
        return view('Frontendtheme.Auth.Forgetpassword');
    }

    public function updateforgetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $user= User::where('email',$request->email)->first();
        $id = $user->id;
        User::where('id', $id);

        Mail::send('Frontendtheme.Auth.resetpassword', ['id' =>$id], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('loginfront')->with('success',"Mail has been sent to your email for password change");
    }
    public function showResetPasswordForm($id) {

        return view('Frontendtheme.Auth.changepassword',compact('id'));
    }
    public function submitResetPasswordForm(Request $request,$id)
    {
        $request->validate([
            'password' => 'required|string|min:6',
//            'password_confirmation' => 'required'
        ]);

        $pass = Hash::make($request->get('password'));

        User::where('id', $id)
            ->update(['password' => $pass]);
        return redirect()->route('loginfront')->with('success',"Password Changed Successfully");
    }

    public function updateprofile(Request $request)
    {
        $f_name = $request->get('first_name');
        $l_name = $request->get('last_name');
        $phone = $request->get('phone');

        $old = User::find(Auth::user()->id)->profile_image;
        if($request->hasFile('profile_image'))
        {
            $profile_image = $request->file('profile_image');
            $path = public_path().'/Frontend/Profile/'.$profile_image->getClientOriginalName();
            if(file_exists($path))
            {
                unlink($path);
            }
            if ($old){
                $path = public_path().'/Frontend/Profile/'.$old;
                unlink($path);
            }
            $image = $request->file('profile_image');
            if($image != null){
                $imageName = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
            }
            $dest = public_path().'/Frontend/Profile/';
            $image->move($dest,$imageName);
        }

        $profiles = User::where('id',Auth::user()->id)->first();
        $profiles->f_name = $f_name;
        $profiles->l_name = $l_name;
        $profiles->phone = $phone;
        $profiles->profile_image = $imageName ?? null;
        $profiles->save();

        return redirect()->back()->with('success', "Update successfull");
    }
}
