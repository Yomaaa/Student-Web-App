<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
 
     public function index(){
        $studentId = Auth::user()->studentId;
        
        //  $course = DB::table('courses')
        //  ->get();
        //  $countCourse = DB::table('courses')->count();
         $courseDate = User::find($studentId)->courses()
         ->orderByRaw("
         CASE
             WHEN courseSchedule = 'Monday' THEN 1
             WHEN courseSchedule = 'Tuesday' THEN 2
             WHEN courseSchedule = 'Wednesday' THEN 3
             WHEN courseSchedule = 'Thursday' THEN 4
             WHEN courseSchedule = 'Friday' THEN 5
             WHEN courseSchedule = 'Saturday' THEN 6
             WHEN courseSchedule = 'Sunday' THEN 7
             ELSE 8
         END")
         ->get();
         $lecturer = DB::table('lecturers')->count();
         $allStudents = DB::table('users')->count();
         $courseCount = User::find($studentId)->courses()->count();
         $usersd = User::with('courses')->find($studentId);
         return view('dashboard', 
         [
            'user' => $usersd,
            // 'course' => $course,
            'lecturer' => $lecturer, 
            'student'=> $allStudents, 
            'courseCount' => $courseCount,
            'courseDate' => $courseDate

         ]
         
         
     );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
