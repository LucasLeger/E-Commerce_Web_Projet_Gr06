@extends('layouts.master')

@section('content')
    <div>
        <h1> Votre commande a bien été prise en compte !</h1>
    </div>
    <div>
        <a href="{{ route('order.pdf',$id) }}" class="btn btn-primary">Téléchargez votre code</a>
    </div>
@endsection