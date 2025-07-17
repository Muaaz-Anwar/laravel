<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {   $cities = DB::table("cities")->get();
        // return $cities;
        return view('pages.add', compact('cities'));
    }

    public function show($id = null)
    { {
            if ($id) {
                $user = DB::table('students')->join('cities', 'students.city', '=', 'cities.id')
                ->select('students.*', 'cities.city_name as city_name')
                ->where('students.id','=', $id)
                ->first();
                return view('pages.index', ['user' => $user, 'value' => 1]);
            } else {
                $users = DB::table('students')->join('cities', 'students.city', '=', 'cities.id')
                    ->select(['students.*', 'cities.city_name as city_name'])
                    // ->where('city_name','=', 'South Veda')
                    // ->select(DB::raw('count(*) as std'), 'city_name')
                    // ->groupBy('city_name')
                    // return $users;
                    ->paginate(10);
                return view('pages.index', ['users' => $users, 'value' => 0]);
                // ->paginate(5)->append(['sort' => 'votes', 'test'=> 'ac'])->fragment('users')
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
    public function add(Request $request)
    {
        //     $user = DB::table('students')->upsert([
        //         'name'=> "Toweer ahmad",
        //         'email'=> 'toqeer007@gmail.com',
        //         'created_at' => Now(),
        //         'updated_at' => Now(),
        //     ],['email'],['name']
        // );
        $user = DB::table('students')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'created_at' => Now(),
            'updated_at' => Now(),
        ]);
        if ($user) {
            return redirect()->route('add_student')->with('success', 'Data Added');
        } else {
            echo "<h1>Data not added</h1>";
        }
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
    }

    public function update(Request $request)
    {
        $user = DB::table("students")
            ->where("id", $request->id)
            //insert or update //
            // ->increment('age', 5)->decrement('price', 500, ['email', 'anyemail@gmail.com'])
            // ->incrementeach([
            // 'age' => 5,
            // 'other_int_field' => 5,
            // ]);
            ->update([
                "name" => $request->name,
                'city'=> $request->city,
                'email' => $request->email,
                'updated_at' => Now(),
            ]);
        if ($user) {
            return redirect()->route('view_student')->with('success', 'Data Added Successfully');
        } else {
            echo "<h1>Data Not</h1>";
        }
    }
    public function delete($id)
    {
        $user = DB::table("students");
        $user->where("id", $id)->delete();
        if ($user) {
            return redirect("controller");
        } else {
            echo "<h1>Data Not Deleted</h1>";
        }
    }
    public function edit($id)
    {
        $user = DB::table("students")
        ->join('cities', 'students.city', '=', 'cities.id')
        ->select('students.*', 'cities.city_name as city_name')
                ->where('students.id','=', $id)
        ->first();
        $city = DB::table('cities')
        ->select('cities.*')
        ->where('cities.id','!=', $user->city)
        ->get();
        return view("pages.edit", ["user" => $user,"cities"=> $city]);
    }
}
