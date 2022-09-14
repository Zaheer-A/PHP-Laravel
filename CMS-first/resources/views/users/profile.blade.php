<x-admin-master>
    @section('content')
        <h1>Hello {{$user->name}}!</h1>
    @if(Session::has('profileEditMessage'))
        <div class="alert-info">
            {{Session::get('profileEditMessage')}}
        </div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <img class="img-profile rounded-circle" src="{{$user->avatar}}" height="300px"  alt="">
                </div>

                <div class="form-group">
                    <input type="file" name="avatar">
                </div>

                <div class="form-group">
                    <label for="name">Username:</label>
                    <input type="text"
                           name="username"
                           class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}"
                           id="username"
                           aria-describedby=""
                           placeholder="{{$user->username}}"
                    >
                    @error('username')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="name">Name:</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       id="name"
                       aria-describedby=""
                        placeholder="{{$user->name}}"
                >
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           aria-describedby=""
                           placeholder="{{$user->email}}"
                    >
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           id="password"
                           aria-describedby=""
                    >
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirmation">Confirm Password:</label>
                    <input type="password"
                           name="password-confirmation"
                           class="form-control"
                           id="password-confirmation"
                           aria-describedby=""
                    >
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
