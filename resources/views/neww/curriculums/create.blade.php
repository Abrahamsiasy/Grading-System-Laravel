@extends('layouts.app')
@section('content')
<div class="container-fluid mt--7">

    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-body">
                    <h2>Add Curriculum</h2>
                    <hr>
                    <form id="form-post" method="POST" action="/newcurriculum">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="curriculum_id">Curriculum ID</label>
                                <input id="curriculum_id" name="curriculum_id" class="form-control mb-3" type="text" placeholder="e.g. 2021" required>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="department_name">Department Name</label>
                                <input id="department_name" name="department_name" class="form-control mb-3" type="text" placeholder="e.g. Software ENgnerring" required>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="effective_year">Effective Year.</label>
                                <input id="effective_year" name="effective_year" class="form-control mb-3" type="text" placeholder="e.g. 2021-2022" required>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12 col-lg-12">
                                <button type="submit" class="btn btn-outline-info">
                                    <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                    <span class="btn-inner--text">Add Curriculum</span>
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