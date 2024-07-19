@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="">
            <h1> Edit</h1>

            <form action="{{ route('users.update', $user)}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="">name</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" required>
                </div>
                <div>
                    <label for="">email</label>
                    <input type="email" name="email" id="email" value="{{$user->email}}" required>
                </div>

                <button type="submit">Submit</button>
            </form>
    </div>

    @endsection