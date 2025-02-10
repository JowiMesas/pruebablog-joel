<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
class FormPost extends Component
{
    public $title;
    public $description;
    public $imageUrl;
    public $editPost = null;
    protected $rules = [
        "title"=> "required",
        "description"=> "required",
        "image_url"=> "required|url",
    ];
    protected $messages = [
        "title.required"=> "Es obligatorio añadir un titulo!",
        "description.required"=> "Necesario añadir una pequeña descripcion!",
        "image_url.required"=> "Añade una imagen al post",
        "image_url.url"=> "Se ha de añadir una URL valida!",
    ];
    public function create() {
        $this->validate();
        Post::create([
            "title"=> $this->title,
            "description"=> $this->description,
            "image_url" => $this->imageUrl,
        ]);
        $this->resetInputFields();
        return redirect()->route("posts.index");
    }
    private function resetInputFields()
    {
        dd(8);
        $this->title = '';
        $this->description = '';
        $this->imageUrl = '';
    }
    public function update() {
        $this->validate();
        $post = new Post();
        $post->update([
            'title'=> $this->title,
            'description'=> $this->description,
            'image_url'=> $this->imageUrl,
        ]);
        $this->resetInputFields();
        return redirect()->route('posts.index');
    }
    public function mount($id = null){
        if($id == null){
            $this->editPost = null;
        } else {
            $this->editPost = Post::findOrFail($id);
        }
    }
    public function render()
    {
        return view('livewire.form-post');
    }
}
