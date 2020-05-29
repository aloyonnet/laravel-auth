@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin homepage</div>

                <div class="card-body">
                    Hello {{ $user->name }}, you are on the admin homepage, try to visit others pages with the menu
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
