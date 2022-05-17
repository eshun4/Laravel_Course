@extends('layouts.app')

@section('title', 'BlogPost')

@section('content')

@forelse($posts as $key => $post)
{{-- @break($key = 2) --}}
{{-- @continue($key = 1) --}}
@include('posts.partials.posts')
@empty
No Posts Found!
@endforelse

@endsection