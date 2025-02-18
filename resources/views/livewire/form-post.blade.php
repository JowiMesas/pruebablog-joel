<div class="bg-blue-200">
    <h2 class="text-3xl font-bold text-gray-800 text-center">
        {{ $editPost ? ' ✏️ Update a Post' : ' 📝Create a Post' }}</h2>
    <form class="space-y-6" wire:submit.prevent="{{ $editPost ? 'update' : 'create' }}">
        <div class="flex items-center flex-col">
            <label name="title" class="block text-lg font-semibold m-4 text-gray-700">Title: </label>
            <input type="text" wire:model="title" name="title" placeholder="Add your title" 
            class="w-96 p-3 border border-gray-500 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('title')
            <span class="text-red-500 text-sm font-bold">
                <i class="fa-duotone fa-regular fa-circle-exclamation fa-beat"></i> {{$message}}</span> 
            @enderror
        </div>
    
    <div class="flex items-center flex-col">
        <label name="description" class="block text-lg font-semibold m-4 text-gray-700">Description: </label>
        <textarea wire:model="description" name="description" placeholder="Introduce a description" 
        class="w-96 p-3 border border-gray-500 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </textarea>
        @error('description')
        <span class="text-red-500 text-sm font-bold">
            <i class="fa-duotone fa-regular fa-circle-exclamation fa-beat"></i> {{$message}}</span> 
        @enderror
    </div>
    <div class="flex items-center flex-col">
        <label name="categories" class="block text-lg font-semibold m-4 text-gray-700">Categories: </label>
        <select name="categories" wire:model="selectedCategories" multiple class="w-96 p-2 border rounded">
            @foreach ($allCategories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <p class="text-sm text-gray-500  mt-1">
            <i class="fa-duotone fa-regular fa-circle-info"></i>
             Press Ctrl (or Command on Mac) to select multiple options or deselect one.
        </p>
        @error("selectedCategories")
            <span class="text-red-500 text-sm font-bold">
                <i class="fa-duotone fa-regular fa-circle-exclamation fa-beat"></i> {{$message}}
            </span>
        @enderror
    </div>
    <div class="flex items-center flex-col">
        <label name="imgUrl" class="block text-lg font-semibold m-4 text-gray-700">Url Image: </label>
    <input type="url" wire:model="imageUrl" name="imgUrl" placeholder="Image in your post" 
    class="w-96 p-3 border border-gray-500 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
    @error('imageUrl')
    <span class="text-red-500 text-sm font-bold">
        <i class="fa-duotone fa-regular fa-circle-exclamation fa-beat"></i> {{$message}}</span> 
    @enderror
    </div>
    <br> 
    <div class="text-center">
        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg 
        transition-all shadow-md" type="submit">
            {{ $editPost ? 'Update Post' : 'Send Post' }}
        </button>
    </div>

</form>
<form></form>
</div>
