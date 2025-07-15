<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function show($id = null)
    {
        {
            if ($id) {
                $user = DB::table('students')->find($id);
                return view('pages.index', ['user' => $user, 'value' => 1]);
            } else {
                $users = DB::table('students')
                    ->get();
                return view('pages.index', ['users' => $users, 'value' => 0]);
                // ->min('age')->max('price')
                // ->avg('age')->sum()
                // ->limit(5)->offset(4)
                // ->whereMonth('created_at', '9')
                // ->orderBy('id','DESC')
                // ->latest()
                // ->oldest()
                // ->whereDate('created_at', '2025-07-14')
                // $users = DB::table('students')->whereBetween('id', [1,15])->get();
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
    public function add(){
        // $user = DB::table('students')->insertOrIgnore([
        //     [
        //     'name'=> "ali asghar",
        //     'email'=> 'asghar@gmail.com',
        //     'created_at' => Now(),
        //     'updated_at' => Now(),
        //     ],
        //     [
        //     'name'=> "zain adnan",
        //     'email'=> 'zain@yahoo.com',
        //     'created_at' => Now(),
        //     'updated_at' => Now(),
        //     ],
        //     [
        //     'name'=> "Toqeer adnan",
        //     'email'=> 'toqeer@gmail.com',
        //     'created_at' => Now(),
        //     'updated_at' => Now(),
        // ]
        // ]);
        $user = DB::table('students')->upsert([
            'name'=> "Toweer ahmad",
            'email'=> 'toqeer007@gmail.com',
            'created_at' => Now(),
            'updated_at' => Now(),
        ],['email'],['name']
    );
        if ($user) {
            echo "<h1>Data Has been added successfully</h1>";
        }else {
            echo "<h1>Data not added</h1>";
        }
    }

    public function update($id = null){
        $user = DB::table("students")
        ->where("id", $id)
        //insert or update //
        // ->increment('age', 5)->decrement('price', 500, ['email', 'anyemail@gmail.com'])
        ->update([
            "name"=> 'dayana.baumbach',
            'email'=> "dayana.baumbach@hirthe.org",
        ]);
        if ($user) {
            return redirect('controller');
        }else{
            echo "<h1>Data Not</h1>";
        }
    }
}
