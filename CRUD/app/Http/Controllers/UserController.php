<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::Paginate(3);
        return view("index", compact("users"));
    }
    public function add()
    {
        return view('add');
    }
    public function store(Request $request)
    {
        $user = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Now(),
            'updated_at' => Now(),
        ]);
        if ($user) {
            return redirect('/')->with('success', 'User Added Successfully');
        } else {
            return redirect('index')->with('success', 'Error while adding user');
        }
    }
    public function edit($id){
        $user = User::findOrFail($id);
        if($user){
            return view('edit', compact('user'));
        }
    }
    public function update(Request $request, $id){
        $user = DB::table('users')->where('id', $id)->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        if ($user) {
            return redirect('/')->with('success','User Updated Successfully');
        }else{
            return redirect('/')->with('success','Error while updating user');
        }
    }
    public function delete($id){
        $user = DB::table('users')->where('id', $id)->delete();
        if ($user) {
            return redirect('/')->with('success','User Deleted Successfully');
        }else{
            return redirect('/')->with('success','Error while deleting user');
        }
    }
}
