<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function menu()
    {

        return view('admin.menu.index');
    }

    public function profile()
    {
        $user = Auth::user();

        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();

        return view('admin.pages.profile',compact('user','divisions', 'districts'));
    }

    public function profileUpdate(Request $request)
    {

        $user = User::find(Auth::id());
        $this->validate($request,[
            'first_name' => 'required|string|max:40',
            'last_name' => 'required|string|max:40',

            'division' => 'required|numeric',
            'district' => 'required|numeric',
            'street_address' => 'required|max:100',
            'image' => 'nullable|image',
        ]);


        //dd($user->username);

        $profileImage = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($profileImage))
    {
//          Make unique name for image
        $currentdate = Carbon::now()->toDateString();
        $profileImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$profileImage->getClientOriginalExtension();

//          Check sliders directory is exists
        if (!Storage::disk('public')->exists('profile'))
        {
            Storage::disk('public')->makeDirectory('profile');
        }

//          Delete old image
        if (Storage::disk('public')->exists('profile/'.$user->image))
        {
            Storage::disk('public')->delete('profile/'.$user->image);
        }

//          Resize image for sliders and upload
        $profileImageSize = Image::make($profileImage)->resize(250,250)->stream();
        Storage::disk('public')->put('profile/'.$profileImageName,$profileImageSize);

    }else{
        $profileImageName = $user->image;
    }



        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->street_address = $request->street_address;
        $user->division = $request->division;
        $user->district = $request->district;
        $user->ip_address = request()->ip();
        $user->about = $request->about;
        $user->image = $profileImageName;
        $user->save();
        Toastr::success('Profile has been Successfully Updated', 'Success');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
       $this->validate($request,[
           'old_password' => 'required',
           'password' => 'required|confirmed',
       ]);

       $hashedPassword = Auth::user()->password;
       if (Hash::check($request->old_password,$hashedPassword))
       {
          if (!Hash::check($request->password,$hashedPassword))
          {
           $user = User::find(Auth::id());
           $user->password = Hash::make($request->password);
           $user->save();
           Toastr::success('Password Successfully Changed :)', 'Success');
           Auth::logout();
           return redirect()->back();
          }else{
           Toastr::error('New password cannot be the same as old password.', 'Error');
           return back();
            }
       }else{
           Toastr::error('Current password not match.', 'Error');
           return back();
       }
    }
}
