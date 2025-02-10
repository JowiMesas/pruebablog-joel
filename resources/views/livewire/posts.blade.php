<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <br>
                    <a class="bg-blue-400 rounded-lg p-1" href={{route('formPost')}}>New Post </a>
                    <br> <br>
                    <h1 class="bg-red-200">All Posts</h1>
                    <div class="flex">
                        @foreach ($posts as $post )
                            <div class="flex flex-col basis-64 flex-1">
                                <span>{{$post->title}}</span>
                                <span>{{$post->description}}</span>
                                <img class="h-32 w-48 object-cover" src="{{$post->image_url}}" alt="Img blog">
                                <button><a href={{route('formPost',["id" => $post->id])}}>
                                    <i class="fa-duotone fa-regular fa-pen-to-square"></i>Upload</a>
                                </button>
                                <button>
                                    <a href=""><i class="fa-solid fa-trash-can"></i>Delete</a>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
