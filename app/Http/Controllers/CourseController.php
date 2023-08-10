<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
   
    public function index()
    {
        $studentId = Auth::user()->studentId; //Retrieve the currently logged-in student's ID using the Auth facade.
        $availableCourses = Course::all();
        $courseCount = User::find($studentId)->courses()->count();//Counts courses particular to logged in user using User Model and find()method
        $user = User::with('courses')->find($studentId);
        //Retrieve the user with their enrolled courses using Eloquent's with() method to eager 
        //load the courses relationship and find() to retrieve the user by their ID.
        return view('course', 
    [
        'courseCount' => $courseCount,
        'user' => $user,
        'availableCourses' => $availableCourses
    ]);
    }

    public function enroll(Request $request)
    {
        $studentId = Auth::user()->studentId;
        $coursesToEnroll = $request->input('courses', []);
        $user = User::with('courses')->find($studentId);
        $alreadyEnrolled = $user->courses->pluck('courseId')->intersect($coursesToEnroll);
        if ($alreadyEnrolled->count() > 0) {
            $courseTitles = Course::whereIn('courseId', $alreadyEnrolled)->pluck('courseTitle')->implode(', ');
            return redirect()->route('course')->with('error', "You are already enrolled in the following courses: $courseTitles.");
        }
        $user->courses()->syncWithoutDetaching($coursesToEnroll);
        

        return redirect()->route('course')->with('success', 'Enrollment successful.');
    }
    
    
 

}
