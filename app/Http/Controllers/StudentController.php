<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Mail; //import the two. 
use App\Mail\WelcomeMail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   //Index Method
    {
        //get all students
        // $students = Student::all();

        $students = Student::with('user')->get();  //Our Student.Model isasama daw natin si ('user')  
        //dd($students);                                       //Si ('user') yung denefined natin galign kay Student.Model
        $count = Student::get()->count();          //Add count na method  to check kung ilan na nakukuhang number of records
        // dd($count); 
        return view('students.index', compact('students','count')); //If gusto natin makita sa view
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    //Create Method
    {
        //
        return view('students.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  //Store Method
    {
        //
        $user =  new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->save();
        
        //send email to user 
        // Mail::to($request->email)->send(new WelcomeMail($user));
        //Mag sesend tayo ng Email using (Mail) class to ($request->email) and then i sesend natin 
        //using Mailable class. (new WelcomeMail) and dun sa _contstract it will accept usermodel. so pinasa natin si ($user)
        
        $student =  new Student;
        $student->student_no = $request->student_no;
        $student->birthday = $request->birthday; ///Notes: Fixes fot the determine issue go to config/database.php change strict to false
        $student->gender = $request->gender;
        $student->course = $request->course;
        $student->year_level = $request->year_level;
        $student->status = 'active';
        $student->user_id = $user->id;
        $student->save();

        return redirect('/students');  ///Para mag save/store ng students
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)  //Show Method
    {
        //
        $student = Student::with('user')->find($id);  //Add the with('') method again para sa show.blade.php
        return view('students.show', compact('student')); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   //Edit Method
    {
        //
        $student = Student::find($id); 
        return view('students.edit', compact('student')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)  //Update Method
    { 
        //
        $student = Student::find($id); //para mapabilis hindi mano mano 
        $student->fill($request->all());  //etong dalawa nato pwedeng gamitin sa {create) kapag maraming fields 

        $student->save();
        return redirect('/students');  //anatoher method lang
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */                                 //Destroy Method
    public function destroy($id)    // ($id) or (Student $student)  Pwedeng Model binding hindi na si ID. kasi automatic nanaman nya binabato 
    {                                  // nya si ID natin/  Pwede ding i apply sa edit/show/ para hindi
        //                             //na gumamit ng find.  $student = Student::find($id);--  elquent Model
        $student = Student::find($id); 
        $student->delete();
        return redirect('/students');
    }
    
    public function subjects(){
        return 'subjects';
    }
}
