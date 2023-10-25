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
    
 
     public function index()
{
    // Retrieve the student's ID from the currently authenticated user
    $studentId = Auth::user()->studentId;

    // Retrieve the student's course data and order them by the day of the week
    // This code orders courses by day with Monday first, Tuesday second, and so on
    $courseDate = User::find($studentId)
        ->courses()
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

    // Count the number of lecturers in the database
    $lecturer = DB::table('lecturers')->count();

    // Count the total number of students in the database
    $allStudents = DB::table('users')->count();

    // Count the number of courses that the student is enrolled in
    $courseCount = User::find($studentId)->courses()->count();

    // Retrieve the user data along with their associated courses
    $usersd = User::with('courses')->find($studentId);

    // Pass the collected data to the 'dashboard' view
    return view('dashboard', [
        'user' => $usersd,
        'lecturer' => $lecturer,
        'student' => $allStudents,
        'courseCCount' => $courseCount,
        'courseDate' => $courseDate
    ]);
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
