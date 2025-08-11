<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
       public function showLoginForm()
    {
        return inertia('Admin/Auth/AdminLogin');
    }

    /**
     * Handle an incoming admin login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')
                ->with('success', 'សូមស្វាគមន៍អ្នកបានចូលជាអ្នកគ្រប់គ្រង។');
        }

        return back()->withErrors([
            'email' => 'អ៊ីមែល ឬ ពាក្យសម្ងាត់មិនត្រឹមត្រូវទេ។',
        ]);
    }

    //admin logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect to the login page with a success message
        return redirect()->route('admin.show.login')
            ->with('success', 'អ្នកបានចេញពីប្រព័ន្ធដោយជោគជ័យ។');
    }
    
}
