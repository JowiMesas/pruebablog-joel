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

                <div class="mt-4 mb-6 flex items-center justify-center">
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
                        <div class="bg-gray-200 rounded-lg shadow-md overflow-hidden flex flex-col h-full min-h-[250px] max-h-[500px] overflow-y-auto">
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

                                <div class="mt-4">
                                    @auth
                                        <div class="mt-4 flex justify-center sm:justify-start">
                                            <button wire:click="$set('postIdFormComment', {{$post->id}})"
                                                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition-all w-full sm:w-auto">
                                                <i class="fa-duotone fa-regular fa-comment-plus"></i> Add
                                            </button>
                                        </div>
                                        
                                        @if ($postIdFormComment === $post->id)
                                            <form wire:submit.prevent="createComment({{$post->id}})" class="mt-2">
                                                <textarea wire:model="commentContent"
                                                    class="w-full border rounded p-2" placeholder="Write your comment">
                                                </textarea>
                                                @error('commentContent')
                                                    <span class="text-red-500">
                                                        <i class="fa-solid fa-triangle-exclamation fa-beat"></i>{{$message}}</span>
                                                @enderror
                                                <div class="mt-2 flex space-x-2">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition-all">
                                                        Send Comment
                                                    </button>
                                                    <button type="button" wire:click="$set('postIdFormComment', null)"
                                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded transition-all">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                    @endauth

                                    @if ($post->comments && $post->comments->isNotEmpty())
                                        <div class="mt-4 p-4 border-t">
                                            <h4 class="text-lg font-bold mb-2">Comments:</h4>
                                            @foreach ($post->comments as $comment)
                                                <div class="bg-white p-3 rounded shadow-sm mb-3 border">
                                                    <p class="text-gray-800">{{ $comment->content }}</p>
                                                    <small class="text-gray-500">
                                                        <i class="fa-solid fa-user"></i> {{ $comment->user->name }}</small>
                                                    @auth
                                                        <div class="mt-2">
                                                            <button wire:click="$set('commentIdFormReplies', {{$comment->id}})"
                                                                class="text-blue-500 text-sm">
                                                                Reply
                                                            </button>
                                                            @if ($commentIdFormReplies === $comment->id)
                                                                <form wire:submit.prevent="createReply({{$comment->id}})" class="mt-2">
                                                                    <textarea wire:model="replyContent"
                                                                        class="w-full border rounded p-2" placeholder="Write your reply">
                                                                    </textarea>
                                                                    @error('replyContent')
                                                                        <span class="text-red-500">
                                                                            <i class="fa-solid fa-triangle-exclamation fa-beat"></i>
                                                                             {{$message}}</span>
                                                                    @enderror
                                                                    <div class="mt-2 flex space-x-2">
                                                                        <button type="submit" 
                                                                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded transition-all">
                                                                            Send Reply
                                                                        </button>
                                                                        <button type="button" wire:click="$set('commentIdFormReplies', null)"
                                                                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded transition-all">
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    @endauth

                                                    @if ($comment->replies && $comment->replies->isNotEmpty())
                                                        <div class="mt-2 ml-4 border-l pl-3">
                                                            @foreach ($comment->replies as $reply)
                                                                <div class="bg-gray-100 p-2 rounded-xl mb-2 border">
                                                                    <p>{{ $reply->content }}</p>
                                                                    <small class="text-gray-500">
                                                                        <i class="fa-solid fa-user"></i>  {{ $reply->user->name }}</small>
                                                                </div>                                                                   
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($posts->isEmpty())
                    <p class="text-center text-gray-500 mt-6">😢 No posts yet, create a new one 😃!</p>
                @endif

                <div class="flex justify-center mt-6">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
