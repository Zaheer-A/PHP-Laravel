<x-admin-master>

    @section('content')
        <h1>Create New Post</h1>
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
{{--                cross site forgery--}}
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           id="title"
                           placeholder="Enter title">
                </div>

{{--                <div class="form-group">--}}
{{--                    <textarea name="body" id="body " cols="100" rows="25"></textarea>--}}
{{--                </div>--}}

                <div class="form-group">
                    <label>Body</label>
                    <textarea name="description" rows="5" cols="40" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file"
                           name="post_image"
                           id="post_image"
                           class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        @endsection

</x-admin-master>
