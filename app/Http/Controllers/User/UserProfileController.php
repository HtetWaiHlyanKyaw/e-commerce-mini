<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Add this line
class UserProfileController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        // Pass user data to the view
        return view('user.profile', ['user' => $user]);
    }

    public function profileUpdate( Request $request)
    {
        {
            // Validate the form data using the validator method
            $validator = $this->validator($request->all());

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Retrieve the currently authenticated user
            $user = Auth::user();

            // Prepare the data to update
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            // Check if the provided current password matches the one in the database
            if ($request->currentPassword && !Hash::check($request->currentPassword, $user->password)) {
                return redirect()->back()->withErrors(['currentPassword' => 'The current password is incorrect.']);
            }

            // Update the user's password if a new password is provided
            if ($request->newPassword) {
                $data['password'] = Hash::make($request->newPassword);
            }

            // Update the user's information
            $user->update($data);

            return redirect()->back()->with('success', 'Profile updated successfully.');
        }

    }
    // Validator method for form validation
    private function validator(array $validator)
    {
        // Validate the form data
        return Validator::make($validator, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'currentPassword' => 'required',
            'newPassword' => 'nullable|min:8|different:currentPassword|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
            'confirm' => 'nullable|same:newPassword',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email has already been taken.',
            'currentPassword.required' => 'The current password is required',
            'currentPassword.min' => 'The current password must be at least eight characters.',
            'newPassword.min' => 'The new password must contain at least eight characters.',
            'newPassword.regex' => 'The new password must contain at least one capital letter and one digit.',
            'confirm.same' => 'The confirm password must match the new password.',
        ]);
    }

}
