@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Student List 
                    <a href="/students/create" class="btn btn-primary btn-sm float-right"> Add Students</a>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Student No</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th colspan="3"> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->user->name}}</td>   <!-- Related sa (user) kunin natin yung name and email-->
                                <td>{{ $student->user->email}}</td>
                                <td>{{ $student->student_no }}</td>
                                <td>{{ $student->course }}</td>
                                <td>{{ $student->year_level }}</td>
                                <td><a href="/students/{{$student->id}}" class="btn btn-info btn-sm">View</a></td>
                                <td><a href="/students/{{$student->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                            </tr>

                            <td>
                                <form action="{{ route('students.destroy', $student->id)}}" method="POST">
                                    @method('DELETE')  <!-- Delete for destroy-->
                                    @csrf  <!-- Token -->
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                            @endforeach
                        </tbody>
                    </table>
                       Total no. Student {{ $count }}     <!-- Display the count-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
