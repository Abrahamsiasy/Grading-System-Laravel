@extends('layouts.app')

@section('content')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">

            @if(count($instructors) > 0)
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <h3 class="mb-0">Instractor List</h3>
                        </div>
                       

                        <div class="col text-right">
                            <a href="/newinstructor/create" class="btn btn-sm btn-primary">Add Instractor</a>
                        </div>
                    </div>
                </div>

                @if(count($instructors) > 0)
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush {{ count($instructors) < 5 ? 'mb-6' : ''}}">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-center">Employee No</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($instructors as $instructor)
                                <tr>
                                    <td class="text-right" scope="row">
                                        <a href="/newinstructor/{{ $instructor->employee_no }}" class="btn btn-outline-primary btn-sm">
                                            View
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        {{ $instructor->employee_no }}
                                    </td>
                                    <td class="text-center">{{ $instructor->user->name }}</td>
                                    <td class="text-center">{{ $instructor->user->email }}</td>
                                    
                                    
                                   
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $instructors->links() }}
                    </div>
                @endif
              @else
                  <div class="row mt-3 mb-5">
                      <div class="col text-center">
                          <p class="lead">No instructor found</p>
                          <br>
                          <a href="/instructors/create" class="btn btn-primary btn-lg">Add Student</a>
                      </div>
                  </div>
              @endif
            </div>
        </div>
      </div>

    </div>
@endsection