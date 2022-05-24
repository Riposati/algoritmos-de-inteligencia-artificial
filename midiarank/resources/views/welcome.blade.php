@include('header')


    <div class="hero-video-bg">
    <!-- <div id='phrase-video-welcome' class='text-white'>
    
        <h1 class='text-center'>Bem vindo ao Mídiarank!</h1>

        <div id='paragraph-video-welcome'>
            <p class='text-justify p-5'>Local para você se manter atualizado sobre
                as novidades das mídias, Quais os principais jogos, séries e 
                filmes que serão lançados você encontra aqui, esperamos que você goste!
            </p>
        </div>
    </div>
        <div data-video-image-fallback="" class="live-video-block  video-image-fallback__container">
            <video id='video-cover' data-object-fit="cover" muted="" autoplay="" loop="" playsinline="" webkit-playsinline="" poster="">
                <source src="{{asset('site-videos/the-last-of-us-part-2.mp4')}}">
            </video>
        </div> -->
    </div>

    <h3 class='mt-2 text-white text-center'>Destaques</h3>
    <div class="large-margin">
        <div class="container-fluid">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($games->slice(0, 3) as $game)
                    <div class="swiper-slide">
                        <div class="img-box-game text-center">
                            @if(!empty($game->photos()->first()))
                                <img src="games-img/{{$game->photos()->first()->photo}}" alt='error'>
                            @else
                                <img src="site-img/midiarank_logo_not_found.png" alt='error'>
                            @endif
                            <a class='text-dark font-weight-bold' href='medias/game/{{$game->id}}'>{{$game->name}}</a>
                            <span class='d-block'>Lançamento:{{Carbon\Carbon::parse($game->release_date)->format('d/m/Y')}}</span>
                            <a style='display:block;margin:0 auto' class="text-dark font-weight-bold" href="/medias/games">Ver todos</a>
                        </div>
                    </div>
                    @endforeach

                    @foreach($movies->slice(0, 3) as $movie)
                        <div class="swiper-slide">
                            <div class="img-box-game text-center">
                                @if(!empty($movie->photos()->first()))
                                    <img src="movies-img/{{$movie->photos()->first()->photo}}" alt='error'>
                                @else
                                    <img src="site-img/midiarank_logo_not_found.png" alt='error'>
                                @endif
                                <a class='text-dark font-weight-bold' href='medias/movie/{{$movie->id}}'>{{$movie->name}}</a>
                                <span class='d-block'>Lançamento:{{Carbon\Carbon::parse($movie->release_date)->format('d/m/Y')}}</span>
                                <a style='display:block;margin:0 auto' class="text-dark font-weight-bold" href="/medias/movies">Ver todos</a>
                            </div>
                        </div>
                    @endforeach

                    @foreach($series->slice(0, 3) as $serie)
                        <div class="swiper-slide">
                            <div class="img-box-game text-center">
                                @if(!empty($serie->photos()->first()))
                                    <img src="series-img/{{$serie->photos()->first()->photo}}" alt='error'>
                                @else
                                    <img src="site-img/midiarank_logo_not_found.png" alt='error'>
                                @endif
                                <a class='text-dark font-weight-bold' href='medias/serie/{{$serie->id}}'>{{$serie->name}}</a>
                                <span class='d-block'>Lançamento:{{Carbon\Carbon::parse($serie->release_date)->format('d/m/Y')}}</span>
                                <a style='display:block;margin:0 auto' class="text-dark font-weight-bold" href="/medias/series">Ver todos</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
            <li data-target="#carousel" data-slide-to="4"></li>
            <li data-target="#carousel" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <img src="banners/banner.jpg" class="d-block w-100"  alt="error">
                <div class="caption-banner carousel-caption d-md-block w-100">
                    <h5>Jogos em destaque</h5>
                    <br>
                </div>
            </div>

            <div class="carousel-item">
                <img src="banners/resident_evil_3_banner.jpg" class="d-block w-100"  alt="error">
                <div class="caption-banner carousel-caption d-md-block w-100">
                    <h5>Jogos em destaque</h5>
                    <br>
                </div>
            </div>

            <div class="carousel-item">
                <img src="banners/banner.jpg" class="d-block w-100"  alt="error">
                <div class="caption-banner carousel-caption d-md-block w-100">
                    <h5>Filmes em destaque</h5>
                    <br>
                </div>
            </div>

            <div class="carousel-item">
                <img src="banners/banner.jpg" class="d-block w-100"  alt="error">
                <div class="caption-banner carousel-caption d-md-block w-100">
                    <h5>Filmes em destaque</h5>
                    <br>
                </div>
            </div>

            <div class="carousel-item">
                <img src="banners/banner.jpg" class="d-block w-100  "  alt="error">
                <div class="caption-banner carousel-caption d-md-block w-100">
                    <h5>Séries em destaque</h5>
                    <br>
                </div>
            </div>

            <div class="carousel-item">
                <img src="banners/banner.jpg" class="d-block w-100  "  alt="error">
                <div class="caption-banner carousel-caption d-md-block w-100">
                    <h5>Séries em destaque</h5>
                    <br>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> -->

    <div class='container text-white mt-3 border border-dark text-center'>

        <div class='row' style='min-height:300px'>
            <div class="col-4 border border-dark p-3">
                <img class="img-fluid" src='site-img/we_want_you_here.jpg' alt='error'>
                <p>Sua empresa aqui!</p>
            </div>
            <div class="col-4 border border-dark p-3">
                <img class="img-fluid" src='site-img/we_want_you_here.jpg' alt='error'>
                <p>Sua empresa aqui!</p>
            </div>
            <div class="col-4 border border-dark p-3">
                <img class="img-fluid" src='site-img/we_want_you_here.jpg' alt='error'>
                <p>Sua empresa aqui!</p>
            </div>
        </div>

    </div>

    <div class="content">

        <div class='container'>
            <h3 class='text-center'>Próximos lançamentos de games</h3>
            <div class='row p-3 border border-dark'>
                
                <div class="glider-contain">
                
                <div class="glider">
                    @foreach($games as $game)
                        <div class='div-sliders'>
                            @if(!empty($game->photos()->first()))
                                <img src="games-img/{{$game->photos()->first()->photo}}" alt='error'>
                            @else
                                <img src="site-img/midiarank_logo_not_found.png" alt='error'>
                            @endif
                            <a class='text-white font-weight-bold' href='medias/game/{{$game->id}}'>{{$game->name}}</a>
                            <span class='d-block'>Lançamento:{{Carbon\Carbon::parse($game->release_date)->format('d/m/Y')}}</span>
                        </div>
                    @endforeach
                    
                </div>

                <button aria-label="Previous" class="glider-prev"></button>
                <button aria-label="Next" class="glider-next"></button>
                <div role="tablist" class="dots"></div>
                </div>

                <a style='display:block;margin:0 auto' class="text-white font-weight-bold" href="/medias/games">Ver todos</a>
            </div>
            
        </div>

        <br>

        <div class='container'>
            <h3 class='text-center'>Próximos lançamentos de filmes</h3>
            <div class='p-3 row border border-dark'>
            
            <div class="glider-contain">
                <div class="glider-2">
                @foreach($movies as $movie)
                        <div class='div-sliders'>
                            @if(!empty($movie->photos()->first())) <!-- If there is photo -->
                                <img src="movies-img/{{$movie->photos()->first()->photo}}" alt='error'>
                            @else
                                <img src="site-img/midiarank_logo_not_found.png" alt='error'>
                            @endif
                            <a class='text-white font-weight-bold' href='medias/movie/{{$movie->id}}'>{{$movie->name}}</a>
                            <span class='d-block'>Lançamento:{{Carbon\Carbon::parse($movie->release_date)->format('d/m/Y')}}</span>
                        </div>
                    @endforeach
                </div>

                <button aria-label="Previous" class="glider-prev"></button>
                <button aria-label="Next" class="glider-next"></button>
                <div role="tablist" class="dots-2"></div>
                </div>

                <a style='display:block;margin:0 auto' class="text-white font-weight-bold" href="/medias/movies">Ver todos</a>
            </div>
        </div>

        <br>
        <div class='container'>
            <h3 class='text-center'>Próximos lançamentos de séries</h3>
            <div class='row p-3 border border-dark'>

            <div class="glider-contain">
                <div class="glider-3">
                @foreach($series as $serie)
                        <div class='div-sliders'>
                            @if(!empty($serie->photos()->first())) <!-- If there is photo -->
                                <img src="movies-img/{{$serie->photos()->first()->photo}}" alt='error'>
                            @else
                                <img src="site-img/midiarank_logo_not_found.png" alt='error'>
                            @endif
                            <a class='text-white font-weight-bold' href='medias/serie/{{$serie->id}}'>{{$serie->name}}</a>
                            <span class='d-block'>Lançamento:{{Carbon\Carbon::parse($serie->release_date)->format('d/m/Y')}}</span>
                        </div>
                    @endforeach
                </div>

                <button aria-label="Previous" class="glider-prev"></button>
                <button aria-label="Next" class="glider-next"></button>
                <div role="tablist" class="dots-3"></div>
                </div>

                <a style='display:block;margin:0 auto' class="text-white font-weight-bold" href="/medias/series">Ver todos</a>
            </div>
            
            </div>

        </div>

        <br>
        <div class='container text-white mt-3 border border-dark text-center'>

        <div class='row' style='min-height:300px'>
            <div class="col-4 border border-dark p-3">
                <img class="img-fluid" src='site-img/we_want_you_here.jpg' alt='error'>
                <p>Sua empresa aqui!</p>
            </div>
            <div class="col-4 border border-dark p-3">
                <img class="img-fluid" src='site-img/we_want_you_here.jpg' alt='error'>
                <p>Sua empresa aqui!</p>
            </div>
            <div class="col-4 border border-dark p-3">
                <img class="img-fluid" src='site-img/we_want_you_here.jpg' alt='error'>
                <p>Sua empresa aqui!</p>
            </div>
        </div>

    </div>

    <!-- End of div content bellow -->
    </div> 
@include('footer')
