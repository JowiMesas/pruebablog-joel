<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <h1 class="text-4xl font-bold text-gray-800">{{$post->title}}</h1>
    <p class="text-gray-500 mt-2 text-sm"> Publicated at: {{$post->getCreatedDateFormat()}}</p>
    <p class="text-gray-500 mt-2 text-sm"> Last updated: {{$post->getUpdatedDateFormat()}} </p>

    <img class="w-full h-64 object-cover rounded-lg mt-6" src="{{$post->image_url}}" alt="Image Post">
    <p class="mt-6 text-gray-700 text-lg leading-relaxed">{{$post->description}}</p>
    <div class="mt-6">
        <a href="{{route('posts.index')}}" 
        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
            <i class="fa-solid fa-house"></i></i> BACK</a>
    </div>
</div>
