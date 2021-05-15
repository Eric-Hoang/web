@extends('layouts.app')

@section('content')

<div style="background-image: url('/images/bgTheCao.png'); background-repeat: no-repeat; background-attachment: fixed;
background-position: center; height: 100vh">

    <div class="container">
        <div class="col-xs-12 labell text-center">
            <h1 style="
        font-size: 3rem;
        font-weight:500;
        margin-left: 0.75rem;
        color: rgb(0, 0, 0);">DEPOSIT</h1>
        </div>
        <h5 class="text-center text-monospace font-italic" style="opacity: 0.8;">Welcome to our recharge page!</h5>
        <form id="fm1" class="fm-v clearfix " action="" method="post">
            @csrf
            @if (session('message'))
            <div class="alert alert-{{ session('status') }}" role="alert">
                {{ session('message') }}
            </div>
            @endif
            <div id="list-taythecham">
                <div class="row" style="margin-bottom: 10px; margin-top: 100px;">
                    <div class="col">

                        <div class="form-group">
                            <x-input name="cardNumber" class="form-control" type="text" placeholder="Card Number"
                                autofocus="">
                            </x-input>
                        </div>
                        <div class="form-group">
                            <x-input name="seri" class="form-control" type="text" placeholder="Serial" autofocus="">
                            </x-input>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear-fix"></div>
            <div class="form-group text-center" style="">

            </div>
            <div align="center" class="col-md-12">


                <div class="clearfix"></div>

                <button type="submit" class="btn btn-danger btn-lg" id="btnSubmitRegister" accesskey="Enter"><i
                        class="fa fa-check-circle-o" aria-hidden="true"></i> Send</button>
            </div>
            {{-- Deposit history --}}
            <table class="table table-hover ">
                <h2 align="center" style="margin-top: 5rem; color: #33FF66;font-weight: 900	"> Deposit History </h2>
                <thead>
                    <tr class="table-danger">
                        <th scope="col">Number</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Card Number</th>
                        <th scope="col">Seri Number</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deposits as $deposit)
                    <tr>
                        <td>{{$loop->index}}</td>
                        <td>{{ number_format($deposit->card->amount) }} VND</td>
                        <td>{{ $deposit->card->number }}</td>
                        <td>{{ $deposit->card->seri }}</td>
                        <td>{{ $deposit->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    </form>
</div>


</div>
@endsection