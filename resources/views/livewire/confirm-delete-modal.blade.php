<div x-data="{ show: false, postId: null }"
     x-show="show"
     x-on:show-modal.window="show = true; postId = $event.detail.postId"
     x-on:close-modal.window="show = false; postId = null"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display: none;">
    
    <!-- Fondo Oscuro -->
    <div x-show="show" class="fixed inset-0 bg-black bg-opacity-60 transition-opacity"></div>

    <!-- Modal -->
    <div x-show="show"
         x-transition:enter="transition-transform transition-opacity duration-300"
         x-transition:enter-start="opacity-0 scale-75"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition-transform transition-opacity duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-75"
         class="bg-white p-6 rounded-lg shadow-xl z-50 w-96">
        
        <div class="text-center mb-4 text-4xl">
            <i class="fa-duotone fa-regular fa-triangle-exclamation fa-beat" style="--fa-primary-color: #000000; --fa-secondary-color: #fff700; --fa-secondary-opacity: 1;"></i>
        </div>

        <h2 class="text-lg font-semibold text-gray-800 text-center">
            Are you sure that you want to delete this post?
        </h2>

        <div class="mt-6 flex justify-center space-x-24">
            <button x-on:click="@this.call('delete', postId)" 
                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-md font-semibold shadow-md transition-all">
                <i class="fa-regular fa-trash-check"></i> Confirm
            </button>
            <button x-on:click="show = false" 
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-md font-semibold shadow-md transition-all">
                <i class="fa-solid fa-xmark"></i> Cancel
            </button>
        </div>
    </div>
</div>
