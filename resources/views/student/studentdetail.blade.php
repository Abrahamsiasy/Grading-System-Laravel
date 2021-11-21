@extends('layouts.app')

@section('content')
<div>
    <h1>Grade Report </h1>
    <h3>student name and Department</h3>
    <!-- post card -->
    <div class="row">
    @foreach ($smester as $smesters)
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> Academic Year : {{$smesters->year}}, Year I, Semester : {{$smesters->semester}}</h5>
                    <table class="table table-striped card-text">
                        <tr>
                            <th>No.</th>
                            <th>Course Title</th>
                            <th>Code</th>
                            <th>Credit Hour</th>
                            <th>ESTS</th>
                            <th>Grade</th>
                        </tr>
                        <!-- $data = array(); -->

                        @foreach ($student as $students)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$students->course_name}}</td>
                            <td>{{$students->corsecode}}</td>
                            <td>{{$students->credithour}}</td>
                            <td>{{$students->ests}}</td>
                            <td id="gradess">{{$students->grade->grade}}
                                
                            </td>


                            </td>
                            @endforeach
                        </tr>
                    </table>

                </div>
                <div class="card-body">

                    <p>Semistor total ECTS {{$ects}}


                    </p>
                    <p>Semistor total CH {{$ch}}</p>
                    @if ($ects !=0)
                    <h4>CGPA {{round($calcualtedGPA / $ects, 2)}}</h4>
                    @endif
                    <p>cgpa {{$calcualtedGPA}}</p>
                    <p>GPA</p>
                    <div class="h6 card-subtitle text-right text-muted">
                        semister {{$loop->iteration}}
                    </div>
                </div>

            </div>
        </div>


        @endforeach


</div>


@endsection