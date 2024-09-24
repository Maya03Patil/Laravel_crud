<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class registerController extends Controller
{
    public function showRegisterForm(Request $request)
    {
        // Retrieve and decrypt the cookie value if it exists
        $username = $request->cookie('username');
        if ($username) {
            try {
                // Decrypt the cookie value
                $username = Crypt::decrypt($username);
            } catch (\Exception $e) {
                // Handle decryption error (e.g., if the cookie was tampered with)
                $username = null;
            }
        }

        // Pass the username to the view
        return view('register', compact('username'));
    }

    public function postRegister(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);

        // Retrieve the form data
        $username = $validated['username'];
        $password = $validated['password'];

        // Encrypt the cookie value
        $encryptedUsername = Crypt::encrypt($username);

        // Create a response and set a cookie
        $response = response()->view('register', [
            'username' => $username,
            'password' => $password,
        ]);

        // Set the encrypted cookie with the response
        $response->cookie('username', $encryptedUsername, 60); // Cookie expires in 60 minutes

        // Return the response
        return $response;
    }

    public function validateForm(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:255',
        ]);

        $username = $validated['username'];
        $password = $validated['password'];

        // For demonstration, just return the data as a response
        return response()->json([
            'username' => $username,
            'password' => $password,
        ]);
    }
}
