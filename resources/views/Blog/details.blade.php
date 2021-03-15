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
            </header>

            <div class="w-full p-6">
                <p class="p-5"> | {{$blogs->title}} | </p>
                <p class="p-5"> | {{$blogs->content}} | </p>
                <p class="p-5"> | {{$blogs->author->name}} | </p>
                <p class="p-5"> | {{$blogs->category->name}} | </p>
                <p class="p-5"><img src="{{asset('images/'.$blogs->image)}}"></p>
                @if (isset(Auth::user()->id) && Auth::user()->id == $blogs->author_id)
                    <p class="p-5"><a href="{{url('blog/'.$blogs->id.'/edit')}}"> | Update | </a></p>
                    <p class="p-5"><a href="{{url('blog/'.$blogs->id.'/delete')}}"> | Delete | </a></p>
                @endif
            </div>
            <div>
                <p>Comments</p>
                <div>
                    @if ($blogs->comments)
                        @foreach ($blogs->comments as $comment)
                            <p>{{$comment->comment}}</p>
                            <p>{{$comment->author->name}}</p>
                        @endforeach
                    @endif
                </div>
            </div>
            @if (Auth::user())
                <form method='POST' action="{{url('blog/'.$blogs->id.'/save_comment')}}">
                    @csrf
                    <label for="comment">Your Comment please</label>
                    <input type="text" name='comment' required>
                    <button type="submit">submit</button>
                </form>
            @endif
        </section>
    </div>
</main>
@endsection