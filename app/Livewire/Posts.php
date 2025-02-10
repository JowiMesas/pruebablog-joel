<?php

namespace App\Livewire;
use App\Models\Post;
use Livewire\Component;
class Posts extends Component
{
    public $posts = null;
    public function mount() {
        $this->posts = Post::all();
    }
    public function delete($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect(route("posts.index"));
    }
    public function render()
    {
        return view('livewire.posts');
    }
}
