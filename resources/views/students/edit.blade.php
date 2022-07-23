@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Students
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id)}}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Student No</label>
                            <input type="number" class="form-control" name="student_no" value="{{ $student->student_no }}">
                        </div>
                        <div class="form-group">
                            <label for="">Birthdate</label>
                            <input type="date" class="form-control" name="birthday" value="{{ $student->birthday }}">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                           <select name="gender" class="form-control">
                               <option @if($student->gender == 'male') selected @endif value="male">Male</option>
                               <option @if($student->gender == 'female') selected @endif value="female">Female</option>
                           </select>
                        </div>

                        <div class="form-group">
                            <label for="">Course</label>
                           <select name="course" class="form-control">
                               <option @if($student->course == 'bsit') selected @endif value="bsit">BSIT</option>
                               <option @if($student->course == 'bsis') selected @endif value="bsis">BSIS</option>
                           </select>
                        </div>

                        <div class="form-group">
                            <label for="">Year Level</label>
                           <select name="year_level" class="form-control">
                               <option @if($student->year_level == '1') selected @endif value="1">1</option>
                               <option @if($student->year_level == '2') selected @endif value="2">2</option>
                               <option @if($student->year_level == '3') selected @endif value="3">3</option>
                               <option @if($student->year_level == '4') selected @endif value="4">4</option>
                           </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection