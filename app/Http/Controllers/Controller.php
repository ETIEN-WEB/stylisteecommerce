<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function adresse_ip(){
        if (!session()->has('adresse_ip')){
            session()->put('adresse_ip',Http::get('https://api.ipify.org/?format=json')['ip']);
            return Http::get('https://api.ipify.org/?format=json')['ip'];
        }else{
            return session()->get('adresse_ip');
        }
    }
}
