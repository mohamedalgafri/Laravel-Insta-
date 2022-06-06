@if ($errors->any())
    <div class="alert alert-danger" >
        @foreach ($errors->all() as $error)
            <p> {{$error}}</p>
        @endforeach
    </div>   
@endif


<div class="form-group">

        <label for="">Title</label>
        <input type="text" name="title" class="form-control @error('titel') is-invalid @enderror" value="{{old('title')}}">
        <label for="">Post</label>
        <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror">{{ old('content',$post->content) }}</textarea>
        
        @error('content')
            <p class="invalid-feedback"> {{$message}}</p>
        @enderror
    </div>

<div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <p class="invalid-feedback"> {{$message}}</p>
        @enderror
</div>


    <button type="submit" class="btn btn-primary">{{$cccc}} Post</button>