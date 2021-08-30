@extends("template.index")
@section('content')
    <div class="min-w-100 d-flex">
        <div class="w-50 d-flex flex-column align-items-center">
            <h2 class="text-center">Ajouter un Role</h2>
            <form class="d-flex flex-column align-items-center" action="/role" method="POST">
                @csrf
                <input class="mb-3" type="text" name="name" placeholder="Nom du rôle" id="">
                <input class="btn btn-primary text-white" type="submit" value="Save">
            </form>
        </div>
        <div class="w-50 d-flex flex-column align-items-center">
            <h2 class="text-center">Ajouter un utilisateur</h2>
            <form class="d-flex flex-column align-items-center" action="/user" method="POST">
                @csrf
                <input type="text" name="first_name" placeholder="Nom de l'utilisateur" id="">
                <input type="text" class="my-3" name="last_name" placeholder="Prénom de l'utilisateur" id="">
                @foreach ($roles as $role)
                    {{-- <select multiple="" name="roles[]" class="form-control">
                        <option value="{{ $role->id }}"
                            {{ in_array($role->id, old('tab2') ?: []) ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select> --}}
                    <div class="form-check w-100">
                        <input name="roles[]" class="form-check-input text-left mb-3" type="checkbox"
                            value="{{ $role->id }}" id="defaultCheck{{ $loop->iteration }}">
                        <label class="form-check-label"
                            for="defaultCheck{{ $loop->iteration }}">{{ $role->name }}</label>
                    </div>
                @endforeach
                <input class="btn btn-primary text-white" type="submit" value="Save">
            </form>
        </div>
    </div>
    <hr class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">user_id</th>
                <th scope="col">role_id</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($role_users as $role_user)
                <tr>
                    <th scope="row">{{ $role_user->id }}</th>
                    <td>{{ $role_user->user_id }}</td>
                    <td>{{ $role_user->role_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
