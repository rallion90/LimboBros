<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $get_order2;
    public $total;
    public $order_number;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($get_order2, $total, $order_number)
    {
        //
        $this->get_order2 = $get_order2;
        $this->total = $total;
        $this->order_number = $order_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order')->with(['data' => $this->get_order2, 'total' => $this->total, 'order_number' => $this->order_number]);
    }
}
