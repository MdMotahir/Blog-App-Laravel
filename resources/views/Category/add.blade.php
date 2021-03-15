@extends('layouts.app')

@section('content')
@if (Auth::user())
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{url('admin/category')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                Category Name :
                            </label>
                            <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                                name="name" required>

                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            description :
                            </label>

                            <textarea id="description"
                                class="form-input w-full border @error('description') border-red-500 @enderror" name="description" required></textarea>

                            @error('description')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <p><div class="flex flex-wrap">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                Create Category
                            </button>
                        </div></p>
                    </form>

                </section>
            </div>
        </div>
    </main>
@endif
@endsection
