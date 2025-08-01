<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class employeeController extends Controller
{
    public function index()
    {
        return view("employee.view");
    }

    public function view()
    {
        $employees = DB::table("employees")->orderBy('id', 'DESC')->get();
        return response()->json(['message' => $employees]);
    }

    public function create(Request $request)
    {
        if ($request->hasFile('profile')) {
            // Store the file in public/profile_images directory
            $imagePath = $request->file('profile')->store('profile_images', 'public');
        }
        $user = DB::table("employees")->insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "profile" => $imagePath,
            "created_at" => Now(),
            "updated_at" => Now(),
        ]);
        if ($user) {
            return response()->json(['message' => "Added"]);
        } else {
            return response()->json(['message' => "Not Added"]);
        }
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return response()->json(['message' => $employee]);
    }

    public function delete($id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        if ($employee && $employee->profile) {
            Storage::disk('public')->delete($employee->profile);
        }
        $del = DB::table('employees')->where('id', $id)->delete();
        if ($del) {
            return response()->json(['message' => 'Deleted User']);
        } else {
            return response()->json(['message' => 'Error while Deleting User']);
        }
    }
    public function update(Request $request, $id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();
        $previousimage = $employee->profile;
        if ($request->hasFile('profile')) {
            if ($previousimage && Storage::disk('public')->exists($previousimage)) {
                Storage::disk('public')->delete($previousimage);
            }

            // ✅ Store new file
            $imagePath = $request->file('profile')->store('profile_images', 'public');
        }
        // ✅ Update employee record
        $updated = DB::table('employees')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => $imagePath, // Always update image path
            'updated_at' => now()
        ]);

        if ($updated) {
            return response()->json(['message' => 'Employee updated successfully']);
        } else {
            return response()->json(['message' => 'Error updating employee'], 500);
        }
    }
}
