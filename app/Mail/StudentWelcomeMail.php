<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Student; // 👈 IMPORT OBLIGATOIRE ICI

class StudentWelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $student;
    public $password;
    public $loginUrl;

    // Corrigé : Student provient de App\Models
    public function __construct(Student $student, string $password)
    {
        $this->student = $student;
        $this->password = $password;
        $this->loginUrl = url('/login');
    }

    public function build()
    {
        return $this->subject('🎓 Bienvenue sur notre plateforme éducative ClassyAcademy !')
                    ->view('emails.student-welcome')
                    ->with([
                        'student' => $this->student,
                        'password' => $this->password,
                        'loginUrl' => $this->loginUrl,
                    ]);
    }
}