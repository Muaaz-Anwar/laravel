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
            return view('pages.index', ['user'=> $user, 'users'=> null]);
        } else {
            $users = DB::table('students')
            // ->where('id', $id)
            // ->where([
            // ['city', '=', ''goa],
            // ['age', '>', '21']
            // ])
            // ->wherebetween('id', [3,6])
            // ->orwherenotbetween('id', [3,6])
            // ->where('email', 'anuemail@gmail.com')
            // ->distinct() Unique  Values
            // ->select( 'email')
            ->get();
        // return $users;
        // dd($users);
        // dump($users);
        return view('pages.index', ['users'=> $users, 'user'=> null] );
        }


    }
}
}
