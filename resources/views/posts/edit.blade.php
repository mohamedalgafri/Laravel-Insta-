@extends('layout.default')

@section('content')

<div class="Container">
<h3>Edit Post</h3>

<form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- <input type="hidden" name="_method" value="put"> -->
    @include('posts._form',[
        'cccc'=>'edit'
    ])

</form>
</div>
@endsection