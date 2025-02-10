<div>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">
            <i class="fa-sharp fa-solid fa-paste"></i> Posts
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="mb-6">
                    <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition-all"
                       href="{{ route('formPost') }}">
                        <i class="fa-solid fa-file-plus"></i> New Post
                    </a>
                </div>

                <h1 class="text-xl font-bold text-center text-gray-700 mb-6">📝 All  Posts</h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                    @foreach ($posts as $post)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img class="w-full h-48 object-cover" src="{{ $post->image_url }}" alt="Imagen del blog">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                                <p class="text-gray-600 mt-2">{{ $post->description }}</p>
                                <div class="flex justify-between items-center mt-4">
                                    <a href="{{ route('formPost', ['id' => $post->id]) }}"
                                       class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
                                        <i class="fa-solid fa-pen-to-square"></i> Update
                                    </a>
                                    <button wire:click="delete({{ $post->id }})"
                                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition-all">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($posts->isEmpty())
                    <p class="text-center text-gray-500 mt-6">😢 No posts yet, create a new one!</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
