<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Validator;

class StartApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user for test.';

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
        //Create sample user admin
        $name     = 'ltdat287';
        $email    = 'ltdat287@gmail.com';
        $password = 'sometimeka';

        $password = ($password) ? bcrypt($password) : '';

        //Create array data send to server
        $data = array(
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
            'password_confirmation' => $password
        );

        //Validator request send from user
        $valids = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        //Send messages error to brower if not validate
        if (! $valids->fails())
        {
            $user = User::create($data);
            $this->info("Insert information user success!");
        }
        else
        {
            //return messages error to Console
            foreach ($valids->messages()->all() as $message)
            {
                $this->error($message);
            }
            exit();
        }
    }
}
