@extends('layouts.app')
@section('content')
<div class="container-fluid mt--7">
  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
            <h2 class="mb-0">
                </h2>
              <h3 class="mb-0">Students Enrolled</h3>

              <!-- Class Information Tab -->
              <dl class="row text-sm">
                  <dt class="col-sm-5">
                    Academic Term:
                  </dt>
                  <dd class="col-sm-7">
                    {{ $class->acadTerm->getAcadTerm() }}

                  </dd>

                  <dd>
                  </dd>
                  <dt class="col-sm-5">
                     Department:
                  </dt>
                  <dd class="col-sm-7">
                  {{$class->curriculum->department_name }}

                  </dd>

                  <dd>
                  </dd>
                  
                  <dt class="col-sm-5">
                    Instructor:
                  </dt>
                  <dd class="col-sm-7">
                    {{ $class->instructor->getEmployeeNo() }}
                  </dd>
                  @if($class->section != null)
                  <dt class="col-sm-5">
                    Section:
                  </dt>
                  <dd class="col-sm-7">
                    {{ $class->section }}
                  </dd>
                  @endif
                  <dt class="col-sm-5">
                    Credits:
                  </dt>
                  <dd class="col-sm-7">
                    {{ $class->course->getCredits() }}
                  </dd>
                  @if($class->room != null)
                  <dt class="col-sm-5">
                    Room:
                  </dt>
                  <dd class="col-sm-7">
                    {{ $class->room }}
                  </dd>
                  @endif
                </dl>
                <!-- end Class Information Tab -->
              
            </div>
          </div>
        </div>
        <!--    table  -->
        @if(count($grades) > 0)
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>

                <th scope="col" class="text-center">Course Given</th>
                <th scope="col"></th>
              </tr>
            </thead>
            @foreach ($grades as $grade)
            <tbody>
              <tr>
                <td scope="row">
                 {{$grade->student->getStudentNo()}}
                </td>
                <td>
                 {{$grade->student->user->getName()}} 
                </td>
                <td class="text-center">
                {{$grade->curriculumDetails->course->course_code}}
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
        @endif
        <div class="row mt-3 mb-5">
          <div class="col text-center">
            <div class="col">
              <a href="/newclass/enroll_students/{{ $class->class_id}}" class="btn btn-lg btn-primary">
                Enroll Student
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection