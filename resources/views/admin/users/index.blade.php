@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $u)
                                    <tr>
                                        <th scope="row">{{ $u->id }}</th>
                                        <td>{{ $u->name }}</td>
                                        <td>{{implode(', ', $u->roles()->get()->pluck('name')->toArray()) }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $u->id) }}"><button type="button" class="btn btn-success float-left">Edit</button></a>
                                            <form action="{{ route('admin.users.destroy', $u) }}" method="POST" class="float-left">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
