<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get student data from the model
        $studentData = User::getPracticumStudentData();

        // Set the timezone to WIB (Indonesia Western Time)
        $now = Carbon::now('Asia/Jakarta'); 
        $currentHour = $now->hour;

        // Determine the greeting message based on the current hour (WIB) [cite: 157]
        // 05.00-11.59 → Good Morning [cite: 158]
        if ($currentHour >= 5 && $currentHour <= 11) {
            $greeting = 'Good Morning';
        // 12.00-14.59 → Good Afternoon [cite: 159]
        } elseif ($currentHour >= 12 && $currentHour <= 14) {
            $greeting = 'Good Afternoon';
        // 15.00-17.59 → Good Evening [cite: 161]
        } elseif ($currentHour >= 15 && $currentHour <= 17) {
            $greeting = 'Good Evening';
        // Outside those hours → Good Night [cite: 162]
        } else {
            $greeting = 'Good Night';
        }

        // Format access time and date
        // Current access time displayed in "H:i:s" WIB format [cite: 164]
        $accessTime = $now->format('H:i:s'); 
        // Today's date displayed in d-m-Y format (e.g., 11-04-2025) [cite: 165]
        $accessDate = $now->format('d-m-Y'); 

        return view('Dashboard', compact('studentData', 'greeting', 'accessTime', 'accessDate'));
    }
}