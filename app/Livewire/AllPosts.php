<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class AllPosts extends Component
{
    public $posts;
    public function mount() {
        $this->posts = Post::all();
    }
    public function render()
    {
        return view('livewire.all-posts');
    }
}
