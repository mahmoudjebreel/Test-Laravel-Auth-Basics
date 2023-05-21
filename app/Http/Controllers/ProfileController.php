<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
        $validate = $request->validated();
        if(isset($validate['password'])){
            $validate['password'] = Hash::make($validate['password']);
        }
        auth()->user()->update($validate);
        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
