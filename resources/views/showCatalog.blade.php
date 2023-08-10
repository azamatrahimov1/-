@extends('layout.app')
@section('content')
    <!-- Show Article -->
    <div class="container">
        <dl class="row">
            @foreach($articles as $article)
                <div style="float: left">
                    @if(!empty($article[0]->count))
                        {{ $article[0]->count }}
                    @else
                        0
                    @endif
                </div>
                <dt class="col-sm-3">Title</dt>
                <dd class="col-sm-9">{{ $article->title }}</dd>

                <dt class="col-sm-3">Description</dt>
                <dd class="col-sm-9">{{ $article->description }}</dd>

                <dt class="col-sm-3 text-truncate">Image</dt>
                <dd class="col-sm-9"><img src="assets/images/{{ $article->image }}"></dd>

            @endforeach
        </dl>
    </div>
    <!-- /Show Article -->
@endsection
