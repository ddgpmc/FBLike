@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-[80vh]">
        <div class="max-w-2xl w-full bg-white p-6 rounded-lg shadow-md">

            <h2 class="text-xl font-semibold mb-4 text-center">Create a Post</h2>

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" placeholder="Enter a title" required>
                </div>

                <div class="mb-4">
                    <textarea id="body" name="body" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" placeholder="What's on your mind?" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block font-medium text-gray-700">Upload an Image</label>
                    <input type="file" id="image" name="image" class="w-full border border-gray-300 rounded-lg p-2" accept="image/*">
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                        Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
