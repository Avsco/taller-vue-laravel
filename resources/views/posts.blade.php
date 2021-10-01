@extends('layouts.app')

@section('content')
<div class="container">
<ul class='d-flex list-unstyled'>
        <li class='p-2'><a href="/posts">Home</a></li>
        <li class='p-2'> <a href="/posts/create">Crear</a></li>
    </ul>

    <h1>Posts</h1>
    @if ($state == 'index')
        <posts></posts>
    @elseif($state == 'create')
        <posts-create></posts-create>
    @elseif($state == 'edit')
        <posts-create id="{{$id}}"></posts-create>
    @elseif($state == 'show')
        <posts-item id="{{$id}}"></posts-item>
    @endif
</div>
@endsection
