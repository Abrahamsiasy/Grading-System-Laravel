@extends('layouts.app')

@section('content')

<div class="container-fluid mt--7">

  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-body">
          <h2>Add Course</h2>
          <hr>
          <form id="form-post" method="POST" action="/newcourse">
            @csrf

            <div class="row">
              <div class="col-12 col-lg-3 col-md-6">
                <label class="form-control-label" for="course_code">Course Code</label>
                <input id="course_code" name="course_code" class="form-control mb-3" type="text" placeholder="e.g. Wbe Programming I" required>
              </div>

            </div>

            <div class="row">
              <div class="col-12 col-lg-6 col-md-12">
                <label class="form-control-label" for="description">Description</label>
                <input id="description" name="description" class="form-control mb-3" type="text" placeholder="e.g. Web Development" required>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-lg-3 col-md-6">
                <label class="form-control-label" for="units">Chredit Hours</label>
                <input id="ch" name="ch" class="form-control mb-3" type="number" placeholder="e.g. 3" min="1" required>
              </div>
              <div class="col-12 col-lg-3 col-md-6">
                <label class="form-control-label" for="lab_units">ECTS </label>
                <input id="ects" name="ects" class="form-control mb-3" type="number" min="3" placeholder="e.g. 6">
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-12 col-lg-12">
                <button type="submit" class="btn btn-outline-info">
                  <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                  <span class="btn-inner--text">Add Course</span>
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