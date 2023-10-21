<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeRenewal;
use App\Models\Employer;
use App\Models\employerRenewal;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadsController extends Controller
{
    public function addDetails()
    {
        return view('skins.inc.uploads.addDetails');
    }
    public function addSector()
    {
        return view('skins.inc.uploads.addSector');
    }

    public function insertSector(Request $request)
    {
        $user = Auth::user();
        $sector = new Sector();
        $sector->user_id = $user->id;
        $sector->sector_name = $request->sector;
        $sector->role_id = $user->role_id;
        $sector->status = 1;
        $sector->save();
        return back()->with('message', 'Sector Inserted Successfully');
    }

    public function addEmployer()
    {
        $sectors = Sector::where('user_id', Auth::id())->get();
        return view('skins.inc.uploads.addEmployer', compact('sectors'));
    }

    public function insertEmployer(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'ps_ise' => 'required',
            'ps_ex' => 'required',
            'lic' => 'required',
            'per' => 'required',
            'sectors' => 'required',
            'quota' => 'required'
        ], [
            'name.required' => 'Name is Required',
            'address.required' => 'Address is Required',
            'phone.required' => 'Phone Number is Require',
            'ps_ise' => 'Passport Issue Date is Required',
            'ps_ex' => 'Passport Expire Date is Required ',
            'lic.required' => 'License is Required',
            'per.required' => 'Perkeso Employers Code is Required',
            'sectors.required' => 'Please Select any one sectors',
            'quota.required' => 'Quota is Required'
        ]);
        $user = Auth::user();
        $employer = new Employer();
        $employer->user_id = $user->id;
        $employer->emp_name = $request->name;
        $employer->emp_address = $request->address;
        $employer->emp_phone = $request->phone;
        $employer->passport_issue = $request->ps_ise;
        $employer->passport_expire = $request->ps_ex;
        $employer->emp_lic = $request->lic;
        $employer->emp_per_code = $request->per;
        $employer->qute_count = $request->quota;
        $employer->sectors_ids = implode(',', $request->sectors);
        $employer->status = 1;
        $employer->save();
        return back()->with('message', 'Employer Added SuccessFully');
    }

    public function addEmployee()
    {
        $employers = Employer::where('user_id', Auth::id())->get();
        if (!empty($employers)) {
            $sectorsIds = $employers->pluck('sectors_ids')[0] ?? '';
            $sectorIdsArray = explode(',', $sectorsIds);
        } else {
            $sectorIdsArray = [];
        }

        $emp_sectors = Sector::whereIn('id', $sectorIdsArray)->get();
        return view('skins.inc.uploads.addEmploye', compact('employers', 'emp_sectors'));
    }

    public function getSector($id)
    {
        $employer = Employer::where('id', $id)->get();
        $sectorsIds = $employer->pluck('sectors_ids')[0];
        $sectorIdsArray = explode(',', $sectorsIds);
        $emp_sectors = Sector::whereIn('id', $sectorIdsArray)->get();
        return response()->json($emp_sectors);
    }

    public function insertEmployee(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'emp_name' => 'required',
            'emp_sector' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'dob' => 'required',
            'ps_num' => 'required',
            'ps_ise' => 'required',
            'ps_ex' => 'required',
            'wrk_yr' => 'required',
            'st_num' => 'required',
            'wrkpass_ise' => 'required',
            'wrkpass_exp' => 'required',
            'remarks' => 'required'
        ], [
            'emp_name.required' => 'Please Select Employer Name',
            'emp_sector.required' => 'Please Select Sector',
            'f_name.required' => 'First Name is Required',
            'l_name.required' => 'Last Name is Required',
            'm_name.required' => 'Middle Name is Required',
            'dob.required' => 'Date of birth Required',
            'ps_num.required' => 'Passport Number is Required',
            'ps_ise.required' => 'Passport Issue Date is Required',
            'ps_ex' => 'Passport Expire Date is Required ',
            'wrk_yr.required' => 'Work Permit year is Required',
            'st_num.required' => 'Stamp Number is Required',
            'wrkpass_ise.required' => 'Work Pass Issue Date is Required',
            'wrkpass_exp.required' => 'Work Pass Expire Date is Required ',
            'remarks.required' => 'Remarks is Required'
        ]);
        $quota_check = Employer::find($request->emp_name);

        if ($quota_check) {
            if ($quota_check->qute_count > 0) {
                $quota_check->decrement('qute_count', 1);
            } else {
                return back()->with('error', 'Employer Quota Not Available');
            }
        } else {
            // Handle the case where no employer is found with the given ID
        }
        $user = Auth::user();
        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->employer_id = $request->emp_name;
        $employee->sector_id = $request->emp_sector;
        $employee->emp_fname = $request->f_name;
        $employee->emp_lname = $request->l_name;
        $employee->emp_mname = $request->m_name;
        $employee->emp_dob = $request->dob;
        $employee->passport_number = $request->ps_num;
        $employee->passport_is_date = $request->ps_ise;
        $employee->passport_ex_date = $request->ps_ex;
        $employee->workpass_yr = $request->wrk_yr;
        $employee->sticker_number = $request->st_num;
        $employee->workpass_is_date = $request->wrkpass_ise;
        $employee->workpass_ex_date = $request->wrkpass_exp;
        $employee->remarks = $request->remarks;
        $employee->status = 1;
        $employee->save();
        return back()->with('message', 'Employee Insert Successfully');
    }
    public function employerRenewal(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'emp_name' => 'required',
            'visa_type' => 'required',
            'renewal_date' => 'required',
            'expiry_date' => 'required',
            'document' => 'required',
            'status' => 'required',
            'remarks' => 'required'
        ], [
            'emp_name.required' => 'Please Select Employer',
            'visa_type.required' => 'Visa Type Required',
            'renewal_date.required' => 'Visa Renewal Date is Required',
            'expiry_date.required' => 'Visa Expire Date is Required',
            'document.required' => 'Please Attach Document',
            'status.required' => 'Visa Status is Required',
            'remarks.required' => 'Remarks is Required'
        ]);

        $user = Auth::user();
        $renewal = new employerRenewal();
        $renewal->user_id = $user->id;
        $renewal->employer_id = $request->emp_name;
        $renewal->visa_type = $request->visa_type;
        $renewal->renewal_date = $request->renewal_date;
        $renewal->renewal_expiry_date = $request->expiry_date;
        $renewal->visa_status = $request->status;
        $document = $request->file('document');
        if ($document) {
            $document_path = 'uploads/renewal/employer/documents/';
            $document_name = $document->getClientOriginalName();
            $document->move($document_path, $document_name);
            $renewal->renewal_document = $document_path . $document_name;
        }
        $renewal->remarks = $request->remarks;
        $renewal->status = 1;
        $renewal->save();
        return back()->with('message', 'Renewal Request is Succesfully Updated');
    }

    public function insertEmployeeRenewal(Request $request)
    {
        $validate = $request->validate([
            'employee_name' => 'required',
            'visa_type' => 'required',
            'renewal_date' => 'required',
            'expiry_date' => 'required',
            'document' => 'required',
            'status' => 'required',
            'remarks' => 'required'
        ], [
            'employee_name.required' => 'Please Select Employee',
            'visa_type.required' => 'Visa Type Required',
            'renewal_date.required' => 'Visa Renewal Date is Required',
            'expiry_date.required' => 'Visa Expire Date is Required',
            'document.required' => 'Please Attach Document',
            'status.required' => 'Visa Status is Required',
            'remarks.required' => 'Remarks is Required'
        ]);

        $employeeRenewal = new EmployeeRenewal();
        $employeeRenewal->user_id = Auth::id();
        $employeeRenewal->employee_id = $request->employee_name;
        $employeeRenewal->employer_id = $request->emp_name;
        $employeeRenewal->visa_type = $request->visa_type;
        $employeeRenewal->visa_renewal_date = $request->renewal_date;
        $employeeRenewal->visa_renewal_expire_date = $request->expiry_date;
        $employeeRenewal->renewal_status = $request->status;
        $document = $request->file('document');
        if ($document) {
            $document_path = 'uploads/renewal/employee/documents/';
            $document_name = $document->getClientOriginalName();
            $document->move($document_path, $document_name);
            $employeeRenewal->document = $document_path . $document_name;
        }
        $employeeRenewal->remarks = $request->remarks;
        $employeeRenewal->status = 1;
        $employeeRenewal->save();
        return back()->with('message', 'Employee Renewal Request Succesfully Inserted');
    }

    public function editEmployer($id)
    {
        $edit_emp = Employer::find($id);
        $sectors = Sector::where('user_id', Auth::id())->get();

        return view('skins.inc.edit.employerEdit', compact('edit_emp', 'sectors'));
    }

    public function updateEmployer(Request $request)
    {
        $update_emp = Employer::find($request->employer_id);
        $update_emp->emp_name = $request->name;
        $update_emp->emp_address = $request->address;
        $update_emp->emp_phone = $request->phone;
        $update_emp->passport_issue = $request->ps_ise;
        $update_emp->passport_expire = $request->ps_ex;
        $update_emp->emp_lic = $request->lic;
        $update_emp->emp_per_code = $request->per;
        $update_emp->sectors_ids = implode(',', $request->sectors);
        $update_emp->qute_count = $request->quota;
        $update_emp->update();
        return redirect()->intended('/employee-list')->with('message', 'Employer Updated Successfully');
    }

    public function delete($id)
    {
        $delete_emp = Employer::find($id);
        $delete_emp->status = 0;
        $delete_emp->update();
        return redirect()->intended('/employee-list')->with('message', 'Employer Deleted Successfully');
    }

    public function editEmployee($id)
    {
        $emp_edit = Employee::find($id);
        $employers = Employer::where('user_id', Auth::id())->get();
        if (!empty($employers)) {
            $sectorsIds = $employers->pluck('sectors_ids')[0] ?? '';
            $sectorIdsArray = explode(',', $sectorsIds);
        } else {
            $sectorIdsArray = [];
        }

        $emp_sectors = Sector::whereIn('id', $sectorIdsArray)->get();
        return view('skins.inc.edit.employeeEdit', compact('emp_edit', 'employers', 'emp_sectors'));
    }

    public function updateEmployee(Request $request)
    {

        $update = Employee::find($request->employee_id);
        $update->employer_id = $request->emp_name;
        $update->sector_id = $request->emp_sector;
        $update->emp_fname = $request->f_name;
        $update->emp_lname = $request->l_name;
        $update->emp_mname = $request->m_name;
        $update->emp_dob = $request->dob;
        $update->passport_number = $request->ps_num;
        $update->passport_is_date = $request->ps_ise;
        $update->passport_ex_date = $request->ps_ex;
        $update->workpass_yr = $request->wrk_yr;
        $update->sticker_number = $request->st_num;
        $update->workpass_is_date = $request->wrkpass_ise;
        $update->workpass_ex_date = $request->wrkpass_exp;
        $update->remarks = $request->remarks;
        $update->update();

        return redirect()->intended('/workers-list')->with('message', 'Employee Updated Successfully');
    }

    public function deleteEmployee($id)
    {
        $delete = Employee::find($id);
        $delete->status = 0;
        $delete->update();
        return redirect()->intended('/workers-list')->with('message', 'Employee Deleted Succesfully');
    }

    public function editSectors($id)
    {
        $sector = Sector::find($id);

        return view('skins.inc.edit.sectorsEdit', compact('sector'));
    }

    public function updateSector(Request $request)
    {
        $update = Sector::find($request->sec_id);
        $update->sector_name = $request->sector;
        $update->update();
        return redirect()->intended('/sectors-list')->with('message', 'Sector Updated Successfully');
    }

    public function deleteSector($id)
    {
        $delete = Sector::find($id);
        $delete->status = 0;
        $delete->update();
        return redirect()->intended('/sectors-list')->with('message', 'Sector Deleted Successfully');
    }

    public function employerRenewalEdit($id)
    {
        $renewalEdit = employerRenewal::find($id);
        return view('skins.inc.renewal.employer_renewal_edit', compact('renewalEdit'));
    }

    public function editRenewalEmployer(Request $request)
    {
        $edit = employerRenewal::find($request->renewal_id);
        $employer = Employer::find($request->employer_id);
        $employer->passport_issue = $request->renewal_date;
        $employer->passport_expire = $request->expiry_date;
        $employer->update();
        $edit->renewal_date = $request->renewal_date;
        $edit->renewal_expiry_date = $request->expiry_date;
        $edit->visa_type = $request->visa_type;
        $edit->visa_status = $request->status;
        $edit->remarks = $request->remarks;
        $document = $request->file('document');
        if ($document) {
            $document_path = 'uploads/renewal/employer/documents/';
            $document_name = $document->getClientOriginalName();
            $document->move($document_path, $document_name);
            $edit->renewal_document = $document_path . $document_name;
        }
        $edit->update();
        return redirect()->intended('/renewal-list')->with('message', 'Employer Renewal Updated Successfully');
    }

    public function employerRenewalDelete($id)
    {
        $delete = employerRenewal::find($id);
        $delete->status = 0;
        $delete->update();
        return back()->with('message', 'Employer Renewal Deleted Successfully');
    }

    public function employeeRenewalEdit($id)
    {
        $renewalEdit = EmployeeRenewal::find($id);
        return view('skins.inc.renewal.employee_renewal_edit', compact('renewalEdit'));
    }

    public function editRenewalEmployee(Request $request)
    {
        $edit = EmployeeRenewal::find($request->renewal_id);
        $employee = Employee::find($request->employee_id);
        $employee->passport_is_date = $request->renewal_date;
        $employee->passport_ex_date = $request->expiry_date;
        $employee->update();
        $edit->visa_type = $request->visa_type;
        $edit->visa_renewal_date = $request->renewal_date;
        $edit->visa_renewal_expire_date = $request->expiry_date;
        $edit->remarks = $request->remarks;
        $edit->renewal_status = $request->status;
        $document = $request->file('document');
        if ($document) {
            $document_path = 'uploads/renewal/employee/documents/';
            $document_name = $document->getClientOriginalName();
            $document->move($document_path, $document_name);
            $edit->document = $document_path . $document_name;
        }
        $edit->update();

        return redirect()->intended('/renewal-list')->with('message', 'Employee Renewal Updated Successfully');
    }

    public function employeeRenewalDelete($id)
    {
        $delete = EmployeeRenewal::find($id);
        $delete->status = 0;
        $delete->update();
        return back()->with('message', 'Employee Renewal Deleted Successfully');
    }
}
