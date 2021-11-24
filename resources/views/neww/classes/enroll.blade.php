@extends('layouts.app')


@section('content')

<div class="container-fluid mt--7">

  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-body row align-items-center">
          <div class="col">
            <h2 class="mb-0">
              {{ $class->getCourse() }}
            </h2>

            <hr class="my-4" />

            <dl class="row text-sm">
              <dt class="col-sm-5">
                Academic Term:
              </dt>
              <dd class="col-sm-7">
                {{ $class->acadTerm->getAcadTerm() }}
              </dd>

              <dt class="col-sm-5">
                Department:
              </dt>
              <dd class="col-sm-7">
                {{$class->curriculum->department_name }}
              </dd>


              <dt class="col-sm-5">
                Instructor:
              </dt>
              <dd class="col-sm-7">
                {{ $class->instructor->user->getName() }}
              </dd>
              <dt class="col-sm-5">
                Credits:
              </dt>
              <dd class="col-sm-7">
                {{ $class->course->getCredits() }}
              </dd>
            </dl>

            <hr class="my-4" />

            <div class="row">
              <div class="col">
                <a href="/newclass/{{ $class->class_id }}" class="btn btn-outline-secondary btn-sm">
                  Return
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  @if(count($students) > 0)
  <div class="row mt-3">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">

        <div class="card-header border-0">
          <div class="row">
            <div class="col">
              <h3 class="mb-0">Enroll Students to class {{ $class->course_code }}</h3>
            </div>

            <div class="col">
              <form action="/newclass/enroll_students/{{ $class->class_id }}?" method="get" class="form-horizontal">
                <div class="form-group mb-0">
                  <div class="input-group input-group-sm pt-0">
                    <input name="search" class="form-control" type="text">
                    <div class="input-group-append">
                      <button class="btn btn-outline-default" type="submit">Search</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        @if(count($students) == 0)
        <div class="row mt-3 mb-5">
          <div class="col text-center">
            <p class="lead">Student not found</p>
          </div>
        </div>
        @endif

        @if(count($students) > 0)
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col"></th>
                <th scope="col">Credited Curriculum</th>
                <th scope="col">Student No</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Curriculum ID</th>
                <th scope="col" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
              <form id="form" method="post" action="/newclass/enroll_students">
                @csrf
                <tr>
                  <td class="text-center" scope="row">
                    <input id="student_no" name="student_no" type="text" value="{{ $student->student_no }}" style="display:none;" required>
                    <input id="class_id" name="class_id" type="text" value="{{ $class->class_id }}" style="display:none;" required>
                  </td>
                  <td>

                    <select name="curriculum_details_id" class="custom-select" required>
                      @foreach ($student->curriculum->curriculumDetails as $curriculum_details)
                      <!-- Set course in curriculum to selected if the same with course in class -->
                      @if($class->course_code == $curriculum_details->course_code)
                      <option value="{{ $curriculum_details->curriculum_details_id }}" selected>
                        {{ $curriculum_details->course->getCourse() }}
                      </option>
                      @endif
                      @endforeach
                    </select>
                  </td>
                  <td>
                    <a href="/newstudent/{{ $student->user->id }}">
                      {{ $student->getStudentNo() }}
                    </a>
                  </td>
                  <td>{{ $student->user->getName() }}</td>
                  <td class="text-center">{{ $student->curriculum_id }}</td>

                  <td class="text-center" scope="row">
                    <button type="submit" class="btn btn-outline-primary btn-sm">
                      Enroll
                    </button>
                  </td>
                </tr>

              </form>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          {{ $students->links() }}
        </div>
        @endif
      </div>
    </div>
  </div>
  @else
  <div class="row mt-2">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-body row mt-3 mb-5">
          <div class="col text-center">
            <p class="lead">No Students found</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

</div>
@endsection