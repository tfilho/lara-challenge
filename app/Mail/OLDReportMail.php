<?php

namespace App\Mail;

use App\Jobs\EmailSent;
use App\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OLDReportMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $report;
    public $pdf;
    public $attachmentPath;

    public $tries = 1;

    /**
     * Create a new message instance.
     *
     */
    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.report', [])
                ->subject("You're receiving your report. Enjoy :)");
            //->attach($this->attachmentPath);
    }
}
