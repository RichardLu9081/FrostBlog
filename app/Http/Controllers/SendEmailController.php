<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends BaseController
{
    // 类的成员变量，可在类的所有方法中访问
    public $publicIP;
    public function sendEmail()
    {
        // 调用方法ip
        //$this->ip();
        $data = [
            'title' => '公网IP变更通知',
            'content' => '新的公网IP是：',
            'ip' => $this->publicIP,
        ];
        Mail::to('634351735@qq.com')->send(new SendEmail($data));
        dd("邮件发送完成");

        // 如果需要设置自定义邮件主题，可以在 Mailable 类的 build 方法中调整     
    }

    public function  ip()
    {
        
        // 获取公网IP的API，这里以ipify为例
        $this->publicIP = json_decode(file_get_contents('http://ip-api.com/json'))->query;
        if ($this->publicIP === false) {
            die('Failed to get public IP.');
        }
        // 查询数据库中现有的IP记录
        $existingIP = DB::table('ips')
            ->where('ip', $this->publicIP)
            ->first();
        // 使用DB门面检查IP是否存在
        $ipExists = DB::table('ips')
            ->where('ip', $this->publicIP)
            ->exists();

        // 如果IP不存在，则插入新记录；如果存在，则更新记录
        if (!$ipExists) {
            // IP不存在，插入新记录
            DB::table('ips')->insert(['ip' => $this->publicIP]);
            $action = "New IP inserted.";
            //dd($action);
            $this->sendEmail();
        } elseif ($existingIP->ip !== $this->publicIP) {
            // IP存在但不一致
            // IP已存在，更新记录（这里假设有一个时间戳字段updated_at用于记录更新时间）
            DB::table('ips')
                ->where('ip', $this->publicIP)
                ->update(['updated_at' => now()]);
            $action = "Existing IP updated.";

            // dd($action);
            // 发送邮件通知（无论插入还是更新都发送邮件，根据实际情况调整）
            $this->sendEmail();
        } else {
            // IP一致，无需更新，仅输出信息
            echo "公网IP没有变化，当前IP: " . $this->publicIP;
            //$this->sendEmail();
        }
    }
}
