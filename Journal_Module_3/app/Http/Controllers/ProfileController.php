<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        // Get student data from the model
        $studentData = User::getPracticumStudentData();

        return view('Profile', compact('studentData'));
    }
}