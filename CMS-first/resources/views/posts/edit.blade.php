<x-admin-master>

    @section('content')
        <h1>Edit</h1>
            <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           id="title"
                           placeholder="Enter title"
                           value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <textarea name="body" id="body " cols="100" rows="25">{{$post->body}}</textarea>
                </div>

                <div class="form-group">
                    <label for="file">File</label>
                    <div>
                        <img src="{{$post->post_image}}" height="100px" alt="">
                    </div>
                    <input type="file"
                           name="post_image"
                           id="post_image"
                           class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        @endsection

</x-admin-master>
