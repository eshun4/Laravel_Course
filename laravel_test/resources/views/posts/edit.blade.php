@extends('layouts.app')

@section('title', 'Form')

@section('content')

<form action="{{ route('posts.update', ['post'=>$post->id]) }}" method="POST">
    @csrf
    @method('PUT')
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
    <div> <input type="submit" value="Update"></div>
</form>
@endsection