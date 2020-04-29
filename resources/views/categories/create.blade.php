@extends('layouts.app')

@section('maincontent')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit Category' : 'Adding Category' }}
        </div>
        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label class="form-group" for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" 
                    value="{{ isset($category) ? $category->name : '' }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn {{ isset($category) ? 'btn-info' : 'btn-success' }}">
                        {{ isset($category) ? 'Update Category' : 'Add Category' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection