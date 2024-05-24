<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class AutherCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auther:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new auther';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fname = $this->ask('Enter author first_name?');
        $lname = $this->ask('Enter author last_name?');
        $birthday = $this->ask('Enter author birthday?');
        $biography = $this->ask('Enter author biography?');
        $gender = $this->ask('Enter author gender?');
        $placeofb = $this->ask('Enter author place of birth?');
        if (is_null($fname) || is_null($birthday)) {
            return $this->error('Name or birthday cannot be null.');
        }

            $token =  \DB::table('royal_app_tokens')->first()?->token_key;
            $data = [
                "first_name" => $fname,
                "last_name" => $lname,
                "birthday" => $birthday,
                "biography" => $biography,
                "gender" => $gender,
                "place_of_birth" => $placeofb,
            ];
            \Log::info('data---->',[$data]);


            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '. $token,
            ])->post(env('API_URL').'authors',$data);

            if($response->failed())
            {
                $this->info($response->body());
            }

            if($response->successful())
            {
                $this->info('Auther create successfull!');
            }
            
    }
}
