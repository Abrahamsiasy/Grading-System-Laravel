@extends('layouts.app')
@section('content')

<div class="container-fluid mt--7">

  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-body">
          <h2>Add Course to Curriculum</h2>
          <hr>
          <form id="form-post" method="POST" action="/newcurriculum_detail">
            @csrf 
            <!-- @method('PUT') -->

            <div class="row">
              <div class="col-12 col-lg-3 col-md-6">
                <label class="form-control-label" for="curriculum_id">Curriculum ID</label>
                <input class="form-control mb-3" type="text" value="{{ $curriculum->curriculum_id }}" disabled>
                <input id="curriculum_id" name="curriculum_id" type="text" value="{{ $curriculum->curriculum_id }}" style="display: none">
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-lg-3 col-md-6">
                <label class="form-control-label" for="year">School Year</label>
                <select id="year" name="year" class="form-control m-b" required>
                  <option value="1" selected>First Year</option>
                  <option value="2">Second Year</option>
                  <option value="3">Third Year</option>
                  <option value="4">Fourth Year</option>
                  <option value="5">Fifth Year</option>
                  <option value="6">Sith Year</option>
                </select>
              </div>
              <div class="col-12 col-lg-3 col-md-6">
                <label class="form-control-label" for="semester">Semester</label>
                <select id="semester" name="semester" class="form-control m-b" required>
                  <option value="1" selected>First Semester</option>
                  <option value="2">Second Semester</option>
                  <option value="3">Third Semester</option>
                  <option value="4">Summer</option>
                </select>
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-12 col-md-6">
                <label class="form-control-label" for="course_code">Course</label>
                <select id="course_code" name="course_code" class="select2 form-control m-b" required>
                  @foreach ($courses as $course)
                  <option value="{{ $course->course_code }}">{{ $course->getCourse() }} | {{ $course->getCredits() }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-12 col-lg-12">
                <button type="submit" class="btn btn-primary">Add Course to Curriculum</span>
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