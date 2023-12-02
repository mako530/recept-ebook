@extends('layouts.app')

@section('content')
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url('{{ $category->fullImagePath }}');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="best-receipe-area mt-5">
        <div class="container">
            <div class="row">
                @forelse ($recipes as $recipe)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            @if($recipe->image)
                                <img src="{{ $recipe->fullImagePath }}" alt="{{ $recipe->title }}" style="height:250px">
                            @endif
                            <div class="receipe-content">
                                <a href="{{ route('recipe.show', $recipe) }}">
                                    <h5>{{ $recipe->title }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 mt-5">
                        <div class="alert alert-warning">
                            Nem található recept ebben a kategóriában!
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
