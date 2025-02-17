<div>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">
            <i class="fa-sharp fa-solid fa-paste"></i> Your Posts
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-200 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">

                @auth
                <div class="mb-6">
                    <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition-all"
                       href="{{ route('formPost') }}">
                        <i class="fa-solid fa-file-plus"></i> New Post
                    </a>
                </div>
                @endauth

                <h1 class="text-2xl font-bold text-center text-gray-700 mt-6">📝 Your Posts</h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
                    @foreach ($posts as $post)
                        <div class="bg-gray-200 rounded-lg shadow-md overflow-hidden flex flex-col h-full min-h-[250px]">
                            <img class="w-full h-48 object-cover" src="{{ $post->image_url }}" alt="Imagen del blog">
                            
                            <div class="p-4 flex flex-col h-full">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>

                                <p class="text-gray-800 mt-2 line-clamp-3">
                                    {{ $post->description }}
                                </p>

                                <div class="mt-auto">
                                    <div class="mt-2">
                                        <span class="text-gray-800 font-semibold">Categories:</span>
                                        <div class="flex flex-wrap mt-1">
                                            @foreach ($post->categories as $category)
                                                <span class="mr-2 mb-2 px-3 py-1 bg-blue-200 text-blue-800 text-xs font-medium rounded-full">
                                                    {{ $category->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div> 

                                    <div class="flex justify-between items-center mt-4 text-xs">
                                        <a href="{{ route('formPost', ['id' => $post->id]) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            <span>Update</span>
                                        </a>
                                        <a href="{{ route('showPost', ['id' => $post->id]) }}" 
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
                                            <i class="fa-solid fa-eye"></i>
                                            <span> Show More</span>
                                        </a>
                                        <button x-on:click="$dispatch('show-modal', { postId: {{$post->id}} })"
                                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition-all">
                                            <i class="fa-solid fa-trash-can"></i> 
                                            <span> Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center mt-6">
                    <p> {{ $posts->links() }} </p>
                </div>

                @if($posts->isEmpty())
                    <p class="text-center text-gray-500 mt-6">😢 No posts yet, create a new one 😃!</p>
                @endif
            </div>
        </div>
    </div>
    
    @include('livewire.confirm-delete-modal')
</div>
