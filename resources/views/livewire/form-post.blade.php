<div>
<form wire:submit.prevent="{{$editPost ? "create" : "update"}}">
    <input type="text" wire:model="title" {{$editPost ? "value=`{$editPost->title}`" : ''}} placeholder="Add your title">
    <br>
    <input type="text" wire:model="description" placeholder="Introduce a description">
    <br>
    <input type="url" wire:model="imageUrl" placeholder="Image in your post (optional)">
    <br><br>
    <button class="bg-lime-400 rounded-lg p-2" type="submit">Send Post</button>
</form>
<form></form>
</div>
