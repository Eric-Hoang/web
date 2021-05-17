@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('cards.create') }}" class="btn btn-success">Add card</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Seri</th>
                        <th scope="col">Price</th>
                        <th scope="col">Used</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cards as $card)
                    <tr>
                        <td>{{ $card->number }}</td>
                        <td>{{ $card->seri }}</td>
                        <td>{{ $card->amount }}</td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1{{$card->id}}"
                                    @if($card->used)
                                checked
                                @endif>
                                <label class="custom-control-label" for="customCheck1"></label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection