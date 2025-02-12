<div>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">
             🌍 All Posts
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-200 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h1 class="text-xl font-bold text-center text-gray-700 mb-6">🌍 All Users' Posts</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                    @foreach ($posts as $post)
                        <div class="bg-gray-200 rounded-lg shadow-md overflow-hidden">
                            <img class="w-full h-48 object-cover" src="{{ $post->image_url }}" alt="Imagen del blog">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                                <p class="text-gray-800 mt-2">{{ $post->description }}</p>
                                <p class="text-sm text-gray-600 mt-2">
                                     <i class="fa-duotone fa-thin fa-user"></i> {{ $post->user->name }}</p>
                                <div class="flex justify-between items-center mt-4  text-xs">
                                    <a href="{{route('showPost', ['id' => $post->id])}}" 
                                        class= " bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
                                        <i class="fa-solid fa-eye"></i>
                                         <span> Show More</span>
                                    </a>
                                    @if ($post->user_id === Auth::user()->id)
                                    <a href="{{ route('formPost', ['id' => $post->id]) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
                                         <i class="fa-solid fa-pen-to-square"></i>
                                         <span>Update</span>
                                     </a>
                                    @endif
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

