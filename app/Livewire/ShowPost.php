<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
class ShowPost extends Component
{
    public $post; 
   
    public function mount($id) {
        $this->post = Post::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.show-post');
    }
}
