<?php

namespace App\Mail;

use App\Events\NewReportHasRegisteredEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    /**
     * Create a new message instance.
     *
     * @param NewReportHasRegisteredEvent $event
     */
    public function __construct(NewReportHasRegisteredEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-report')->with([
            'event' => $this->event
        ])->attachFromStorage($this->event->report->attachDir);
    }
}
