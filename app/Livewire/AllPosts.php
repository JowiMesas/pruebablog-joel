<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class AllPosts extends Component
{
    use WithPagination;

    public $filterCategory;
    
    public $commentContent = "";
    public $replyContent = "";
    public $postIdFormComment = null;
    public $commentIdFormReplies = null;


    protected $messages = [
        "commentContent.required"=> "The content of the comment is required!!",
        "replyContent.required"=> "The reply content is required!!",
     ];
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
    public function createComment($postId) {
        $this->validate([
            'commentContent' => 'required'
        ]);
        $post = Post::findOrFail($postId);
        $post->comments()->create([
            'content' => $this->commentContent,
            'user_id' => Auth::id(),
        ]);
        $this->commentContent = "";
        $this->postIdFormComment = null;
        $this->resetPage();
    }
    public function createReply($commentId) {
        $this->validate([
            'replyContent' => 'required'
        ]);
        $comment = Comment::findOrFail($commentId);
        $comment->replies()->create([
            "content" => $this->replyContent,
            "user_id" => Auth::id(),
        ]);
        $this->replyContent = "";
        $this->commentIdFormReplies = null;
        $this->resetPage();
    }

}
