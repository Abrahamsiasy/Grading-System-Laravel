@extends('layouts.app')
@section('content')

<div class="container-fluid mt--7">
  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">

        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Class List</h3>
            </div>
          </div>
        </div>
      </div>
      @if(count($classes) > 0)
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col"></th>
              <th scope="col" class="text-center">Class</th>
              <th scope="col">Description</th>
              <th scope="col" class="text-center">Instructor</th>
              <th scope="col" class="text-center">Cariculem and department</th>
              
              <th scope="col" class="text-center">Total Students</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($classes as $class)
            <tr>
              <td class="text-left" scope="row">
                <a href="/newgrade/{{ $class->class_id }}" class="btn btn-outline-primary btn-sm">
                  View
                </a>
              </td>
              <td class="text-center">
                {{ $class->course_code }}
                {{ $class->section }}
              </td>
              <td> {{ $class->course->description }}</td>
              <td>
               {{ $class->instructor->getEmployeeNo()}}
                  
              </td>
              <td>{{ $class->curriculum->department_name }}. {{ $class->curriculum->curriculum_id }}</td>
              <td class="text-center">
                {{ $class->getTotalStudents() }}
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <div class="row border-1 mt-3 mb-5">
        <div class="col text-center">
          <p class="lead">No Class found</p>

        </div>
      </div>
      @endif
    </div>
  </div>
</div>

</div>
@endsection