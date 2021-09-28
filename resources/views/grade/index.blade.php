@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if (count($gradelist))
                        <table class="table table-striped ">
                            <tr>
                                <th>Student Name</th>
                                <th>Course Name</th>
                                <th>Instractor Name</th>
                                <th>Mark</th>
                                <th>Grade</th>
                                <th>Status</th>
                            </tr>
                            
                            @foreach ($gradelist as $gradelists)
                                <tr>
                                    <td>{{$gradelists->student ->full_name}}</td>
                                    <td>{{$gradelists->course->course_name}}</td>
                                    <td>{{$gradelists->instractor->full_name }}</td>
                                    <td>{{$gradelists->mark}}</td>
                                    <td>{{$gradelists->	grade}}</td>
                                    @if ($gradelists->	status == 1)
                                        <td>Pass</td>
                                    @else
                                        <td>Fail</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    @else 
                        <h1>You have no students yet</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
