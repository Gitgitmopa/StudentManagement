<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User; //inlcude user model

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;  //public property  --> para ma maging available yung data sa baba. 
    public function __construct(User $user)  //Nag declare tayo ng property as public para makuha bg ating view
    {
        $this->user = $user;
    }


    public function build()
    {
        return $this->from('admin@urs.edu.php','URS Admin')->view('emails.welcome'); //return from pwedeng natin i specified agad.
                                                                            //kung kaninong galing yung email
    }
}
