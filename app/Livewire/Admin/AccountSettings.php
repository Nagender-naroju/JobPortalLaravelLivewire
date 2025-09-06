<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AccountSettings extends Component
{

    public function placeholder()
    {
        return <<<'HTML'
          <div class="card border-0 shadow mb-4 mt-4">
                <div class="card-header">Users Management</div>
                <div class="card-body p-4">
                    <div class="placeholder-glow">
                        <span class="placeholder col-6"></span>
                        <span class="placeholder w-75"></span>
                        <span class="placeholder" style="width: 25%;"></span>
                    </div>
                </div>
          </div>
        HTML;
    }

    public function render()
    {
        $users = User::where('role', '!=', 3)->orderBy('id','DESC')->get();
        return view('livewire.admin.account-settings',['users'=>$users]);
    }
}
