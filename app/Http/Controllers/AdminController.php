<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Employee;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\EmployeeRenewal;
use App\Models\employerRenewal;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function workersList()
  {
    $employees = Employee::with('employer')->join('sectors', 'employees.sector_id', '=', 'sectors.id')->where('employees.user_id', Auth::id())->where('employees.status',1)->select('employees.*', 'sectors.sector_name')->get();
    return view('skins.inc.workersList', compact('employees'));
  }

  public function employerList()
  {
    $employers = Employer::where('user_id', Auth::id())->where('status',1)->get();
    return view('skins.inc.employersList', compact('employers'));
  }

  public function sectorList()
  {
    $sectors = Sector::where('user_id', Auth::id())->where('status',1)->get();
    return view('skins.inc.sectorsList', compact('sectors'));
  }

  public function employerRenewal()
  {
    $employers = Employer::where('user_id', Auth::id())->get();
    return view('skins.inc.renewal.employerRenewal', compact('employers'));
  }

  public function getEmployerDetails($id)
  {
    $employer = Employer::find($id);

    return response()->json($employer);
  }

  public function employeeRenewal()
  {
    $employers = Employer::where('user_id', Auth::id())->get();

    return view('skins.inc.renewal.employeeRenewal', compact('employers'));
  }

  public function getEmployee($id)
  {
    $employer = Employer::find($id);

    if ($employer) {
      $employees = $employer->employees;

      $data = [
        'employer' => $employer,
        'employees' => $employees,
      ];

      return response()->json($data);
    }
  }

  public function getEmployeeDetails($id)
  {
    $employee = Employee::find($id);
    $sector_id = $employee->sector_id;
    $sector_name = Sector::find($sector_id);
    $data = [
      'employee' => $employee,
      'sector' => $sector_name
    ];
    return response()->json($data);
  }

  public function renewalList(){
    $employer_renewals = employerRenewal::leftJoin('employers', 'employer_renewals.employer_id','=', 'employers.id')->where('employer_renewals.user_id',Auth::id())->where('employer_renewals.status', '=',1)->get();

    $employee_renewals = EmployeeRenewal::leftJoin('employees', 'employee_renewals.employee_id', '=', 'employees.id')
    ->where('employee_renewals.user_id', Auth::id())->where('employee_renewals.status','=',1)
    ->get();

    return view('skins.inc.renewal.renewalList',compact('employer_renewals', 'employee_renewals'));
  }

  public function employerExpiryList($dateRange){
    $a= list($start, $end) = explode('-', $dateRange);
    $employers = Employer::where(function ($query) use ($start, $end) {
      $startDate = Carbon::now()->addDays($start)->toDateString();
      $endDate = Carbon::now()->addDays($end)->toDateString();
      
      $query->where('passport_expire', '>=', $startDate)
      ->where('passport_expire', '<', $endDate);
    })->get();
      return view('skins.inc.employer_expiry_details',compact('employers'));
  }
}
