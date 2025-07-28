<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;

class employeeController extends Controller
{
    public function index()
    {
        return view("employee.view");
    }

    public function view()
    {
        $employees = Employee::all();
        return response()->json(['message' => $employees]);
    }

    public function create(Request $request)
    {
            $user = DB::table("employees")->insert([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "created_at" => Now(),
                "updated_at" => Now(),
            ]);
            if ($user) {
                return response()->json(['message' => "Added"]);
            } else {
                return response()->json(['message' => "Not Added"]);
            }
    }
    public function edit($id){
        $employee = Employee::find($id);
        return response()->json(['message' => $employee]);
    }

    public function delete($id){
        $employee = DB::table('employees')->where('id', $id)->delete();
        if( $employee ) {
            return response()->json(['message'=> 'Deleted User']);
        }else{
            return response()->json(['message'=> 'Error while Deleting User']);
        }

    }
    public function update(Request $request, $id){
        $employee = Employee::find($id);
        $user = DB::table('employees')->where('id', $id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
         ]);
        if ($user) {
            return response()->json(['message'=> "Employee updated Successfully"]);
        }else{
            return response()->json(["message"=> "Error updating employee "]);
        }
    }
}
