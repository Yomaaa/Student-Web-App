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
        // Retrieve the currently logged-in student's ID using the Auth facade.
        $studentId = Auth::user()->studentId;
        // Retrieve a list of all available courses.
        $availableCourses = Course::all();
        // Count the number of courses that the student is enrolled in.
        $courseCount = User::find($studentId)->courses()->count();
        // Retrieve the user with their enrolled courses using Eloquent's eager loading.
        $user = User::with('courses')->find($studentId);
        // Pass the collected data to the 'course' view.
        return view('course', [
            'courseCount' => $courseCount,
            'user' => $user,
            'availableCourses' => $availableCourses
        ]);
    }
    public function enroll(Request $request)
{
    // Retrieve the currently logged-in student's ID using the Auth facade.
    $studentId = Auth::user()->studentId;
    // Retrieve an array of courses to enroll in from the request.
    $coursesToEnroll = $request->input('courses', []);
    // Retrieve the user with their enrolled courses using Eloquent's eager loading.
    $user = User::with('courses')->find($studentId);
    // Check if any of the selected courses are already enrolled.
    // If so, return an error response.
    $alreadyEnrolled = $user->courses->pluck('courseId')->intersect($coursesToEnroll);
    if ($alreadyEnrolled->count() > 0) {
        $courseTitles = Course::whereIn('courseId', $alreadyEnrolled)->pluck('courseTitle')->implode(', ');
        return response()->json(['error' => "You are already enrolled in the following course(s): $courseTitles."], 422);
    }
    // Enroll the student in the selected courses without duplicating existing enrollments.
    $user->courses()->syncWithoutDetaching($coursesToEnroll);
    // Return a success response.
    return response()->json(['success' => 'Enrollment successful.']);
}
public function loadOnlyCourses()
{
    // Same code as `index()`, retrieves a user and their enrolled courses.
    $studentId = Auth::user()->studentId;
    $user = User::with('courses')->find($studentId);
    // Pass the collected data to the 'course-only' view.
    return view('course-only', [
        'user' => $user,
    ]);
}
public function removeCourse(Request $request)
{
    // Retrieve the currently logged-in student's ID using the Auth facade.
    $studentId = Auth::user()->studentId;
    // Retrieve the course ID to be removed from the request.
    $courseId = $request->input('courseId');
    // Retrieve the user.
    $user = User::find($studentId);
    // Detach (remove) the specified course from the student's enrolled courses.
    $user->courses()->detach($courseId);
    // Return a success response.
    return response()->json(['success' => 'Course removed successfully.']);
}

    

 

}
