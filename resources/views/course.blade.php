<x-app-layout>

            <div class="container-fluid">
                {{-- @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif --}}
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Courses</h1>
                </div>

                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            course</div>
                                           
                                                
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$courseCount}}</div>
                                        
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">List Of Registered Courses</h1>
                    <a href="#" class="d-sm-inline btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#courseModal"><i
                            class="fas fa-add fa-sm text-white-50"></i>Add New Course</a>
                </div>
                {{-- <div class="row">
                    @foreach($user->courses as $index =>  $item)
                 <div class="col-lg-12">

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="false" aria-controls="collapseOne">
                              {{$item->courseTitle}}
                            </button>
                          </h2>
                          <div id="collapse{{$index}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>{{$item->courseDesc}}</strong>
                            </div>
                          </div>
                        </div>
                        
                      </div>

                    </div>
                    @endforeach

                </div> --}}
              
                
                    {{-- <div id="enrolled-courses">
                        <h3>Enrolled Courses:</h3>
                        <ul>
                            @foreach ($user->courses as $item)
                                <li>
                                    {{ $item->courseTitle }}
                                    <button class="btn btn-danger btn-sm remove-course" data-course-id="{{ $item->courseId }}">Remove</button>
                                </li>
                            @endforeach
                        </ul>
                 
                    <div id="enroll-message"></div>
                    </div> --}}
         
                

                <div class="card shadow mt-4 mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table of Courses</h6>
                        </div>
                        <div class="card-body">

                            <div id="enrolled-courses" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  
                                    <thead>
                                        <tr>
                                            <th>Name </th>
                                            <th>Description</th>
                                            <th>Course Code</th>
                                            <th>Schedule</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                  
    
                                   
                                    <tbody>
                                        @foreach ($user->courses as $item)
                                        <tr>
                                            <td>{{$item->courseTitle}}</td>
                                            <td>{{$item->courseDesc}}</td>
                                            <td>{{$item->courseCode}}</td>
                                            <td>{{$item->courseSchedule}}</td>
                                            <td>{{$item->courseProg}}%</td>
                                            <td>
                    <button class="btn btn-danger btn-sm remove-course" data-course-id="{{$item->courseId}}">Remove</button>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                        <div id="enroll-message"></div>
                                    </tbody>
    
              
                                </table>
                            </div>
                        </div>
                    </div>
                 
            </div>
            <!-- /.container-fluid -->

       
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
        <div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Course</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="enroll-form">
                    <div class="modal-body">
                       
                        <form method="post" action="{{ route('enroll') }}">
                            @csrf
                    
                            <label for="courses">Select Courses:</label>
                            <select class="form-select"name="courses[]"  id="courses"   aria-label="Default select example">
                                <option selected>Select Course</option>
                                @foreach ($availableCourses as $course)
                                    <option value="{{ $course->courseId }}">{{ $course->courseTitle }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary text-black" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary text-black" type="submit">Enroll</button>
                        
                    </div>
                </form>
                    
                    <div class="card-footer">
                        <div id="enroll-messages"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
    <!-- End of Content Wrapper -->

</x-app-layout>
