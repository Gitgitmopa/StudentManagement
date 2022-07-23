@extends('layouts.app')

@section('content')
        <div class="content">
                 <div class="container">
                     Name {{ $student->user->name }} <br>
                     Email {{ $student->user->email}} <br>
                     Student No: {{$student->student_no}}<br>  <!-- Dinisplay lang yung basic information-->
                     Course: {{$student->course}}<br>          <!-- by calling the variable ($student)  -->
                     Year Level: {{$student->year_level}}<br>   <!--then (->stdent_no) identifier kung ano mga i didisplay nating preperty-->
                  </div>
            </div>

@endsection