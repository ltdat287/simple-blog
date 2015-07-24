<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        //
        $data = array(
            'name' => 'ltdat287',
            'email' => 'letiendat287@gmail.com',
            'password' => 'sometimeka'
        );
        
        //Check registra when user register
        $register = new Registrar();
        $validator = $registrar->validator($data);
        
        if (! $validator->fails())
        {
            $user = User::create($data);
        } 
        else 
        {
            //return messages error to Console
            foreach ($validator->messages()->all() as $message)
            {
                $this->error($message);
            }
            exit();
        }
    }
}
