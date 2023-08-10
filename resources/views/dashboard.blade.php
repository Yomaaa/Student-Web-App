<x-app-layout>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Number of courses for the semester</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$courseCount}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Lecturers</div>
                                            
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$lecturer}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Number of Students
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $student}}</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                
                </div>

                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-12 mb-4">

                        <!-- Project Card Example -->
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Weekly Timetable</h6>
                            </div>
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Course</th>
                                                <th>Time</th>
                                               
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Day</th>
                                                <th>Course</th>
                                                <th>Time</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($courseDate as $item)
                                            <tr>
                                                
                                                <td>{{$item->courseSchedule}}</td>
                                                <td>{{$item->courseTitle}}</td>
                                                <td>08:00am - 02:00pm</td>
                                            </tr>
                                            
                                            @endforeach
                                          
                                            {{-- <tr>
                                                <td>Tuesday</td>
                                                <td>Junior Technical Author</td>
                                                <td>08:00am - 10:00am</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Junior Technical Author</td>
                                                <td>10:00am - 11:00am</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Junior Technical Author</td>
                                                <td>01:00pm - 03:00pm</td>
                                            </tr>
                                            <tr>
                                                <td>Wednesday</td>
                                                <td>System Architecture</td>
                                                <td>08:00am - 02:00pm</td>
                                               
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Accounting</td>
                                                <td>02:00pm - 03:00pm</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Thursday</td>
                                                <td>System Architecture</td>
                                                <td>08:00am - 02:00pm</td>
                                               
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Accounting</td>
                                                <td>02:00pm - 03:00pm</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Friday</td>
                                                <td>System Architecture</td>
                                                <td>08:00am - 02:00pm</td>
                                               
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Accounting</td>
                                                <td>02:00pm - 03:00pm</td>
                                                
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                     

                    </div>
                        </div>
                        </div>
                </div>
                <!-- Content Row -->
               
          
            
           
                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-6 mb-4">

                        <!-- Project Card Example -->
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Courses For The Semester</h6>
                            </div>
                            <div class="card-body">
                               @foreach($user->courses as $item)

                                <h4 class="small font-weight-bold">{{$item->courseTitle}}<span
                                        class="float-right">{{$item->courseProg}}%</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$item->courseProg}}%"
                                        aria-valuenow="{{$item->courseProg}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                @endforeach
                             
                            </div>
                        </div>

                     

                    </div>

                    <div class="col-lg-6 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Assignments</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="images/undraw_posting_photo.svg" alt="...">
                                </div>
                                @foreach($user->courses as $item)

                                <h4 class="mb-4 font-weight-bold">{{$item->courseTitle}}<span
                                        class="float-right"><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a></span></h4>
                                
                                @endforeach
                            </div>
                        </div>

                  

                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy;</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->


<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->


</x-app-layout>
