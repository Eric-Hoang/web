@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        @foreach ($categories as $category)
        <li class="nav-item">
            <a class="nav-link @if($app->categories->pluck('id')->contains($category->id)) active @endif"
                href="#">{{ $category->name }}</a>
        </li>
        @endforeach
    </ul>

    <div class="row flex-nowrap">
        <div class="card p-4 col-9" style="margin-top: 2rem; ">
            <div class="d-flex">
                <img src="{{ $app->img_url }}" height="180px" width="180px" style="flex-grow: 0">
                <div class="d-flex justify-content-between ml-4" style="flex-grow: 1;">
                    <div class="" style="margin-bottom: .5rem">
                        <h2>{{ $app->name }}</h2>
                        <div class="d-flex">
                            <h6 style="color: green;font-weight: 600">Playrix </h6>
                            <h6 class="ml-3" style="color: green;font-weight: 600">
                                {{ $app->categories->first()->name }}
                            </h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between flex-column flex-nowrap">
                        <div class="d-flex flex-nowrap align-items-center">
                            <x-rating :rate="$avgRate"></x-rating>

                            <span style="font-weight: 500; font-size: .875"
                                class="ml-2 text-muted">{{ $app->download_count }}
                            </span>
                            <i class="fas fa-user fa-xs ml-2"></i>
                        </div>
                        <div>
                            <button type="button"
                                class="btn btn-success btn-lg">{{ $app->is_paid ? 'Buy ' . $app->price : 'Install' }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($app->screen_shot as $screen_shot)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img class="d-block w-75 mx-auto" height="400px" src="{{ $screen_shot }}" alt="First
                        slide">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="text-justify mt-4 " style="opacity: 0.7">
                    {!!$app->description!!}
                    <div style=" border-top:solid 1px #BBBBBB;margin-top: 2rem"></div>
                </div>
                <div class="form-group mt-4" style="position: relative">
                    <form method="POST" action="{{ route('apps.comments.store', $app->id) }}">
                        @csrf
                        <input type="hidden" id="rating" name="rate">
                        <textarea name="content" class="form-control" style="padding-right: 240px"
                            placeholder="Write a comment..." rows="3"></textarea>
                        <section class='rating-widget'>
                            <div class='rating-stars text-center'>
                                <ul id='stars' style="position: absolute; top: .25rem; right: .25rem">
                                    <li class='star' title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                </ul>
                            </div>
                        </section>
                        <div class="w-100 d-flex justify-content-end">
                            <button class="btn btn-success mt-2" style="flex-grow: 0" @guest disabled @endguest>
                                {{ Auth::check() ? 'Comment' : 'Login to comment' }}
                            </button>
                        </div>
                    </form>
                </div>
                @foreach ($app->comments as $comment)
                <div class="mt-4 d-flex">
                    <img src="{{ $comment->user->avatar_url }}" class="d-block " height="48px" width="48px"
                        style="border-radius: 9999px ">
                    <div class="ml-2" x-data="{editing: false}">
                        <h6 style="font-weight:600">{{$comment->user->name}}</h6>
                        <div class="d-flex align-items-center" style="margin-bottom: .5rem">
                            <x-rating :rate="$comment->rate"></x-rating>
                            <span style="font-weight: 500; font-size: .875"
                                class="ml-2 text-muted">{{ $comment->created_at->toDateString() }}</span>
                        </div>
                        <span style="opacity: 0.8" x-show="!editing">{{ $comment->content }}</span>
                        @if ($comment->user_id === Auth::id())
                        <i class=" fas fa-pen ml-2" x-show="!editing" @click="editing = true"></i>
                        <div x-show="editing" style="display: none">
                            <form method="POST" action="{{ route('apps.comments.update', [$app->id, $comment->id]) }}">
                                @csrf
                                @method('PUT')
                                <textarea name="content" class="form-control" style="padding-right: 240px"
                                    placeholder="Write a comment..." rows="3">{{ $comment->content }}</textarea>
                                <div class="d-flex justify-content-end mt-2">
                                    <button class="btn" @click="editing = false">Cancel</button>
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card p-4 col-3 ml-2" style="margin-top: 2rem; ">
            <div style="border-left: 0px;border-top: 0px;font-size: 25px;font-weight: 600"
                class="d-flex justify-content-center"> RELATED
            </div>
            @foreach ($relatedApps as $relatedApp)
            <a href="{{ route('apps.show', $relatedApp->id) }}" style="text-decoration: initial; color: black">
                <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                    <img src="{{ $relatedApp->img_url }}" height="100px" width="100px">
                    <span style="font-size: 14px; font-weight: 600">{{ $relatedApp->name }}</span>
                    <div>
                        <x-rating :rate="$relatedApp->avgRate()"></x-rating>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endsection
    @section('script')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <style>
        /* Rating Star Widgets Style */
        .rating-stars ul {
            list-style-type: none;
            padding: 0;

            -moz-user-select: none;
            -webkit-user-select: none;
        }

        .rating-stars ul>li.star {
            display: inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul>li.star>i.fa {
            font-size: 2.5em;
            /* Change the size of the stars */
            color: #ccc;
            /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul>li.star.hover>i.fa {
            color: #FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul>li.star.selected>i.fa {
            color: #FF912C;
        }
    </style>
    <script>
        $(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        $('#rating').val(ratingValue)
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    
  });
  
  
});
    </script>
    @endsection