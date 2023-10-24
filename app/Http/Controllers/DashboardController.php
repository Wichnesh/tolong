<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sectors = Sector::where('user_id', $user->id)->get();
        $data['sectors_count'] = count($sectors);
        $employers = Employer::where('user_id', $user->id)->get();
        $data['employers_count'] = count($employers);
        $employees = Employee::where('user_id', $user->id)->get();
        $data['employes_count'] = count($employees);


        $employer_expire_counts = [];
        $today = now();

        $dateRanges = [
            [0, 30],
            [30, 60],
            [60, 90],
            [90, 120],
            [120, 150],
            [150, 180],
        ];

        foreach ($dateRanges as $range) {
            $startDays = $range[0];
            $endDays = $range[1];
            $startDate = $today->copy()->addDays($startDays)->format('Y-m-d');
            $endDate = $today->copy()->addDays($endDays)->format('Y-m-d');
            $count = Employer::where('user_id',Auth::id())->where('passport_expire', '>=', $startDate)
                ->where('passport_expire', '<', $endDate)
                ->count();

            $employer_expire_counts["$startDays-$endDays"] = $count;
        }

        $employee_expire_counts = [];
        $today = now();

        $dateRanges = [
            [0, 30],
            [30, 60],
            [60, 90],
            [90, 120],
            [120, 150],
            [150, 180],
        ];

        foreach ($dateRanges as $range) {
            $startDays = $range[0];
            $endDays = $range[1];
            $startDate = $today->copy()->addDays($startDays)->format('Y-m-d');
            $endDate = $today->copy()->addDays($endDays)->format('Y-m-d');
            $count = Employee::where('user_id',Auth::id())->where('passport_ex_date', '>=', $startDate)
                ->where('passport_ex_date', '<', $endDate)
                ->count();

            $employee_expire_counts["$startDays-$endDays"] = $count;
        }

        return view('skins.inc.dashboard', compact('data', 'employer_expire_counts', 'employee_expire_counts'));
    }
}
