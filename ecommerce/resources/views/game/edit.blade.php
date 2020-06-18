@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Éditer le jeu<strong>{{ $products->title }}</strong></div>
                <div class="card-body">
                    <form action="{{ route('game.update', $products) }}" method="POST">
                    @csrf
                    @method('PATCH')
                        <div class="form-group row">
                            <label for="title" class="col-md-6 col-form-label">{{ __('Titre') }}</label>
                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                                name="title" value="{{ old('title') ?? $products->title }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-6 col-form-label">{{ __('Catégorie') }}</label>
                            <div class="col-md-12">
                                <select class="form-control @error('name') is-invalid @enderror" id="categories_id" name="categories_id">
                                    @foreach ($categories as $categories)
                                        <option value="{{ $categories->id }}"><strong>{{ $categories->name }}</strong></option>
                                    @endforeach        
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-6 col-form-label">{{ __('Prix (ex: 8000 pour 80€)') }}</label>
                            <div class="col-md-12">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" 
                                name="price" value="{{ old('price') ?? $products->price }}" required autocomplete="price" autofocus>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-6 col-form-label">{{ __('Description') }}</label>
                            <div class="col-md-12">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" 
                                name="description" value="{{ old('description') ?? $products->description }}" required autocomplete="description" autofocus>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-6 col-form-label">{{ __('URL Image') }}</label>
                            <div class="col-md-12">
                                <input type="text" id="image" class="form-control" name="image" value="{{ old('image' ?? $products->image)}}"/>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier le jeu</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection