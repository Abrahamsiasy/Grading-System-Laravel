@extends('layouts.app')
@section('content')

<div class="container-fluid mt--7">

  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-body row align-items-center">
          <div class="col">
            <h2 class="mb-0"> {{ $curriculum->department_name }} {{ $curriculum->curriculum_id }} Curriculum</h2>
            <div class="row">
              <div class="col-sm">
                <p>
                  Effective Year: {{ $curriculum->effective_year }}
                  <br>
                  Total CH: {{ $curriculum->getTotalCh() }}
                  <br>
                  Total ECTS: {{ $curriculum->getTotalEcts() }}
                </p>
              </div>
              <div class="col-sm">
                <p>
                  <br>
                  Total CH: {{ $curriculum->getTotalCh() }}
                  <br>
                  Total ECTS: {{ $curriculum->getTotalEcts() }}
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <a href="/newcurriculum" class="btn btn-outline-secondary btn-sm">
                  Return
                </a>
                <a href="" class="btn btn-outline-info btn-sm">
                  Edit Curriculum
                </a>

                <form action="/newcurriculum/{{$curriculum->curriculum_id}}" method="POST" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirm('Are you sure you want to delete {{$curriculum->curriculum_id }} curriculum?') ? this.parentElement.submit() : ''">
                    Delete Curriculum
                  </button>
                </form>
              </div>

              <div class="col text-right">
                <a href="/newcurriculum_detail/create/{{ $curriculum->curriculum_id }}" class="btn btn-primary">Add Course to Curriculum</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  @if(count($curriculum_details) > 0)
  @foreach ($curriculum_details as $cur_details)
  <!-- Curriculum Details per School Year -->

  @foreach ($cur_details->groupBy('semester') as $cur_details)
  <div class="row mt-3">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">

        <div class="card-header border-0">
          <h3 class="mb-0"> {{ $cur_details[0]->getAcadTerm() }} </h3>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="text-center">Course Code</th>
                <th scope="col" class="text-left">Discription</th>
                <th scope="col" class="text-center">Credit Hours</th>
                <th scope="col" class="text-center">ECTS</th>
                <th scope="col" class="text-right"></th>
              </tr>
            </thead>

            <tbody>
              <!-- Curriculum Details  -->
              <!-- Curriculum Details per School Year -->
              @php
                $totalCh = 0;
                $counterCh = 0;
                $totalEcts = 0;
                $counterEcts = 0;
              @endphp
              @foreach ($cur_details as $cur_detail)
              <tr>
                <td class="text-center" scope="row"> {{ $cur_detail->course_code }} </td>
                <td class="text-left"> {{ $cur_detail->course->description }} </td>
                <td class="text-center"> {{ $cur_detail->course->ch }} </td>
                @php
                $totalCh += $cur_detail->course->ch;
                $counterCh +=1;
                @endphp
                <td class="text-center"> {{ $cur_detail->course->ects }} </td>
                @php
                $totalEcts += $cur_detail->course->ects;
                $counterEcts +=1;
                @endphp
                @endforeach
              </tr>
            </tbody>
            <div class="container">
              <p>

                <br>

                semister CH: {{ $totalCh }}
                <br>
                 Semister Courses: {{ $counterCh }}
                <br>
                semister ECTS: {{ $totalEcts }}
              </p>
            </div>
            <div class="container h4">Semister GPA: </div>
          </table>

        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endforeach
  @else
  <div class="row mt-2">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-body row mt-3 mb-5">
          <div class="col text-center">
            <p class="lead">Curriculum is empty</p>
            <br>
            <a href="/newcurriculum_detail/create/{{ $curriculum->curriculum_id }}" class="btn btn-primary btn-lg">Add Course to Curriculum</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

</div>

@endsection