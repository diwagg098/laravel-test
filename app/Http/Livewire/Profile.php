<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        $data = DB::table('users')
            ->leftJoin('user_wallets', 'user_wallets.user_id','=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->first();

        return view('livewire.profile', compact('data'));
    }
}
