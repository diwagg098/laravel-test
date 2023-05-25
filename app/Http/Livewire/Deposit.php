<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Deposit extends Component
{
    public $order_id;
    public $amount;
    public $responseData;
    
    public function makeApiRequest()
    {
        $response = Http::get('http://127.0.0.1:8000/deposity');
        
        if ($response->successful()) {
            $this->responseData = $response->json();
            // Handle the API response
        } else {
            // API request failed
            $this->responseData = null;
            // Handle request failure
        }
    }
    public function render()
    {
        return view('livewire.deposit');
    }



}