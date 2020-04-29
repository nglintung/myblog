@extends('layouts.app')

@section('maincontent')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($post) ? 'Edit Post' : 'Adding Post' }}
        </div>
        <div class="card-body">
            @include('partials.errors')
            <form 
            action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" 
            method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" 
                    value="{{ isset($post) ? $post->title : '' }}">
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="5" 
                    rows="2">{{ isset($post) ? $post->description : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">Content</label>
                    <textarea class="form-control" name="content" id="content" cols="5" 
                    rows="5">{{ isset($post) ? $post->content : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input class="form-control" type="text" name="published_at" id="published_at" 
                    value="{{ isset($post) ? $post->published_at : '' }}">
                </div>
                <div class="form-group">
                    <label for="image">Image Post</label>
                    @if(isset($post))
                    <img src="{{asset($post->image)}}" width="200px" height="200px" alt="">.
                    @endif
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn {{ isset($post) ? 'btn-info' : 'btn-success' }}">
                        {{ isset($post) ? 'Update Post' : 'Add Post' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection