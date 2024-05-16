<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SendEmailController;
class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'email:send'; // 定义命令行调用签名
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email every hour';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(SendEmailController $controller)
    {
        $controller->ip(); // 假设 sendEmail 方法可以被静态调用或实例化后调用
        $this->info('Email sent successfully!');
    }
}
