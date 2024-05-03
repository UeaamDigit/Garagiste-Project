<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthManager extends Controller
{
    function login()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('registration');
    }
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;


        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
    /**
     * @Route("/gestion-voiture", name="gestionVoiture")
     */
    public function gestionVoiture()
    {
        return view('gestionVoiture');
    }

    public function gestionClients()
    {
        return view('dashboard');
    }

    public function gestionCharts()
    {
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];

        return view('gestionCharts', compact('data'));
    }


    /*function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with('error', "Login credentials are not valid.");
    } */

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember'); // Check if remember checkbox is checked

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('dashboard'); // Redirect to the dashboard route upon successful login
        }

        return redirect(route('login'))->with('error', "Login credentials are not valid.");
    }
    public function dashboard()
    {
        // Fetch the users' data
        $users = User::all();

        // Pass the users' data to the dashboard view
        return view('dashboard', compact('users'));
    }


    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            // Add validation for user_type if necessary, for example:
            'user_type' => 'required|in:client,mechanic,administrator',
            // Conditional validation based on user_type could be added here
        ]);

        $data = $request->only('name', 'email', 'password', 'user_type');
        $data['password'] = Hash::make($data['password']);

        // Assign roles based on user_type
        switch ($request->user_type) {
            case 'client':
                $data['isClient'] = true;
                break;
            case 'mechanic':
                $data['isMechanic'] = true;
                $data['phone_number'] = $request->phone_number;
                $data['specialisation'] = $request->specialisation;
                $data['address'] = $request->address;
                $data['city'] = $request->city;
                break;
            case 'administrator':
                $data['isAdmin'] = true;
                $data['codeLogin'] = $request->codeLogin;
                break;
        }

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with('error', "User not created. Please try again.");
        }

        return redirect(route('login'))->with('success', "User created successfully. You can now login.");
    }



    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function deleteUser(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'User not found');
        }

        // Delete the user
        $user->delete();

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }
}
