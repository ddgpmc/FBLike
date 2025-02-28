@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">

        <div class="mb-6">
            <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
            <p class="text-gray-700 mt-2">{{ $post->body }}</p>
            <p class="text-sm text-gray-500 mt-2">Posted by: <strong>{{ $post->user->name }}</strong></p>
        </div>

        <h2 class="text-xl font-semibold mt-6 mb-4">Comments</h2>

        <div class="space-y-4">
            @foreach ($comments as $comment)
                <x-comment-card :comment="$comment" />
            @endforeach
        </div>

        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-6">
            @csrf
            <textarea name="body" rows="3" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" placeholder="Write a comment..." required></textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg mt-2">
                Comment
            </button>
        </form>
    </div>
@endsection
