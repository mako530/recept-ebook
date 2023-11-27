@extends('layouts.app')

@section('content')
    <section class="best-receipe-area">
        <div class="container">
            <form action="{{ route('recipe.store') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="">
                    <div class="section-heading style-2">
                        <h3>Recept szerkesztése</h3>
                    </div>
                </div>

                <div class="pb-4">
                    <label for="recipe_category_id">Kategória</label>
                    <select class="form-control @error('title') is-invalid @enderror" name="recipe_category_id" id="recipe_category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($recipe->recipe_category_id === $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('recipe_category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-5 form-group">
                    <label for="title">Cím *</label>
                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" maxlength="255" placeholder="Paprikás krumpli" value="{{ $recipe->title }}" />
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-5 form-group">
                    <label for="description">Leírás</label>
                    <textarea class="form-control @error('title') is-invalid @enderror" name="description" id="description" cols="30" rows="10" placeholder="">{{ $recipe->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-5 form-group">
                    <label for="ingredients">Hozzávalók</label>
                    <textarea class="form-control @error('title') is-invalid @enderror" name="ingredients" id="ingredients" cols="30" rows="10">{{ $recipe->ingredients }}</textarea>
                    @error('ingredients')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-5 form-group">
                    <label for="instructions">Elkészítési lépések</label>
                    <textarea class="form-control @error('title') is-invalid @enderror" name="instructions" id="instructions" rows="30">{{ $recipe->instructions }}</textarea>
                    @error('instructions')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-5 form-group">
                    <label for="is_published">Publikálás</label>
                    <select class="form-control @error('title') is-invalid @enderror" name="is_published" id="is_published">
                        <option value="1" @if($recipe->is_published) selected @endif>Igen</option>
                        <option value="0" @if(!$recipe->is_published) selected @endif>Nem</option>
                    </select>
                    @error('is_published')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-5 form-group">
                    <label for="image">Kép</label>
                    @if($recipe->image)
                        <img src="{{ $recipe->fullImagePath }}" alt="{{ $recipe->title }}" class="img-fluid" />
                    @endif

                    <input class="form-control @error('title') is-invalid @enderror" type="file" name="image" id="image" accept="image/" />
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-5 ">
                    <button type="submit" class="btn delicious-btn">Hozzáadás</button>
                </div>
            </form>
        </div>
    </section>
@endsection
