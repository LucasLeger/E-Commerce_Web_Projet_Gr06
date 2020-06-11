@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gérer les jeux</div>
                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                            <td>{{ $product->title }}</td>
                            <td>
                                <a href="{{ route('game.edit', $product->id) }}"><button class="btn btn-primary">Éditer</button></a>
                                <a href="{{ route('game.destroy', $product->id) }}"><button class="btn btn-warning">Supprimer</button></a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection