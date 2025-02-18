<div x-data="{ isOpen: false, postId: null }"
     x-on:open-modal.window="isOpen = true; postId = $event.detail.postId"
     x-on:close-modal.window="isOpen = false"
     x-show="isOpen"
     style="display: none;"
     class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div x-on:click="isOpen = false" class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h2 class="text-3xl font-bold text-gray-800 text-center">
                    {{ $editPost ? ' ✏️ Update a Post' : ' 📝Create a Post' }}
                </h2>
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
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button x-on:click="$dispatch('close-modal')" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>