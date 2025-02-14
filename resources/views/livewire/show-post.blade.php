<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <h1 class="text-4xl font-bold text-gray-800">{{$post->title}}</h1>
    <p class="text-gray-500 mt-2 text-sm"> Publicated at: {{$post->getCreatedDateFormat()}}</p>
    <p class="text-gray-500 mt-2 text-sm"> Last updated: {{$post->getUpdatedDateFormat()}} </p>
    <p class="text-gray-600 mt-2 text-sm">Created by: <strong>{{$post->user->name}}</strong></p>

    <img class="w-full h-64 object-cover rounded-lg mt-3 mb-6" src="{{$post->image_url}}" alt="Image Post">
    <div class="mb-6">
        <span class="font-semibold text-gray-700">Categories:</span>
        <div class="flex flex-wrap mt-1">
            @foreach($post->categories as $category)
                <span class="mr-2 mb-2 px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                    {{ $category->name }}
                </span>
            @endforeach
        </div>
    </div>
    <p class="mt-2 mb-6 text-gray-700 text-lg leading-relaxed">{{$post->description}}</p>
    <div class="mt-8 text-center">
        <a href="{{route('all.posts')}}" 
        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
            <i class="fa-solid fa-house"></i></i> BACK</a>
    </div>
</div>
