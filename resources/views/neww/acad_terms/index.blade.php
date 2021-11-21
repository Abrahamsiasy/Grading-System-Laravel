@extends('layouts.app')
@section('content')

<div class="container-fluid mt--7">
    <div class="row mt-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <h3 class="mb-0">Academic Term list</h3>
                        </div>
                        <div class="col col-lg-4">
                            <form action="/acad_terms?" method="get" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g. 2020-2021" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col text-right">
                            <a href="/newacad_term/create" class="btn btn-sm btn-primary">Add Academic Term</a>
                        </div>
                    </div>
                </div>


                @if(count($acadTerms) > 0)
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th> No.</th>
                                <th>Status</th>
                                <th scope="col" class="">Academic Term</th>
                            </tr>
                        </thead>
                        @foreach ($acadTerms as $key => $acadTerm)
                        <tbody>

                            <tr>
                                <td> {{$acadTerms->firstItem() + $key}}</td>
                                <td>

                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Set as Current Acad Term</label>
                                </td>

                                <td class="">
                                    {{ $acadTerm->getAcadTerm() }}
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                @endif


                <div class="row mt-3 mb-5">
                    <div class="col text-center">
                        <br>
                        <a href="/newacad_term/create" class="btn btn-primary btn-lg">Add Academic Term</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection