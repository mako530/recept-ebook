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
                    <div class="col-12 col-sm-6 col-lg-4" id="recipe-{{$recipe->id}}">
                        <div class="single-best-receipe-area mb-30">
                            @if($recipe->image)
                                <img src="{{ $recipe->fullImagePath }}" alt="{{ $recipe->title }}">
                            @endif
                            <div class="recipe-content">
                                <a href="{{ route('recipe.edit', $recipe) }}">
                                    <h5>{{ $recipe->title }}</h5>
                                </a>
                            </div>
                            <div style="padding: 4px 10px; border-radius: 999px; color: white; background-color: darkred; position: absolute; top: -12px; right: -12px; cursor: pointer" onclick="deleteRecipe({{ $recipe->id }})">X</div>
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

    <script>
        const deleteRoute = '{{ route('recipe.destroy', ['recipe' => '%id%']) }}';

        async function deleteRecipe(id) {
            if (confirm('Biztosan törölni szeretnéd ezt a receptet?')) {
                const result = await fetch(deleteRoute.replace('%id%', id.toString()), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') ?? '{{ csrf_token() }}'
                    }
                })

                if (result.ok) {
                    document.querySelector(`#recipe-${id}`).remove();
                } else {
                    alert('Hiba történt a recept törlése közben!');
                }
            }
        }
    </script>
@endsection
