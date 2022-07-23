@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create Students
                </div>
                <div class="card-body">
                    <form action="{{ route('students.store')}}" method="POST">
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
                            <input type="number" class="form-control" name="student_no">
                        </div>
                        <div class="form-group">
                            <label for="">Birthdate</label>
                            <input type="date" class="form-control" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                           <select name="gender" class="form-control">
                               <option value="male">Male</option>
                               <option value="female">Female</option>
                           </select>
                        </div>

                        <div class="form-group">
                            <label for="">Course</label>
                           <select name="course" class="form-control">
                               <option value="bsit">BSIT</option>
                               <option value="bsis">BSIS</option>
                           </select>
                        </div>

                        <div class="form-group">
                            <label for="">Year Level</label>
                           <select name="year_level" class="form-control">
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
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