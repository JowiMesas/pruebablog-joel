<div>
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">
        {{ $editPost ? ' ✏️ Update a Post' : ' 📝Create a Post' }}</h2>
    <form class="" wire:submit.prevent="{{ $editPost ? 'update' : 'create' }}">
        <label name="title">Title: </label>
        <input type="text" wire:model="title" name="title" placeholder="Add your title">
        @error('title')
        <span class="text-red-500 text-sm font-bold">
            <i class="fa-duotone fa-regular fa-circle-exclamation"></i> {{$message}}</span> 
        @enderror
    <br><br>
    <label name="description">Description: </label>
    <textarea wire:model="description" name="description" placeholder="Introduce a description"></textarea>
    @error('description')
    <span class="text-red-500 text-sm font-bold">
        <i class="fa-duotone fa-regular fa-circle-exclamation"></i> {{$message}}</span> 
    @enderror
    <br> <br>
    <label name="imgUrl">Url Image: </label>
    <input type="url" wire:model="imageUrl" name="imgUrl" placeholder="Image in your post">
    @error('imageUrl')
    <span class="text-red-500 text-sm font-bold">
        <i class="fa-duotone fa-regular fa-circle-exclamation"></i> {{$message}}</span> 
    @enderror
    <br><br>
    <button class="bg-lime-400 rounded-lg p-2" type="submit">
        {{ $editPost ? 'Update Post' : 'Send Post' }}
    </button>
</form>
<form></form>
</div>
