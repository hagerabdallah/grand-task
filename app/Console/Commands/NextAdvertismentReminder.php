<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Advertisment;
use App\Services\MailService;
use Illuminate\Console\Command;

class NextAdvertismentReminder extends Command
{
    
  
    protected $mail_service;

    public function __construct(MailService $mail_service)
    {
        parent::__construct();
        $this->mail_service = $mail_service;

    }
    protected $signature = 'nextAdvertisment:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

   
    public function handle()
    {
        $tomorrow = Carbon::tomorrow();
        $tomorrow_advertisments=Advertisment::whereDate('start_date',$tomorrow)->get();
        foreach($tomorrow_advertisments as $tomorrow_advertisment ){
           $user= $tomorrow_advertisment->user;
            $this->mail_service->send_mail('nextadvertismentreminder',$user,
            'tomorrow Advertisment Reminder','you have an advertisment tomorrow.');
        }


    }
}
