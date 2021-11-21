@extends('layouts.app')
@section('content')

    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-4">
                            <h3 class="mb-0">Curriculum list</h3>
                        </div>

                        <div class="col col-lg-4">
                            <form action="/curriculums?" method="get" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-sm pt-0">
                                        <input name="search" class="form-control" placeholder="e.g.2021-2025" type="text">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-default" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col text-right">
                            <a href="newcurriculum/create" class="btn btn-sm btn-primary">Add Curriculum</a>
                        </div>
                    </div>
                </div>
                @if(count($curriculums) > 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Department Name</th>
                                    <th scope="col" class="text-center">Total ECTS</th>
                                    <th scope="col" class="text-center">Total CH</th>
                                    <th scope="col" class="text-center">Effective Year</th>

                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            @foreach ($curriculums as $curriculum)
                            <tbody>
                                <tr>
                                    <td class="text-right" scope="row">
                                        <a href="/newcurriculum/{{ $curriculum->curriculum_id }}" class="btn btn-outline-primary btn-sm">
                                        View
                                        </a>
                                    </td>
                                    <td class="text-center">  {{ $curriculum->curriculum_id }}</td>
                                    <td class="text-center">  {{ $curriculum->department_name }}</td>
                                    <td class="text-center">  {{ $curriculum->getTotalCh() }}  </td>
                                    <td class="text-center">  {{ $curriculum->getTotalEcts() }} </td>
                                    <td class="text-center">  {{ $curriculum->effective_year }}  </td>
                                    <td class="text-left">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <a href="/newcurriculum/create" class="btn btn-primary">Add Curriculum</a>
                      </div>
                  </div>
            </div>
        </div>
      </div>

    </div>
@endsection