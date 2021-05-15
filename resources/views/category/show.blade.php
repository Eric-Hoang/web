@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($apps as $app)
        <div class="col-12">
            <a href="{{ route('apps.show', $app->id) }}" class="d-flex mb-4"
                style="text-decoration: none; color: initial">
                <img src="{{ $app->img_url }}" height="180px" width="180px" style="flex-grow: 0">
                <div class="d-flex justify-content-between ml-4" style="flex-grow: 1;">
                    <div class="" style="margin-bottom: .5rem">
                        <h2>{{ $app->name }}</h2>
                        <h6 style="color: green;font-weight: 600">Playrix </h6>
                        <div style=" height: calc(180px - 60px);overflow: hidden;text-overflow: ellipsis;">
                            {!! Str::limit($app->description, 500) !!}
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between flex-column flex-nowrap">
                        <div class="d-flex flex-nowrap align-items-center">
                            <x-rating :rate="$app->avgRate()"></x-rating>

                            <span style="font-weight: 500; font-size: .875"
                                class="ml-2 text-muted">{{ $app->download_count }}
                            </span>
                            <i class="fas fa-user fa-xs ml-2"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection