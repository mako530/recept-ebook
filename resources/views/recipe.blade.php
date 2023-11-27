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

    <div class="receipe-post-area section-padding-80">

        @if($recipe->image)
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="receipe-slider owl-carousel">
                            <img src="{{ $recipe->fullImagePath }}" alt="{{ $recipe->title }}">
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Receipe Content Area -->
        <div class="receipe-content-area">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <span>{{ $recipe->updated_at->format('Y. m. d.') }}</span>
                            <h2>{{ $recipe->title }}</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="single-preparation-step d-flex">
                            <p>{{ $recipe->instructions }}</p>
                        </div>
                    </div>

                    <!-- Ingredients -->
                    <div class="col-12 col-lg-4">
                        <div class="ingredients">
                            <h4>Hozzávalók</h4>

                            @foreach(explode(PHP_EOL, $recipe->ingredients) as $i => $ingredient)
                                @if($ingredient)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck{{ $i }}">
                                        <label class="custom-control-label" for="customCheck{{ $i }}">{{ $ingredient }}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
