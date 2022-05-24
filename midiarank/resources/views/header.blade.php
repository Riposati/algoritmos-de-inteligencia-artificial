<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta name="description"
            content="Acompanhe quais mídias mais votadas pelos usuários! Vote, comente, assista trailers e saiba mais sobre seus filmes, séries e games favoritos! Quanto mais você interage com suas mídias favoritas mais bem posicionadas elas ficam." />
        <meta name="keywords"
            content="midiarank, ranking filmes, ranking series, ranking games, ranking jogos, melhores filmes, melhores series, melhores games, melhores jogos" />

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/main.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/glider.css')}}">
        <link href="{{asset('site-img/favicon.ico')}}" rel="icon" type="image/x-icon" />
        <link href="{{asset('css/swiper.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/slide-game.css')}}" rel="stylesheet" />
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/37e2edfc78.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <title>Mídiarank - Ranking de Filmes, Games e Séries</title>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <a class="navbar-brand" href="/"><img id='site-logo' src='{{asset("site-img/midiarank_logo.png")}}' alt='error'></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item">
                    <a class="mr-2 btn btn-dark nav-link text-white" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="mr-2 btn btn-dark nav-link text-white" href="/medias/games">Games</a>
                </li>
                <li class="nav-item">
                    <a class="mr-2 btn btn-dark nav-link text-white" href="/medias/movies">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="mr-2  btn btn-dark nav-link text-white" href="/medias/series">Séries</a>
                </li> -->
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href='/user/myProfile'>Ver Perfil</a>
                            
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        

                    @else
                        <li class='mr-2'>
                        <i class="fa fa-user" aria-hidden="true"></i> <a class='text-dark' href='/register'>Cadastrar</a>
                        </li> 
                        <li>
                            <i class="fa fa-sign-in" aria-hidden="true"></i> <a class='text-dark' href='/login'>Entrar</a>
                        </li>
                    @endif   
                </ul>
            </div>
        </nav>

    </head>
    
    <body>