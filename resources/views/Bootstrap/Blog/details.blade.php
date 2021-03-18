@extends('Home')

@section('content')
    <div class="container" style="padding-top:10px ">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <div style="padding: 30px; margin-bottom: 60px; box-shadow: 0 4px 16px rgba(0,0,0,0.1);">
                    <div style="max-height: 440px; margin: -30px -30px 20px -30px; overflow: hidden;">
                        <img class="img-fluid" src="{{asset('images/'.$blogs->image)}}" alt="" srcset="">
                    </div>
                    <p style="font-size: 28px; font-weight: bold; padding: 0; margin: 0 0 20px 0;"><a style="color: #012970; transition:0.3s;" href="{{url('blog/'.$blogs->id)}}">{{$blogs->title}}</a></p>
                    <div style="margin-bottom: 15px; color: #4084fd;">
                        <ul style="display: flex; flex-wrap: wrap; list-style: none; align-items: center; padding: 0; margin: 0px;">
                            <li style="padding-left: 20px;"><span class="bi bi-person" style="font-size: 16px; margin-right: 8px; line-height: 0px;"></span><a style="color: #777777; font-size: 14px; display: inline-block; line-height: 1;" href="">{{$blogs->author->name}}</a></li>
                            <li style="padding-left: 20px;"><span class="bi bi-person" style="font-size: 16px; margin-right: 8px; line-height: 0px;"></span><a style="color: #777777; font-size: 14px; display: inline-block; line-height: 1;" href="">{{$blogs->category->name}}</a></li>
                            <li style="padding-left: 20px;"><span class="oi oi-comment-square" style="font-size: 16px; margin-right: 8px; line-height: 0px;"></span><a style="color: #777777; font-size: 14px; display: inline-block; line-height: 1;" href="">12 Comments</a></li>
                        </ul>
                    </div>
                    <div>
                        <p style="line-height: 24px;">{{$blogs->content}}</p>
                    </div>
                    <div style="-moz-text-align-last: right; text-align-last: right;">
                        @if (isset(Auth::user()->id) && Auth::user()->id == $blogs->author_id)
                            <a style="display: inline-block; background: #4154f1; color: #fff; padding:6px 20px; transition: 0.3s; font-size: 14px; border-radius: 4px;" href="{{url('blog/'.$blogs->id)}}">Read More</a>
                            <a style="display: inline-block; background: #4154f1; color: #fff; padding:6px 20px; transition: 0.3s; font-size: 14px; border-radius: 4px;" href="{{url('blog/'.$blogs->id)}}">Read More</a>
                        @else
                            @if (isset(Auth::user()->role) && Auth::user()->role == 'admin')
                                <a style="display: inline-block; background: #4154f1; color: #fff; padding:6px 20px; transition: 0.3s; font-size: 14px; border-radius: 4px;" href="{{url('blog/'.$blogs->id)}}">Read More</a>
                                <a style="display: inline-block; background: #4154f1; color: #fff; padding:6px 20px; transition: 0.3s; font-size: 14px; border-radius: 4px;" href="{{url('blog/'.$blogs->id)}}">Read More</a>
                            @endif
                        @endif
                        
                    </div>
                </div>
                <div class="flex align-items-center" style="padding: 20px; margin-bottom: 30px; box-shadow: 0 4px 16px rgba(0,0,0,0.1);">
                    <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" style="width: 120px; margin-right: 20px;" alt="">
                    <div>
                      <h4 style="font-weight: 600; font-size: 22px; margin-bottom: 0px; padding: 0px; color: #012970;">{{$blogs->author->name}}</h4>
                      <div style="margin: 0px 10px 10px 0;">
                        <a style="color: rgba(1,41,112,0.5); margin-right: 5px;" href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                        <a style="color: rgba(1,41,112,0.5); margin-right: 5px;" href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                        <a style="color: rgba(1,41,112,0.5); margin-right: 5px;" href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                      </div>
                      <p style="font-style: italic; color: #b7b7b7;">{{$blogs->author->email}}</p>
                </div>
                <div style="margin-bottom: 30px;">
                    @if ($blogs->comments)
                    <h4 style="font-weight: bold;">{{$blogs->comments->count()}}</h4>
                        @foreach ($blogs->comments as $comment)
                            <div style="margin-top: 30px; position: relative;">
                                <div class="d-flex">
                                    <div style="margin-right: 14px;"><img style="width: 60px;" src="assets/img/blog/comments-1.jpg" alt=""></div>
                                    <div>
                                    <h5 style="font-size: 16px; margin-bottom: 2px;"><a style="font-weight: bold; color: #444444; transition: 0.3s;">{{$comment->author->name}}</a>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if (Auth::user())
                    <div style="margin-top: 30px; padding: 30px; box-shadow: 0 4px 16px rgba(0,0,0,0.1);">
                        <h4 style="font-size: 22px; font-weight: bold;">Leave a Comment</h4>
                        <form action="">
                            <div class="row">
                                <div class="col form-group">
                                    <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div style="padding: 30px; margin: 0 0 60px 20px; box-shadow: 0 4px 16 px rgba(0,0,0,0.1);">
                    <h3 style="font-size: 20px; font-weight: 700; padding: 0px; margin: 0px 0px 15px 0; color: #012970; position: relative;">Sidebar Title</h3>
                    <div style="margin-bottom: 30px;">
                        <form style="background: #fff; border: 1px solid #ddd; padding: 3px 10px; position: relative;" action="{{url('/blog/search')}}">
                            <input class="form-controler" type="text" name="search" id="search">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 700; padding: 0px; margin: 0px 0px 15px 0; color: #012970; position: relative;">Category</h3>
                    <div>
                        <ul style="list-style: none; padding: 0px;">
                            <li style="padding-top: 10px;"><a style="color: #012970; transition: 0.3s;" href="">General <span>(25)</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection