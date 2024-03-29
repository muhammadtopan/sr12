<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KatalogMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->details;
        // dd($this->details['title']);
        return $this->subject($this->details['title'])
                    ->attach(public_path().'/frontend/doc/a.pdf', [
                        'as' => 'katalog SR12 Herbal Store.pdf'
                    ])
                    ->view('emails.katalogMail', [
                        'data' => $data
                    ]);
    }
}
