@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            @foreach($roles as $r)
                                <div class="form-check">
                                        <input type="checkbox" name="roles[]" value="{{ $r->id }}"/>
                                    <label>
                                        {{ $r->name }}
                                    </label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-success">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
