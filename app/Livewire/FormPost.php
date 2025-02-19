<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
class FormPost extends Component
{
    public $title;
    public $description;
    public $imageUrl;
    public $editPost = null;
    public $selectedCategories = [];
    public $allCategories;
    protected $rules = [
        "title"=> "required|min:5",
        "description"=> "required|min:10",
        "imageUrl"=> "required",
        "selectedCategories"=> "required",
    ];
    protected $messages = [
        "title.required"=> "Adding a title is mandatory!",
        "title.min" => "The title must be at least 5 characters long.",
        "description.required"=> "Necessary to add a short description!",
        "description.min" => "The description must be at least 10 characters long.",
        "imageUrl.required"=> "Add an image to the post",
        "selectedCategories.required"=> "You have to select at least one category!",
    ];
    public function create() {
        $this->validate();
         $post = Post::create([
            "title"=> $this->title,
            "description"=> $this->description,
            "image_url" => $this->imageUrl,
            "user_id" => Auth::id(),
        ]);
        $post->categories()->attach($this->selectedCategories);
        $this->resetInputFields();
        return redirect()->route("posts.index");
    }
    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->imageUrl = '';
    }
    public function update() {
        $this->validate();
        if (!$this->editPost) {
            session()->flash('error', 'No se encontró el post a actualizar');
            return;
        }
        $post = Post::findOrFail($this->editPost->id);
        $post->update([
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $this->imageUrl,
            'user_id' => Auth::id(),
        ]);
        $post->categories()->sync($this->selectedCategories);
        return redirect()->route('posts.index');
    }
    public function mount($id = null){
        if ($id) {
            $this->editPost = Post::findOrFail($id);
            $this->title = $this->editPost->title;
            $this->description = $this->editPost->description;
            $this->imageUrl = $this->editPost->image_url;
            $this->selectedCategories = $this->editPost->categories->pluck('id')->toArray();
        }
        $this->allCategories = Category::all();
    }
    public function render()
    {
        return view('livewire.form-post');
    }
}
