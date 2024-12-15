<?php

namespace App\Jobs;

use App\Mail\sendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mail_to;
    protected $subject;
    protected $data;
    protected $view;

    public function __construct($mail_to, $subject, $view, $data)
    {
        $this->data     = $data;
        $this->subject  = $subject;
        $this->view     = $view;
        $this->mail_to  = $mail_to;
    }

    public function handle(): void
    {
        Mail::to($this->mail_to)->send(new sendMail($this->subject, $this->view, $this->data));
    }
}
