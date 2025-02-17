<?php

namespace App\Livewire;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
class Posts extends Component
{
    use WithPagination;
    public function mount() {
      
    }
    public function delete($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect(route(name: "posts.index"));
    }
    
    public function render()
    {
        $posts = Post::where('user_id', Auth::user()->id)->paginate(6);
        return view('livewire.posts', compact('posts'));
    }
}
