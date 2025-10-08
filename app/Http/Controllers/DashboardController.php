<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     */
    public function index()
    {
        $user = Auth::user(); // get logged-in user data
        return view('applicant.dashboard', compact('user'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('applicant.profile', compact('user'));
    }

    public function uploadDocuments()
    {
        $user = Auth::user();
        return view('applicant.upload-documents', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // You can expand this to save into related tables later
        $user->update([
            'name' => $request->full_name,
            'birthday' => $request->birthday,
            // add more fields as needed
        ]);

        return redirect()->route('dashboard')->with('success', 'Profile information updated successfully!');
    }
}
