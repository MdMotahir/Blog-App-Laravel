@extends('layouts.app')

@section('content')



@if (Auth::user())
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{url('/blog')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Title :
                            </label>
                            <input class='border-2 border-red-500' id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                                name="title" required>

                            @error('title')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            Content :
                            </label>

                            <textarea id="content"
                                class="form-input w-full border @error('content') border-red-500 @enderror" name="content" required></textarea>

                            @error('content')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Image :
                            </label>
                            <input id="image" type="file" class="form-input w-full @error('title')  border-red-500 @enderror"
                                name="image" required>

                            @error('title')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="Blog Bategory" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Blog Category:
                            </label>
                            <select id="category" name="category">
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>    
                                @endforeach
                            </select>
                        </div>

                        <p><div class="flex flex-wrap">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                Create Blog
                            </button>
                        </div></p>
                    </form>

                </section>
            </div>
        </div>
    </main>
@endif
@endsection
