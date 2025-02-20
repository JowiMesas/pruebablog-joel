<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10">
    <!-- Título del Post -->
    <h1 class="text-4xl font-bold text-gray-800">{{ $post->title }}</h1>
    
    <!-- Metadatos agrupados -->
    <div class="mt-2">
        <p class="text-gray-600 text-sm">
            Created by: <strong>{{ $post->user->name }}</strong>
        </p>
        <p class="text-gray-500 text-sm">
            Published at: {{ $post->getCreatedDateFormat() }}
        </p>
        <p class="text-gray-500 text-sm">
            Last updated: {{ $post->getUpdatedDateFormat() }}
        </p>
    </div>
    
    <!-- Imagen del Post -->
    <img class="w-full h-64 object-cover rounded-lg mt-3 mb-6" src="{{ $post->image_url }}" alt="Image Post">
    
    <!-- Categorías -->
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
    
    <!-- Descripción -->
    <p class="mt-2 mb-6 text-gray-700 text-lg leading-relaxed">
        {{ $post->description }}
    </p>
    
    <!-- Comentarios -->
    @if ($post->comments && $post->comments->isNotEmpty())
        <div>
            <h2 class="text-lg font-bold mb-2">
                <i class="fa-duotone fa-regular fa-comments"></i> Comments 
            </h2>
            @foreach ($post->comments as $comment)
                <div class="bg-blue-100 p-3 rounded-xl shadow-sm mb-3 border">
                    <p class="text-black">{{ $comment->content }}</p>
                    <!-- Usuario y fecha en líneas separadas -->
                    <small class="block text-gray-800">
                        By: <i class="fa-solid fa-user"></i> {{ $comment->user->name }}
                    </small>
                    <small class="block text-gray-600">
                        Created at: {{ $comment->getCreatedDateFormat() }}
                    </small>
                    
                    <!-- Respuestas al comentario -->
                    @if ($comment->replies && $comment->replies->isNotEmpty())
                        <div class="mt-2 ml-4 border-l pl-3">
                            <h2 class="text-base font-bold">
                                <i class="fa-solid fa-reply-all"></i> Replies
                            </h2>
                            @foreach ($comment->replies as $reply)
                                <div class="bg-green-300 p-2 rounded-xl mb-2 border">
                                    <p>{{ $reply->content }}</p>
                                    <small class="block text-gray-800">
                                        By: <i class="fa-solid fa-user"></i> {{ $reply->user->name }}
                                    </small>
                                    <small class="block text-gray-600">
                                        Created at: {{ $reply->getCreatedDateFormat() }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
    
    <!-- Botón para volver atrás -->
    <div class="mt-8 text-center">
        <a href="{{ route('all.posts') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-all">
            <i class="fa-solid fa-house"></i> BACK
        </a>
    </div>
</div>
