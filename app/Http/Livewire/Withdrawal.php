<?php

namespace App\Http\Livewire;

use App\Jobs\userWalletJob;
use App\Models\Withdrawal as ModelsWithdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Withdrawal extends Component
{
    public $amount;
    public $responseData;
    public $status;

    public function render()
    {
        return view('livewire.withdrawal');
    }

    public function withdrawal(){
        $this->validate([
            'amount' => 'required|numeric'
        ]);

        $data = DB::table('user_wallets')->where('user_id', Auth::user()->id)->first();
        if (!$data) {
            session()->flash('success', 'Saldo Tidak Cukup');
            return;
        }

        if ($data->balance - $this->amount < 0) {
            session()->flash('success', 'Saldo Tidak Cukup');
            return;
        }
        // Add withdrawal History
        ModelsWithdrawal::create([
            "user_id" => Auth::user()->id,
            "amount" => $this->amount,
            "status" => true
        ]);

        // update user wallet
        $job = new userWalletJob(Auth::user()->id, $this->amount, "out");
        dispatch($job);
        session()->flash('success', 'Withdrawal Anda Segera di Proses');
    }
}
