@extends('layouts.app')

@section('title', $post['title'])

@section('content')
@if($post['is_new'])
<div> 
    A new blog post! Using if
</div>
@else
<div> Blog post is old! using else</div>
@endif

@unless($post['is_new'])
<div>It is an old post... using unless</div>
@endunless
<h1> {{ $post['title'] }}</h1>
<p>{{ $post['content'] }}</p>

@isset($post['has_comments'])
<div> The post has some comments using isset...</div>
@endisset



<div class='card' > 
    @foreach($NFT['ownedNfts'] as $nft)
    <div class="mainCard">
        <h1>{{ $nft['title']}}</h1>
        <h2>{{ $nft['description'] }} </h2>
        <img src="{{$nft['media'][0]["gateway"]}}" alt="NFT" srcset="">
    </div>
    @endforeach
</div>

    


@endsection