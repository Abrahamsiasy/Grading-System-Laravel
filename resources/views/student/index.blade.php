@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if (count($studentlist))
                        <table class="table table-striped ">
                            <tr>
                                <th>FullName</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Gender</th>
                            </tr>
                            
                            @foreach ($studentlist as $studentlists)
                                <tr>
                                    <td> <a href="/student/{{$studentlists->id}}"> {{$studentlists->full_name}}</a></td>
                                    <td>{{$studentlists->email}}</td>
                                    <td>{{$studentlists->address}}</td>
                                    @if($studentlists->sex == 1)
                                    <td>M</td>
                                    @else
                                    <td>F</td>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else 
                        <h1>You have no students yet</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
