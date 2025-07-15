<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function show($id = null){
    {
        if ($id) {
            $user = DB::table('students')->find($id);
            return view('pages.index', ['user'=> $user, 'value' => 1]);
        } else {
            // $users = DB::table('students')->whereDate('created_at', '2025-07-1')->get();
            $users = DB::table('students')->whereBetween('id', [11,15])->get();
            return view('pages.index', ['users'=> $users, 'value' => 0] );
            // ->where('id', $id)
            // ->where([
            // ['city', '=', ''goa],
            // ['age', '>', '21']
            // ])
            // ->wherebetween('id', [3,6])
            // ->wherein('id', [3,6,7])
            // ->orwherenotin('id', [3,6,7])
            // ->wherenull('id')
            // ->wherenotnull('id')
            // ->orwherenotbetween('id', [3,6])
            // ->where('email', 'anuemail@gmail.com')
            // ->distinct() Unique  Values
            // ->select( 'email')
        // return $users;
        // dd($users);
        // dump($users);
        }


    }
}
}
