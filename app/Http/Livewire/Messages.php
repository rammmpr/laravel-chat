<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Messages extends Component
{
    public $groups;
    public $user;
    public $group = null;
    public $myText;

    public function mount()
    {
        $this->user = Auth::user();
        $this->groups = Group::get();
    }

    public function render()
    {
        $chats = null;
        if($this->group != null){
            $chats = Chat::where('group_id', $this->group->id)->orderBy('created_at', 'desc')->get();
        }
        return view('livewire.messages', [
            'chats' => $chats
        ]);
    }

    public function selectGroup($id)
    {
        $this->group = Group::find($id);
    }

    public function send()
    {
        $this->validate([
            'myText' => 'required'
        ]);

        Chat::create([
            'group_id' => $this->group->id,
            'user_id' => $this->user->id,
            'message' => $this->myText
        ]);

        $this->myText = null;
    }
}