<?php

// app/Mail/SendEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //你需要覆盖 build() 方法来定义邮件的内容、主题、收件人等
        //$subject = '公网IP变更通知';
        $subject =$this->data['title'] ;
        return $this->view('mail.send-email', ['data' => $this->data])
        ->subject($subject); // 添加这一行来设定邮件主题;
    }

}
