@extends('layouts.app')

@section('title', 'Form')

@section('content')

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    @include('posts.partials.form')
    {{-- @if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error) 
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <div> <input type="submit" value="Create"></div>
</form>
@endsection