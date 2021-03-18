@extends('Home')

@section('content')
    <div class="container">
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
                @foreach ($blogs as $blog)
                    <div style="padding: 30px; margin-bottom: 60px; box-shadow: 0 4px 16px rgba(0,0,0,0.1);">
                        <div style="max-height: 440px; margin: -30px -30px 20px -30px; overflow: hidden;">
                            <img class="img-fluid" src="{{asset('images/'.$blog->image)}}" alt="" srcset="">
                        </div>
                        <p style="font-size: 28px; font-weight: bold; padding: 0; margin: 0 0 20px 0;"><a style="color: #012970; transition:0.3s;" href="{{url('blog/'.$blog->id)}}">{{$blog->title}}</a></p>
                        <div style="margin-bottom: 15px; color: #4084fd;">
                            <ul style="display: flex; flex-wrap: wrap; list-style: none; align-items: center; padding: 0; margin: 0px;">
                                <li style="padding-left: 20px;"><span class="oi oi-person" style="font-size: 16px; margin-right: 8px; line-height: 0px;"></span><a style="color: #777777; font-size: 14px; display: inline-block; line-height: 1;" href="">{{$blog->author->name}}</a></li>
                                <li style="padding-left: 20px;"><span class="oi oi-person" style="font-size: 16px; margin-right: 8px; line-height: 0px;"></span><a style="color: #777777; font-size: 14px; display: inline-block; line-height: 1;" href="">{{$blog->category->name}}</a></li>
                                <li style="padding-left: 20px;"><span class="oi oi-comment-square" style="font-size: 16px; margin-right: 8px; line-height: 0px;"></span><a style="color: #777777; font-size: 14px; display: inline-block; line-height: 1;" href="">12 Comments</a></li>
                            </ul>
                        </div>
                        <div>
                            <p style="line-height: 24px;">{{$blog->content}}</p>
                            <div style="-moz-text-align-last: right; text-align-last: right;">
                                <a style="display: inline-block; background: #4154f1; color: #fff; padding:6px 20px; transition: 0.3s; font-size: 14px; border-radius: 4px;" href="{{url('blog/'.$blog->id)}}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination">
                    <ul class="justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div style="padding: 30px; margin: 0 0 60px 20px; box-shadow: 0 4px 16 px rgba(0,0,0,0.1);">
                    <h3 style="font-size: 20px; font-weight: 700; padding: 0px; margin: 0px 0px 15px 0; color: #012970; position: relative;">Sidebar Title</h3>
                    <div style="margin-bottom: 30px;">
                        <form style="background: #fff; border: 1px solid #ddd; padding: 3px 10px; position: relative;" action="">
                            <input class="form-controler" type="text" name="" id="">
                            <button type="submit"><span class="oi oi-search"></span></button>
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