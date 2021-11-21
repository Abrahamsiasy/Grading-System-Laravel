@extends('layouts.app')
@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Academic Term</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/acad_terms" class="btn btn-sm btn-outline-secondary">
                                Back to list
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-post" method="POST" action="/newacad_term" >
                        @csrf
                        <div class="pl-lg-4 row">
                            <div class="form-group col-lg-4">
                                <label class="form-control-label" for="year"> Year</label>
                                <input type="text" name="year" id="year" class="form-control form-control-alternative" placeholder="e.g. 2021 or 2021-2022" value="{{ old('year') }}" data-mask="0000-0000" data-mask-clearifnotmatch="true" required autofocus>
                            </div>
                            <div class="col col-lg-4">
                                <label class="form-control-label" for="semester">
                                    Semester
                                </label>
                                <select id="semester" name="semester" class="form-control form-control-alternative m-b" required>
                                    <option value="01" {{ old('semester') == 1 ? 'selected' : '' }}>First Semester</option>
                                    <option value="02" {{ old('semester') == 2 ? 'selected' : '' }}>Second Semester</option>
                                    <option value="02" {{ old('semester') == 2 ? 'selected' : '' }}>Second Semester</option>
                                    <option value="04" {{ old('semester') == 4 ? 'selected' : '' }}>Summer</option>
                                </select>
                            </div>
                        </div>



                        <div class="pl-lg-4 row mt-4">
                            <div class="col">
                                <button id="btnSubmit" type="submit" class="btn btn-success">
                                    Add Academic Term
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