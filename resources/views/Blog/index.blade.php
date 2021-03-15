@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
            
            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Blogs Page
                <a href="{{url('blog/create')}}">Create Blog</a>
            </header>

            <div class="w-full p-6">
                @foreach ($blogs as $blogs)
                    <p class="text-gray-700">
                        <table>
                            <tr>
                                <td class='border p-5'> | {{$blogs->title}} | </td>
                                <td class='border'> | {{$blogs->content}} | </td>
                                <td class='border'> | {{$blogs->author->name}} | </td>
                                <td class='border'> | {{$blogs->category->name}} | </td>
                                <img src="{{public_path($blogs->image)}}">
                                <td class='border'> | <a href="{{url('blog/'.$blogs->id)}}"> | Details | </a></td>
                            </tr>
                        </table>
                    </p>
                @endforeach
            </div>
        </section>
    </div>
</main>
@endsection