@extends('layouts.app')
@section('content')

<div class="container-fluid mt--7">

  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Add Class</h3>
            </div>
            <div class="col-4 text-right">
              <a href="/newclass" class="btn btn-sm btn-outline-secondary">
                Back to list
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form id="form-post" method="POST" action="/newclass" autocomplete="off">
          @csrf

            <div class="pl-lg-4 row">
              <div class="col-12 col-lg-4 col-md-6">
                <label class="form-control-label" for="acad_term_id">Academic Term</label>
                <select id="acad_term_id" name="acad_term_id" class="select2 form-control m-b" required>
                  @foreach ($acad_terms as $acad_term)
                  <option value="{{$acad_term->acad_term_id}}">
                    {{$acad_term->getAcadTerm()}}
                    @endforeach
                </select>
              </div>

              <div class="col-12 col-lg-4 col-md-6">
                <label class="form-control-label" for="acad_term_id">Department </label>
                <select id="acad_term_id" name="department_name" class="select2 form-control m-b" required>
                  @foreach ($departments as $department)
                  <option value="{{$acad_term->acad_term_id}}">
                    {{$department->department_name}}
                    @endforeach
                </select>
              </div>
            </div>

            <h6 class="heading-small text-muted my-4">
              Class Information
            </h6>
            <div class="pl-lg-4 row">
              <div class="col-12 col-md-10">
                <label class="form-control-label" for="course_code">Course</label>
                <select id="course_code" name="course_code" class="select2 form-control m-b" required>
                  @foreach ($courses as $course)
                  <option value="{{ $course->course_code }}">{{ $course->getCourse() }} | {{ $course->getCredits() }}</option>
                  @endforeach
                </select>

              </div>
            </div>
            <div class="pl-lg-4 row mt-3">
              <div class="col-12 col-lg-4 col-md-6">
                <label class="form-control-label" for="instructor_id">Instructor</label>
                <select id="instructor_id" name="instructor_id" class="select2 form-control  m-b">
                  @foreach ($instructors as $instructor)
                  <option value="{{ $instructor->employee_no }}">
                    {{ $instructor->employee_no }}
                  </option>
                  @endforeach
                </select>
                <label class="form-control-label" for="section">
                  Section (optional)
                </label>
                <input type="text" name="section" id="section" class="form-control form-control-alternative" placeholder="e.g. A" value="{{ old('section') }}">
                <label class="form-control-label" for="room">
                  Room (optional)
                </label>
                <input type="text" name="room" id="room" class="form-control form-control-alternative" placeholder="e.g. A" value="{{ old('room') }}">

              </div>


              <div class="pl-lg-4 row mt-4">
                <div class="col">
                  <button id="btnSubmit" type="submit" class="btn btn-success">
                    Add Class
                  </button>
                  <button type="button" class="btn btn-outline-secondary" onclick="javascript:history.back()">Cancel</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection