<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AllPosts extends Component
{
    use WithPagination;

    public $filterCategory;

    public function render()
    {
        $posts = Post::query()
            ->when($this->filterCategory, function($query) {
                $query->whereHas('categories', function($query) {
                    $query->where('name','like','%' .  $this->filterCategory . '%');
                });
            })
            ->paginate(6); 

        return view('livewire.all-posts', compact('posts'));
    }

    public function filterPosts()
    {
    }
}
