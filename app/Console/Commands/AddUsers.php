<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AddUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add users';

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
     * @return mixed
     */
    public function handle()
    {
        $data = [
            [
                "firstname" => "service",
                "email" => "service@xyrintech.com",
                "password" => "test@123",
                "status" => "Active",
                "type" => "Admin",
                "registered"    => 12121
            ],
            [
                "firstname" => "employee",
                "email" => "employee@xyrintech.com",
                "password" => "test@123",
                "status" => "Active",
                "type" => "Employee",
                "registered"    => 12121
            ],
            [
                "firstname" => "customer",
                "email" => "customer@xyrintech.com",
                "password" => "test@123",
                "status" => "Active",
                "type" => "Customer",
                "registered"    => 12121
            ]
        ];    

        foreach($data as $_data)
        {   
            User::store(collect($_data));
        }
    }
}
