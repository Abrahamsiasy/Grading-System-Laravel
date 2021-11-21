@extends('layouts.app')
@section('content')

<div class="container-fluid mt--7">

  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-body row align-items-center">
          <div class="col">
            @if(count($grades))


            <div class="card-body">
              <div class="h3"> Class Information</div>
              <div class="">

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

                <!-- Students' Grades Tab -->


                @if(count($grades) > 0)
                <div class="container-fluid row">
                  <table class="table align-items-center">
                    <thead class="thead-light">
                      <tr>

                        <th scope="col" class="text-center">Student No.</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Others</th>
                        <th scope="col" class="text-center">Midterms</th>
                        <th scope="col" class="text-center">Finals</th>
                        <th scope="col" class="text-center">Total Score</th>
                        <th scope="col" class="text-center">Grade</th>

                      </tr>
                    </thead>
                    @foreach ($grades as $grade)
                    <tbody>
                      <td class="text-center" scope="row">
                        {{ $grade->student->getStudentNo() }}
                      </td>
                      <td>{{ $grade->student->user->getName() }}</td>
                      <td class="text-center">{{ $grade->others }}</td>
                      <td class="text-center">{{ $grade->midterms }}</td>
                      <td class="text-center">{{ $grade->finals }}</td>
                      <td class="text-center">{{ $grade->getTotalScore() }}</td>
                      <td class="text-center">{{ $grade->getGrade() }}</td>
                    </tbody>
                    @endforeach
                  </table>
                </div>
                @endif
                <!-- end Students' Grades Tab -->


              </div>
            </div>
          </div>
          @else
          <div class="row mt-2">
            <div class="col-xl-12 mb-5 mb-xl-0">
              <div class="card shadow">
                <div class="card-body row mt-3 mb-5">
                  <div class="col text-center">
                    <p class="lead">No Students Enrolled</p>
                    <br>
                    <a href="/newgrade" class="btn btn-primary btn-lg">Return</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>

    </div>
    @endsection