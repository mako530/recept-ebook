@extends('layouts.app')

@section('content')
    <div class="breadcumb-area bg-img bg-overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Profilom</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="best-receipe-area mt-4">
        <div class="container">
            <h3>Receptjeim</h3>
            <div class="row">
                @forelse (($recipes ?? []) as $recipe)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            @if($recipe->image)
                                <img src="{{ $recipe->fullImagePath }}" alt="{{ $recipe->title }}">
                            @endif
                            <div class="receipe-content">
                                <a href="{{ route('recipe.edit', $recipe) }}">
                                    <h5>{{ $recipe->title }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 mt-5">
                        <div class="alert alert-warning">
                            Nem található recept a profilodban.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
