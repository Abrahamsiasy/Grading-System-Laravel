@extends('layouts.app')
@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Students</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/students" class="btn btn-sm btn-outline-secondary">
                                Back to list
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-post" method="POST" action="/newstudent" autocomplete="on">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">
                            Student information
                        </h6>
                        <div class="pl-lg-4 row">
                            <div class="form-group col-lg-4">
                                <label class="form-control-label" for="student_no">Student No.</label>
                                <input type="text" name="student_no" id="student_no" class="input-mask form-control form-control-alternative" placeholder="e.g. STU001" value="{{ old('student_no') }}" required autofocus>
                            </div>
                        </div>
                        <div class="pl-lg-4 row">
                            <div class="col-12 col-lg-4 col-md-6">
                                <label class="form-control-label" for="acad_term_admitted_id">Academic Term Admitted</label>
                                <select id="acad_term_admitted_id" name="acad_term_admitted_id" class="select2 form-control m-b" required>
                                    @foreach ($acad_terms as $acad_term)
                                    @if($acad_term->acad_term_id == $cur_acad_term)
                                    <option value="{{ $acad_term->acad_term_id }}" selected>
                                        {{ $acad_term->getAcadTerm() }}
                                    </option>
                                    @else
                                    <option value="{{ $acad_term->acad_term_id }}">
                                        {{ $acad_term->getAcadTerm() }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6">
                                <label class="form-control-label" for="curriculum_id">Curriculum</label>
                                <select id="curriculum_id" name="curriculum_id" class="select2 form-control m-b" required>
                                    @foreach ($curriculums as $curriculum)
                                    @if($curriculum->curriculum_id == $cur_curriculum_id)
                                    <option value="{{ $curriculum->curriculum_id }}" selected>
                                        {{ $curriculum->curriculum_id }}
                                    </option>
                                    @else
                                    <option value="{{ $curriculum->curriculum_id }}">
                                        {{ $curriculum->curriculum_id }}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="pl-lg-4 row mt-4">
                            <div class="form-group col row">
                                <div class="ml-3 form-control-label pt-1">
                                    Student Type
                                </div>
                                <div class="ml-3 custom-control custom-radio mb-3">
                                    <input name="student_type" class="custom-control-input" id="student_type1" type="radio" value="1" {{ old('student_type') == null ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="student_type1">Regular</label>
                                </div>
                                <div class="ml-3 custom-control custom-radio mb-3">
                                    <input name="student_type" class="custom-control-input" id="student_type2" type="radio" value="2" {{ old('student_type') == 'Transferee' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="student_type2">Extension</label>
                                </div>
                            </div>
                        </div>

                        <h6 class="heading-small text-muted mb-4 mt-3">
                            Personal information
                        </h6>
                        <div class="pl-lg-4 row">
                            <div class="form-group col-lg-4">
                                <label class="form-control-label" for="first_name">Student Name</label>
                                <input type="text" name="name" id="first_name" class="form-control form-control-alternative" placeholder="e.g. ababa" value="{{ old('name') }}" required>
                            </div>

                        </div>

                        <h6 class="heading-small text-muted mb-4 mt-3">
                            Account information
                        </h6>
                        <div class="pl-lg-4 row">
                            <div class="form-group col col-lg-6">
                                <label class="form-control-label" for="input-email">Email</label>
                                <input type="text" name="email" id="input-email" class="form-control form-control-alternative" placeholder="e.g. ababa@gmail.com" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="pl-lg-4 row mt-4">
                            <div class="col">
                                <button id="btnSubmit" type="submit" class="btn btn-success">
                                    Add Student
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