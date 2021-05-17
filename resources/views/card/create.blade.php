@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('cards.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="number" name="amount" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Amount">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Card Price</label>
                    <select class="form-control" name="price" id="exampleFormControlSelect1">
                        <option selected value="50000">50.000 vnd</option>
                        <option value="100000">100.000 vnd</option>
                        <option value="200000">200.000 vnd</option>
                        <option value="500000">500.000 vnd</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection