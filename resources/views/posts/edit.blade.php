@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">

        <h2 class="text-xl font-semibold mb-4">Edit Post</h2>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>
            </div>

            <div class="mb-4">
                <label for="body" class="block font-medium text-gray-700">Post</label>
                <textarea id="body" name="body" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" required>{{ $post->body }}</textarea>
            </div>

            @isset($post->image)
                <div class="mb-4">
                    <p class="font-medium text-gray-700">Current Image:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="rounded-lg w-full object-cover">
                </div>
            @endisset

            <div class="mb-4">
                <label for="image" class="block font-medium text-gray-700">Replace Image (Optional)</label>
                <input type="file" id="image" name="image" class="w-full border border-gray-300 rounded-lg p-2" accept="image/*">
            </div>

            <div class="text-right">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg">
                    Update Post
                </button>
            </div>
        </form>
    </div>
@endsection
