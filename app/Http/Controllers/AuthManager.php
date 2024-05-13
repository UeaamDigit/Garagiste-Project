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
use App\Models\Car;
use PDF;

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

    function createUser()
    {

        return view('createUser');
    }
    function createCar()
    {

        return view('ajouterVoiture');
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
    public function gestionReparations()
    {
        return view('gestionReparation');
    }
    public function gestionInvoice()
    {
        return view('gestionInvoice');
    }

    public function rendezVous()
    {
        return view('rendezVous');
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
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }

    public function export_user_pdf()
    {
        try {
            // Fetch all user
            $users = User::all();

            if ($users->isEmpty()) {
                return redirect()->back()->with('error', 'No user found to export.');
            }

            $pdf = PDF::loadView('pdf.document', [
                'user' => $users
            ]);

            return $pdf->download('document.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error exporting user: ' . $e->getMessage());
        }
    }



    public function addCar(Request $request)
    {
        $car = new Car();
        $car->brand = $request->input('marque');
        $car->model = $request->input('modele');
        $car->type = $request->input('carburant');
        $car->registration_number = $request->input('immatriculation');
        $car->photo = $request->input('photo');
        $car->save();

        return redirect()->route('gestionVoiture')->with('success', 'Car added successfully.');
    }
}
