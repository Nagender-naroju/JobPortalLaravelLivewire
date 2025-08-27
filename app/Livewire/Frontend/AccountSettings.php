<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountSettings extends Component
{

    public $name;
    public $email;  
    public $designation;
    public $phone_number;
    public $user_id;
    public $old_password;
    public $new_password;
    public $confirm_password;

    public $role;

    public function mount(){

        $this->user_id = Auth::user()->id;
        $this->role = Auth::user()->role;
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->designation = Auth::user()->designation;
        // $this->old_password = Auth::user()->password;
        $this->phone_number = Auth::user()->phone_number;
    }

    public function profile()
    {
        $this->validate([
            'name'=>"required|string",
            'email'=>"required|string",
            'designation'=>"required|string",
            'phone_number'=>"required|max:10"
        ]);

        User::where(['id'=>$this->user_id])->update([
            'name' => $this->name,
            'email' => $this->email,
            'designation' => $this->designation,
            'phone_number' => $this->phone_number
        ]);

         session()->flash('success', 'Profile Updated Successfully');
    }

    public function change_password()
    {
        $this->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:9|max:9',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        $user = User::find($this->user_id);

        if (!Hash::check($this->old_password, $user->password)) {
            $this->addError('old_password', 'Old password is incorrect.');
            return;
        }

        $user->password = Hash::make($this->new_password);
        $user->save();

        session()->flash('password_success', 'Password updated successfully.');

        // 🔁 Reset only password fields
        $this->reset(['old_password', 'new_password', 'confirm_password']);
    }
 
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        session()->flash('success', 'You have been logged out successfully');
        
        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.frontend.account-settings')->extends('welcome')->section('content');
    }
}
