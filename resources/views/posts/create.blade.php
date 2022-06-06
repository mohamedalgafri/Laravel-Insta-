@extends('layout.default')

@section('content')

<div class="Container">
<h3>Create Post</h3>

<form action="/posts" method="post" enctype="multipart/form-data"> //enctype ??imge??
    @csrf

    @include('posts._form',[
        'cccc'=>'create'
    ])

</form>
</div>
@endsection