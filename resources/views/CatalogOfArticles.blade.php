@extends('layout.app')
@section('content')

    <!-- Каталог -->
    <section class="section mt-5" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Каталог</h2>
                        <span>Все катологи вы можети смотреть здесь</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p></p>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right-content">
                        <div class="col-lg-4">
                            @foreach($articles as $article)
                                <div class="card" style="width: 16rem;">
                                    <img src="assets/images/{{ $article->image }}" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <a href="{{ route('articleSlug',$articles->id ) }}">
                                            <h5 class="card-title">{{ $article->title }}</h5>
                                        </a>
                                        <p class="card-text">{{ $article->description }}</p>
                                        <div class="">
                                            <button class="mr-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor"
                                                     class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                </svg>
                                            </button>
                                            <div style="float: left">
                                                @if(!empty($article[0]->count))
                                                    {{ $article[0]->count }}
                                                @else
                                                    0
                                                @endif
                                            </div>
                                            <button class="ml-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor"
                                                     class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /Paginate -->
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- /Каталог -->

@endsection
