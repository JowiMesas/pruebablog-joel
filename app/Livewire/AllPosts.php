<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class AllPosts extends Component
{
    public $posts;
    public $filterCategory;
    public function mount() {
        $this->posts = Post::all();
    }
    public function render()
    {
        return view('livewire.all-posts');
    }
    public function filterPosts() {
        if(!empty($this->filterCategory)) {
            $this->posts = Post::whereHas('categories', function($query) {
                $query->where('name','like','%' .  $this->filterCategory . '%');
            })->get();
        } else {
            $this->posts = Post::all();
        }
    }
}
