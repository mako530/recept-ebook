@extends('layouts.app')

@section('content')
    @if (!empty($topRecipes))
        <section class="hero-area">
            <div class="hero-slides owl-carousel" >
                @foreach ($topRecipes as $recipe)
                    <div class="single-hero-slide bg-img" style="background-image: url('{{ $recipe->fullImagePath }}');">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                    <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                        <h2 data-animation="fadeInUp" data-delay="300ms">{{ $recipe->title }}</h2>
                                        <p data-animation="fadeInUp" data-delay="700ms">{{ $recipe->description }}</p>
                                        <a href="{{ route('recipe.show',$recipe) }}" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">Megnézem</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section class="best-receipe-area" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Kategóriák</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            <a href="{{ route('category.show', $category) }}">
                                <img src="{{ $category->fullImagePath }}" alt="{{ $category->name }}">
                                <div class="receipe-content">
                                    <h5>{{ $category->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
