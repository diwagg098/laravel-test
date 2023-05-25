<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use App\Jobs\userWalletJob;
use App\Models\Deposit as ModelsDeposit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Ramsey\Uuid\Uuid;

class Deposit extends Component
{
    public $order_id;
    public $amount;
    public $responseData;
    public $status;

    public function render()
    {
        $data = DB::table('user_wallets')->where('user_id', Auth::user()->id)->first();
        return view('livewire.deposit', compact('data'));
    }

    public function deposit() {
        $this->validate([
            'amount' => 'required|numeric'
        ]);

        $base64Encode = base64_encode(Auth::user()->name);

        $url = 'https://diwagg098.000webhostapp.com/laravel-test/public/api/deposit';

        $client = new Client();

        $payload = [
            "order_id" => Uuid::uuid4()->toString(),
            "amount" => floatval($this->amount)
        ];

        $response = $client->request('POST', $url, [
            'json' => $payload,
            'headers' => [
                'Authorization' => 'Bearer ' . $base64Encode
            ]
        ]);

        $this->responseData = json_decode($response->getBody(), true);
        if ($response->getStatusCode() == 200) {
            // add history deposit
            $data = [
                "user_id" => Auth::user()->id,
                "amount" => $this->amount,
                "status" => true
            ];
            ModelsDeposit::create($data);

            // async for update user wallet
            $this->status = "in";
            $job = new userWalletJob(Auth::user()->id, $this->amount, $this->status);
            dispatch($job);
            session()->flash('success', 'Deposit Anda Segera di Proses');
        }else{
            return redirect('/deposit');
        }

    }
}