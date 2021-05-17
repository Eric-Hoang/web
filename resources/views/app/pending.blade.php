@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-5" style="font-weight: 600;font-size: 40px">Pending App </div>
    <div class="row">
        @foreach ($apps as $app)
        <div class="col-12" style="border-bottom: solid #DDDDDD	;margin-bottom: 2rem ">
            <a href="{{ route('apps.show', $app->id) }}" class="d-flex mb-4"
                style="text-decoration: none; color: initial">
                <img src="{{ $app->img_url }}" height="180px" width="180px" style="flex-grow: 0">
                <div class="d-flex justify-content-between ml-4" style="flex-grow: 1;">
                    <div class="" style="margin-bottom: .5rem;">
                        <h2>{{ $app->name }}</h2>
                        <div class="d-flex">
                            <h6 style="color: green;font-weight: 600">Playrix </h6>
                            <h6 class="ml-3" style="color: green;font-weight: 600">
                                {{ $app->categories->first()->name }}
                            </h6>
                        </div>

                        <div style=" opacity: 0.7;;height: calc(180px - 60px);overflow: hidden;text-overflow: ellipsis;"
                            class="text-justify">
                            {!! Str::limit($app->description, 500) !!}
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between flex-column flex-nowrap">
                        <div class="d-flex flex-nowrap align-items-center">
                            <form action="{{ route('apps.update', $app->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="cancel">
                                <button class="btn btn-danger">Cancel</button>
                            </form>
                            <form action="{{ route('apps.update', $app->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="approved">
                                <button class="btn btn-success ml-2">Approve</button>
                            </form>
                        </div>
                        <span>Time: {{ $app->created_at->toDateTimeString() }}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection