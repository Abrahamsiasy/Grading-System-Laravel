@extends('layouts.app')
@section('content')

<div class="container-fluid mt--7">

    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-10">
                            <h3 class="mb-0">Student Name - {{Auth::user()->student->getStudentNo()}}</h3>
                        </div>
                    </div>
                </div>

                @if(count($students) > 0)
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">Student No</th>
                                <th scope="col">Name</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @role('student')
                            @foreach ($students as $student)
                            <tr>
                            

                                <td class="text-right" scope="row">
                                <!-- $student->curriculum_id   $student->user->id-->
                                    <a href="/newstudent/{{$student->curriculum_id}}/{{$student->student_no }}" class="btn btn-outline-primary btn-sm">
                                        View
                                    </a>
                                </td>
                                <td class="text-center">
                                    {{$student->getStudentNo()}}
                                </td>
                                <td> {{$student->user->getName()}} </td>
                            </tr>
                            @endforeach
                        @endrole
                        
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection