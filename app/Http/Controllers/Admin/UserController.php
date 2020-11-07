<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->where('role_id', '2')->get();
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('admin.user.index',compact('users', 'divisions', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'first_name' => ['required', 'string', 'max:40'],
            'last_name' => ['required', 'string', 'max:40'],
            'username' => ['required', 'string', 'max:30', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone' => ['required', 'string', 'max:16', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'division' => ['required', 'numeric'],
            'district' => ['required', 'numeric'],
            'street_address' => ['required', 'max:100'],
        ]);

        $profileImage = $request->file('image');
            $slug = Str::slug($request->first_name);

            if (isset($profileImage))
            {
    //      Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $profileImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$profileImage->getClientOriginalExtension();

    //      Check profile directory is exists
            if (!Storage::disk('public')->exists('profile'))
            {
                Storage::disk('public')->makeDirectory('profile');
            }



    //      Resize image for profile and upload
            $profileImageSize = Image::make($profileImage)->resize(250,250)->stream();
            Storage::disk('public')->put('profile/'.$profileImageName,$profileImageSize);

        }else{
            $profileImageName = NULL;
        }

        $user =  User::create([
                'role_id' => 2,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => Str::slug($request->username),
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'street_address' => $request->street_address,
                'division' => $request->division,
                'district' => $request->district,
                'ip_address' => request()->ip(),
                'remember_token' => Str::random(50),
                'about' => $request->about,
                'status' => 1,
                'image' => $profileImageName,
            ]);

            Toastr::success('User has been Successfully Created', 'Success');
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $user = User::find($id);

            $this->validate($request,[
                'first_name' => 'required|string|max:40',
                'last_name' => 'required|string|max:40',

                'division' => 'required|numeric',
                'district' => 'required|numeric',
                'street_address' => 'required|max:100',
                'image' => 'nullable|image',
            ]);



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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $user->posts()->delete();

            Toastr::success('User Successfully Deleted', 'Success');
            return redirect()->back();
        }
        Toastr::error('User Not Deleted', 'Error');
        return redirect()->back();
    }

    public function userVerify($id)
    {
        $user = User::find($id);

        $user->status = 1;
        $user->save();

        Toastr::success('User Successfully Verify', 'Success');
        return redirect()->back();
    }

    public function userUnverified($id)
    {
        $user = User::find($id);

        $user->status = 0;
        $user->save();

        Toastr::success('User Unverified', 'Success');
        return redirect()->back();
    }
}
