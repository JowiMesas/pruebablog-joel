<div>
    <form wire:submit.prevent="{{ $editPost ? 'update' : 'create' }}">
        <input type="text" wire:model="title" placeholder="Add your title">
        @error('title')
            {{$message}}
        @enderror
    <br>
    <input type="text" wire:model="description" placeholder="Introduce a description">
    @error('description')
        {{$message}}
    @enderror
    <br>
    <input type="url" wire:model="imageUrl" placeholder="Image in your post">
    @error('imageUrl')
    {{$message}}        
    @enderror
    <br><br>
    <button class="bg-lime-400 rounded-lg p-2" type="submit">
        {{ $editPost ? 'Update Post' : 'Send Post' }}
    </button>
</form>
<form></form>
</div>
