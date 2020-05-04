@extends('layouts.app')

@section('maincontent')
    <div class="d-flex justify-content-end">
        <a href=" {{route('posts.create')}} " class="btn btn-success mb-2 col-sm-8 col-md-4">Add Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            <img src="{{ asset("images/".$post->image) }}" width="100px" height="100px" alt="">
                        </td>
                        <td> {{$post->title}} </td>
                        <td>
                        @if(!$post->trashed())
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            {{-- <button data-dismiss="modal" onclick="handleDelete({{ $post->id }})" data-target="#deleteModal" class="btn btn-sm btn-danger ml-1">Delete</button> --}}
                        @endif
                        </td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    {{ $post->trashed() ? 'Delete': 'Trash' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            {{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="post" id="deletePostForm">
                    @csrf        
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Post Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Are you sure want to delete this Post?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, going back</button>
                            <button type="submit" class="btn btn-danger">Yes, DELETE</button>
                        </div>
                    </div>
                </form>
            </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleDelete(id){
            var form = document.getElementById('deletePostForm')
            form.action = '/posts/' + id
            console.log('deleting.', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection