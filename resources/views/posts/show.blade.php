@extends ('layouts.master')

@section ('content')

<div class="col-sm-8 blog-main">
    <h1>{{ $post->title}}</h1>

    <div class="tag">
        @if (count($post->tags ))
            @foreach ($post->tags as $tag)
                <a href="/posts/tags/{{ $tag->name }}">
                    <small>{{ $tag->name }}</small>
                </a>
            @endforeach
        @endif
    </div>
    <p/>
    <p>{{ $post->body }}</p>

    <hr/>

    <div class="comments">
        <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">

                    <strong>
                        {{ $comment->user->name }} : &nbsp;
                    </strong>
                    {{ $comment->body }}
                </li>
                <span style="text-align: right;">{{ $comment->created_at->diffForHumans() }}</span>
            @endforeach
        </ul>
    </div>

    <p/>

    <!-- Add a comment -->
    @if (Auth::check())
    <div class="card">
        <div class="card-block">
    
            <form method="POST" action="/posts/{{ $post->id }}/comments">
                @csrf
                <div class="form-group">
                    <textarea name="body" placeholder="your comment here" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
    
            @include ('layouts.errors')
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-block">
            <a href="/login">Login to Comment</a>
        </div>
    </div>
    @endif
</div>

@endsection