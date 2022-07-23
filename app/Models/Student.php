<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model             //Si Student Model is ralated to User model
{
    use HasFactory;

    protected $fillable = [
        'student_no',
        'birthday',
        'gender',
        'course',
        'year_level'
    ];

    public function user(){
        return $this->belongsTo(User::class);   //Si student daw it belongsTo the User::class
    }                                         //Vise versa ni ONE TO ONE relationship

    public function subjects(){
        return $this->hasMany(Subjects::class);
    }
}
