<div>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">
            🌍 All Posts
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-200 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">

                <h1 class="text-2xl font-bold text-center text-gray-700 mt-6">🌍 All Users' Posts</h1>

                <div class=" mt-4 mb-6 flex items-center justify-center">
                    <input type="text" wire:model="filterCategory" placeholder="Filter by category" class="px-4 py-2 border rounded-xl">
                    <button wire:click="filterPosts" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-5 rounded-xl transition-all ml-2">
                        <i class="fa-duotone fa-regular fa-magnifying-glass"></i>
                    </button>
                </div>

                @if(count($posts) === 0 && !empty($filterCategory))
                    <p class="text-center text-gray-500 mt-6">😕 No posts found for this category!</p>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
                    @foreach ($posts as $post)
                        <div class="bg-gray-200 rounded-lg shadow-md overflow-hidden flex flex-col h-full min-h-[250px]">
                            <img class="w-full h-48 object-cover" src="{{ $post->image_url }}" alt="Imagen del blog">
                            
                            <div class="p-4 flex flex-col h-full">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>

                                <p class="text-gray-800 mt-2 line-clamp-3 flex-grow">
                                    {{ $post->description }}
                                </p>

                                <div class="mt-2 flex-grow">
                                    <span class="text-gray-800 font-semibold">Categories:</span>
                                    <div class="flex flex-wrap mt-1">
                                        @foreach ($post->categories as $category)
                                            <span class="mr-2 mb-2 px-3 py-1 bg-blue-200 text-blue-800 text-xs font-medium rounded-full">
                                                {{ $category->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <p class="text-sm text-gray-600 mt-2 mb-6">
                                    <i class="fa-solid fa-user"></i> {{ $post->user->name }}
                                </p>

                                <div class="mt-auto flex justify-center">
                                    <a href="{{ route('showPost', ['id' => $post->id]) }}" 
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
                                        <i class="fa-solid fa-eye"></i>
                                        <span> Show More</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($posts->isEmpty())
                    <p class="text-center text-gray-500 mt-6">😢 No posts yet, create a new one 😃!</p>
                @endif

            </div>
        </div>
    </div>
</div>
