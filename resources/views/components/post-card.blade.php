<div class="bg-white p-4 rounded-lg shadow-md flex flex-col h-full w-full md:w-[600px] mx-auto">
    <!-- Post Header -->
    <div class="flex items-center space-x-3">
        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
            <span class="text-gray-700 font-bold">{{ strtoupper(substr($post->user->name, 0, 1)) }}</span>
        </div>
        <div>
            <p class="font-semibold">{{ $post->user->name }}</p>
            <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
        </div>
    </div>

    <!-- Post Content -->
    <div class="flex-grow">
        <h2 class="text-xl font-bold text-gray-900 mt-3">{{ $post->title }}</h2>
        <p class="text-gray-800 mt-1">{{ $post->body }}</p>

        @if ($post->image)
            <div class="mt-3 w-full h-100 rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-full object-cover">
            </div>
        @endif
    </div>

    <!-- Actions (Edit, Delete, Comment) -->
    <div class="flex justify-between items-center mt-4 text-gray-500 text-sm">
        <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-500">💬 Comment</a>

        @if(auth()->id() === $post->user_id)
            <div class="flex space-x-2">
                <a href="{{ route('posts.edit', $post) }}" class="hover:text-yellow-500">✏️ Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="hover:text-red-500">🗑️ Delete</button>
                </form>
            </div>
        @endif
    </div>

    <!-- Comments Section -->
    <div class="mt-4 border-t pt-4">
        <h3 class="text-lg font-semibold mb-2">Comments</h3>

        @foreach ($post->comments->whereNull('parent_id')->take(3) as $comment)
            <x-comment-card :comment="$comment" />
        @endforeach

        @if($post->comments->whereNull('parent_id')->count() > 3)
            <div class="mt-2">
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline text-sm">
                    Show all comments ({{ $post->comments->count() }})
                </a>
            </div>
        @endif

        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-2">
            @csrf
            <textarea name="body" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" placeholder="Write a comment..." required></textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-lg mt-2">
                Comment
            </button>
        </form>
    </div>
</div>
