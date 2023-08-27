<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateCredentialRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }

    public function profile(){
        $profileData = Auth::user()->toArray();
        return view('admin.profile',compact('profileData'));
    }

    public function updateProfile(UpdateProfileRequest $request){
        $user = auth()->user();
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $newPhotoName = date('Ymdhi') . '.'. $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('upload/user_image', $newPhotoName, 'public'); // Store the photo with the new name
            $user->photo = $newPhotoName;
            $userData['photo'] = $newPhotoName;
        }

        $user->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);

        $notification = [
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        ];

        return redirect('admin/profile')->with($notification);
    }

    public function updateCredentials(UpdateCredentialRequest $request){
        $user = auth()->user();

        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        $notification = [
            'message' => 'Credentials updated successfully',
            'alert-type' => 'success',
        ];
        
        return redirect('admin/profile')->with($notification);
    }
}
