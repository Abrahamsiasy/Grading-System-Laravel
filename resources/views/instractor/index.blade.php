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


                    @if (count($instractorlist))
                        <table class="table table-striped ">
                            <tr>
                                <th>FullName</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Gender</th>
                            </tr>
                            
                            @foreach ($instractorlist as $instractors)
                                <tr>
                                    <td>{{$instractors->full_name}}</td>
                                    <td>{{$instractors->email}}</td>
                                    <td>{{$instractors->address}}</td>
                                    <td>{{$instractors->sex}}</td>
                                
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
