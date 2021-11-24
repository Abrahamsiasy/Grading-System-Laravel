@extends('layouts.app')

@section('styles')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
<!-- //cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap5.min.css">


@endsection

@section('content')
<div class="container-fluid mt--7">



  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-body row align-items-center">
          <div class="col">
            <h2>Student name : {{$student->user->name}}</h2>
            <h3>Student ID : {{$student->getStudentNo()}}</h3>
            <p class="text-right">{{$student->gradedGrades()}}</p>
            <h2 class="mb-0"> {{ $curriculum->curriculum_id }} Curriculum</h2>
            <p>
              Effective Year: {{ $curriculum->effective_sy }}
              <br>
              Total CH: {{ $curriculum->getTotalCh() }}
              <br>
              Total ECTS: {{ $curriculum->getTotalEcts() }}
            </p>
            <div class="row">
              <div class="col">
                <a href="/newcurriculum" class="btn btn-outline-secondary btn-sm">
                  Return
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- @php
  $course_list =[];
  $cc='';
  @endphp -->

  <script>
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
  </script>


  @if(count($curriculum_details) > 0)
  <button onclick="myFunction()">Show all courses</button>

  <div id="myDIV" style="display: none;">

    <div class="table-responsive display" id="example">
      <table class="table align-items-center table-flush" id="datatable1">
        <thead class="thead-light">
          <tr>
            <th scope="col" class="text-center">Course Code</th>
            <th scope="col" class="text-center">Grade</th>
            <th scope="col" class="text-center">FInals</th>
            <th scope="col" class="text-center">mid</th>
            <th scope="col" class="text-center">others</th>
          </tr>
        </thead>

        <tbody>
          <!-- Curriculum Details  -->
          <!-- Curriculum Details per School Year -->
          @foreach ($grades as $grade)
          <tr>
            <td class="text-center" scope="row"> {{ $grade->curriculumDetails->course_code }} </td>
            <!-- @php
          $course_list[]=$grade->curriculumDetails->course_code
          @endphp -->


            <td class="text-center grade" scope="row"> {{ $grade->getGrade()}} </td>

            <td class="text-center finals" scope="row"> {{ $grade->finals }} </td>
            <td class="text-center midterms" scope="row"> {{ $grade->midterms }} </td>
            <td class="text-center others" scope="row"> {{ $grade->others  }} </td>

            <script>
              // Getting the row class name
              var grades = document.getElementsByClassName("grade");
              var finals = document.getElementsByClassName("finals");
              var midterms = document.getElementsByClassName("midterms");
              var others = document.getElementsByClassName("others");



              //Looping over number of cells 
              for (var kk = 0; kk < others.length; kk++) {
                // Get the i th cell
                var otherscell = others[kk];
                // Set the id dynamically
                otherscell.setAttribute("id", "othersmid_" + (kk + 1));
              }
              //Looping over number of cells 
              for (var kkk = 0; kkk < finals.length; kkk++) {
                // Get the i th cell
                var finalscell = finals[kkk];
                // Set the id dynamically
                finalscell.setAttribute("id", "finalsid_" + (kkk + 1));
              }

              //Looping over number of cells 
              for (var i = 0; i < midterms.length; i++) {
                // Get the i th cell
                var midtermcell = midterms[i];
                // Set the id dynamically
                midtermcell.setAttribute("id", "midtermid_" + (i + 1));
              }



              //Looping over number of cells 
              for (var j = 0; j < grades.length; j++) {
                // Get the i th cell
                var gradecell = grades[j];
                // Set the id dynamically
                gradecell.setAttribute("id", "gradeid_" + (j + 1));
              }
            </script>


            @endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>






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
          <table class="table align-items-center table-flush" id="datatable2">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="text-center">Course Code</th>

                <th scope="col" class="text-left">Discription</th>
                <th scope="col" class="text-center">Credit Hours</th>
                <th scope="col" class="text-center">ECTS</th>
                <th scope="col" class="text-right">Grade</th>
                <th scope="col" class="text-right">FInals</th>
                <th scope="col" class="text-right">mid</th>
                <th scope="col" class="text-right">others</th>
              </tr>
            </thead>
            <tbody>
              <!-- Curriculum Details  -->
              <!-- Curriculum Details per School Year -->
              @foreach ($cur_details as $cur_detail)
              <tr>
                <td class="text-center" scope="row"> {{ $cur_detail->course_code }} </td>
                <td class="text-left"> {{ $cur_detail->course->description }} </td>
                <td class="text-center"> {{ $cur_detail->course->ch }} </td>
                <td class="text-center"> {{ $cur_detail->course->ects }} </td>

                @if(in_array($cur_detail->course_code,$course_list))

                <?php $cc = $cur_detail->course_code; ?>
                <?php

                if (($key = array_search($cc, $course_list)) !== false) {
                  unset($course_list[$key]);
                }
                ?>






                <td class="text-center gradetb1" scope="row"></td>
                <td class="text-center finalstb1" scope="row"></td>
                <td class="text-center midtermstb1" scope="row"> </td>
                <td class="text-center otherstb1" scope="row"> </td>













                <script>
                  // Getting the row class name
                  var grades = document.getElementsByClassName("gradetb1");
                  var finals = document.getElementsByClassName("finalstb1");
                  var midterms = document.getElementsByClassName("midtermstb1");
                  var others = document.getElementsByClassName("otherstb1");



                  //Looping over number of cells 
                  for (var kk = 0; kk < others.length; kk++) {
                    // Get the i th cell
                    var otherscell = others[kk];
                    // Set the id dynamically
                    otherscell.setAttribute("id", "otherstb1mid_" + (kk + 1));
                    document.getElementById("otherstb1mid_" + (kk + 1)).innerHTML = document.getElementById("othersmid_" + (kk + 1)).innerHTML;
                  }
                  //Looping over number of cells 
                  for (var kkk = 0; kkk < finals.length; kkk++) {
                    // Get the i th cell
                    var finalscell = finals[kkk];
                    // Set the id dynamically
                    finalscell.setAttribute("id", "finalstb1id_" + (kkk + 1));
                    document.getElementById("finalstb1id_" + (kkk + 1)).innerHTML = document.getElementById("finalsid_" + (kkk + 1)).innerHTML;

                  }

                  //Looping over number of cells 
                  for (var i = 0; i < midterms.length; i++) {
                    // Get the i th cell
                    var midtermcell = midterms[i];
                    // Set the id dynamically
                    midtermcell.setAttribute("id", "midtermtb1id_" + (i + 1));
                    document.getElementById("midtermtb1id_" + (i + 1)).innerHTML = document.getElementById("midtermid_" + (i + 1)).innerHTML;
                  }



                  //Looping over number of cells 
                  for (var j = 0; j < grades.length; j++) {
                    // Get the i th cell
                    var gradecell = grades[j];
                    // Set the id dynamically
                    gradecell.setAttribute("id", "gradetb1id_" + (j + 1));
                    document.getElementById("gradetb1id_" + (j + 1)).innerHTML = document.getElementById("gradeid_" + (j + 1)).innerHTML;

                  }
                </script>









                @else

                <td class="text-center" scope="row">--</td>
                <td class="text-center" scope="row">--</td>
                <td class="text-center" scope="row">--</td>
                <td class="text-center" scope="row">--</td>
                @endif
                @endforeach

              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center h4">Semister GPA: </div>
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

  <table>
    @foreach($course_list as $list)
    <tr>
      <td class="text-center">{{$list}}</td>
      @endforeach
    </tr>
  </table>


</div>

@endsection

@section('javascripts')


@section('javascripts')
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


<script>
  $(document).ready(function() {
    $('#datatable1').DataTable({
      "dom": 'Bfrtip',
      "processing": true, // for show progress bar
      buttons: [
        'copy', 'csv', 'excel', 'print'
      ]
    });

    table.buttons().container()
      .appendTo('#datatable1_wrapper .col-md-6:eq(0)');
  });

  

  
</script>

@endsection