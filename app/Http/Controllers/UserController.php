<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showAllUser()
    {
        // PAGINATION METHOD 
        // 1. PAGINATE 
        // 2. SIMPLEPAGINATE
        // 3. cursorPaginate (complasary orderBy inclued) 
        $students = DB::table('students')->paginate(5);

        // QUERY BUILDER METHOD----------------------
        // $students = DB::table('students')->get();

        // UNION METHOD-----------------------
        // $teachers = DB::table('teachers');

        // $students = DB::table('students')
        // ->union($teachers)
        // ->get();
        // return $students;

        // WHEN METHOD--------------------
        // $students = DB::table('students')
        //     ->when(true, function ($query) {
        //         $query->where('age', '>', 20);
        //     })
        //     ->get();
        // return $students;

        // CHUNK METHOD---------------------
        // $students = DB::table('students')->orderBy('id')->chunk(4, function ($students) {
        //     foreach ($students as $student) {
        //         echo $student->name . '</br>';
        //     }
        // });
        // return $students;

        // USING RAW SQL QUERY---------------------
        // $students = DB::select('select * from students where id = ?', [5]);
        // $students = DB::table('students')
        //     ->selectRaw('count(*) as count_total, age')
        // ->select(DB::raw('count(*) as count_total'), 'age')
        // ->whereRaw('id = ?', 5)
        // ->orderBy('age')
        // ->orderByRaw('age')
        // ->toSql();
        // ->get();
        // return $students;

        // $students = DB::table('students')
        //     ->selectRaw('count(*) as count_total, age')
        //     ->havingRaw('age > ?', [25])
        //     ->groupByRaw('age')
        //     ->groupBy('age')
        //     ->toSql();
        //     ->get();
        // return $students;

        // $students = DB::select('insert into students (name, email, age, city) values (?, ?, ?, ?)', ['sk', 'sk@gmail.com', 24, 'Rajkot']);
        // return $students;

        // $students = DB::select('update students set name = "krunal" where id = ?', [11]);
        // return $students;

        // $students = DB::select('delete from students where id = ?', [11]);
        // return $students;

        return view('home', ['data' => $students]);
    }

    public function addOrUpdateUser(string $id = null)
    {
        $student = DB::table('students')->find($id);
        return view('save', ['data' => $student ?? null]);
    }

    public function deleteUser(string $id = null)
    {
        $student = DB::table('students')->where('id', $id)->delete();
        return $student ? redirect()->route('home') : null;
    }

    public function saveUser(StudentRequest $request, string $id = null)
    {
        $data = [
            'name' => $request->student_name,
            'email' => $request->student_email,
            'age' => $request->student_age,
            'city' => $request->student_city,
        ];

        $student = DB::table('students')->upsert(
            [$data], // Values to insert/update
            ['id'], // The unique key to check for update
            ['name', 'email', 'age', 'city'] // Columns to update
        );

        if ($student) {
            return redirect()->route('home')->with('success', 'User data saved successfully');
        } else {
            return 'Error saving data';
        }
    }

    //OLD METHOD 

    // public function addUser(StudentRequest $request)
    // {
    //     $student = DB::table('students')->insert(
    //         [
    //             'name' => $request->student_name,
    //             'email' => $request->student_email,
    //             'age' => $request->student_age,
    //             'city' => $request->student_city,
    //         ]
    //     );

    //     if ($student) {
    //         return redirect()->route('home');
    //     } else {
    //         return 'Data Not Found';
    //     }
    // }

    // public function updateUserData(StudentRequest $request, string $id)
    // {
    //     $student = DB::table('students')
    //         ->where('id', $id)
    //         ->update(
    //             [
    //                 'name' => $request->student_name,
    //                 'email' => $request->student_email,
    //                 'age' => $request->student_age,
    //                 'city' => $request->student_city,
    //             ]
    //         );

    //     if ($student) {
    //         return redirect()->route('home');
    //     } else {
    //         return 'User Data not Updated';
    //     }
    // }
}
