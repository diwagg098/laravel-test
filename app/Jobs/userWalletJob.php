<?php

namespace App\Jobs;
use App\Models\Deposit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class userWalletJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;
    protected $amount;
    protected $status;

    /**
     * Create a new job instance.
     *
     * @param int $customerId
     * @param float $amount
     */
    public function __construct($user_id, $amount, $status)
    {
        $this->user_id = $user_id;
        $this->amount = $amount;
        $this->status = $status;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $wallet_data = DB::table('user_wallets')->where('user_id', $this->user_id)->first();
        if($this->status === "in"){
            // update user wallets
            if ($wallet_data) {
                DB::table('user_wallets')->where('user_id', $this->user_id)->update([
                    "balance" => $wallet_data->balance + $this->amount
                ]);
            }else{
                DB::table('user_wallets')->insert([
                    "user_id" => $this->user_id,
                    "balance" => $this->amount
                ]);
            }
        }else{
            DB::table('user_wallets')->where('user_id', $this->user_id)->update([
                "balance" => $wallet_data->balance - $this->amount
            ]);
        }   
    }
}
