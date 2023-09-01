<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Yoma') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css"href="{{asset('fontawesome-free/css/all.min.css')}}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div  class="min-h-screen bg-gray-100">
            
            @include('layouts.navigation')
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div id="wrapper">
                    @include('layouts.header')
                {{ $slot }}
                    @include('inc.modal')
                </div>
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        
    {{-- <script>
        $(document).ready(function() {
            $('#enroll-form form').submit(function(e) {
                e.preventDefault();
    
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#enroll-messages').html('<div class="alert alert-success">' + response.success + '</div>');
                    location.reload()
                    },
                    error: function(response) {
                        $('#enroll-messages').html('<div class="alert alert-danger">' + response.responseJSON.error + '</div>');
                    }
                });
            });
        });
    </script>
     --}}
     <script>
        $(document).ready(function() {
            $('#enroll-form form').submit(function(e) {
                e.preventDefault();
    
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#enroll-messages').html('<div class="alert alert-success">' + response.success + '</div>');
                        refreshTable();
                    },
                    error: function(response) {
                        $('#enroll-messages').html('<div class="alert alert-danger">' + response.responseJSON.error + '</div>');
                    }
                });
            });
        });
    
        function refreshTable() {
            $("#dataTable").load("{{route('course-api')}}");
        }
    </script>
     <script>
        $(document).ready(function() {
            $('#enrolled-courses').on('click', '.remove-course', function() {
                var courseId = $(this).data('course-id');
                // var removeButton = $(this);
    
                $.ajax({
                    type: 'POST',
                    url: '{{ route("remove-course") }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        courseId: courseId
                    },
                    success: function(response) {
                        $('#enroll-message').html('<div class="alert alert-success">' + response.success + '</div>');
                      
                        location.reload()
                    },
                    error: function(response) {
                        $('#enroll-message').html('<div class="alert alert-danger">' + response.responseJSON.error + '</div>');
                    }
                });
            });
        });
    </script>
    
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

        

    </body>
</html>
