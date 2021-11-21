@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">Dashboard <span class="float-right"> <a class="btn btn-secondary" href="/student/create"> Create student</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if (count($students))
                        <table class="table table-striped ">
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Gender</th>
                            </tr>
                            
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->full_name}}</td>
                                    <td>{{$student->address}}</td>
                                    <td>{{$student->sex}}</td>

                                </tr>
                            @endforeach
                        </table>
                    @else 
                        <h1>YOu dont haev any students yet</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
