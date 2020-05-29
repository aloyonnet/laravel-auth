@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Roles</div>

                    <div class="card-body">
                        <a href="{{ route('admin.roles.create') }}"><button type="button" class="btn btn-primary float-left m-2">Create</button></a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $r)
                                    <tr>
                                        <th scope="row">{{ $r->id }}</th>
                                        <td>{{ $r->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.roles.edit', $r->id) }}"><button type="button" class="btn btn-success float-left">Edit</button></a>
                                            <form action="{{ route('admin.roles.destroy', $r) }}" method="POST" class="float-left">
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
