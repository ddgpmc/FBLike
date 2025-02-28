<div class="bg-gray-100 p-3 rounded-lg mb-2">
    <p class="text-gray-800">{{ $comment->body }}</p>
    <p class="text-sm text-gray-500">- <strong>{{ $comment->user->name }}</strong> • {{ $comment->created_at->diffForHumans() }}</p>

    <button onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.toggle('hidden')" class="text-blue-500 hover:underline text-sm">
        Reply
    </button>

    <form id="reply-form-{{ $comment->id }}" action="{{ route('comments.store', $comment->post) }}" method="POST" class="mt-2 hidden">
        @csrf
        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
        <textarea name="body" rows="1" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" placeholder="Write a reply..." required></textarea>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded-lg mt-2">
            Reply
        </button>
    </form>

    @if ($comment->replies->count() > 0)
        <div class="ml-6 mt-2">
            @foreach ($comment->replies as $reply)
                <x-comment-card :comment="$reply" />
            @endforeach
        </div>
    @endif
</div>
