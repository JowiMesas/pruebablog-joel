<div x-data="{ show: false}" 
     x-show="show" 
     x-on:show-modal.window="show = true;"
     x-on:close-modal.window="show = false" 
     class="fixed inset-0 overflow-y-auto z-90">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold text-gray-800">Are you sure that you want to delete this post?</h2>
            <div class="mt-4 flex justify-end space-x-4">
                <button x-on:click="$wire.delete({{$post->id}})" 
                        class="bg-red-500 text-white px-4 py-2 rounded">
                    <i class="fa-regular fa-trash-check"></i> Confirm
                </button>
                <button @click="show = false" 
                        class="bg-gray-500 text-white px-4 py-2 rounded">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>