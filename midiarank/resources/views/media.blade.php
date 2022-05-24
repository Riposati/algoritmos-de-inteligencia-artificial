@include('header')

<div class='container mt-5'>
    <div class='row text-white'>
        <div class='col-12 text-justify'>
            <div>
                @if($media->type_of_media=='game')
                    @if(!empty($media->photos()->first()))
                        <img class='img-correction swiper-slide mb-3' src="/games-img/{{$media->photos()->first()->photo}}" alt='error'>
                    @else
                        <img class='img-correction swiper-slide mb-3' src="{{asset('site-img/midiarank_logo_not_found.png')}}" alt='error'>
                    @endif
                @endif

                @if($media->type_of_media=='movie')
                    @if(!empty($media->photos()->first()))
                        <img class='img-correction swiper-slide mb-3' src="/movies-img/{{$media->photos()->first()->photo}}" alt='error'>
                    @else
                        <img class='img-correction swiper-slide mb-3' src="{{asset('site-img/midiarank_logo_not_found.png')}}" alt='error'>
                    @endif
                @endif

                @if($media->type_of_media=='serie')
                    @if(!empty($media->photos()->first()))
                        <img class='img-correction swiper-slide mb-3' src="/series-img/{{$media->photos()->first()->photo}}" alt='error'>
                    @else
                        <img class='img-correction swiper-slide mb-3' src="{{asset('site-img/midiarank_logo_not_found.png')}}" alt='error'>
                    @endif
                @endif
            </div>

            <div>
                <span class='text-white font-weight-bold'>{{$media->name}}</span><br>
                <span class='text-white font-italic'>{{$media->official_title}}</a><br>
                <img src='{{asset("site-img/trailer.png")}}' alt='error'>
                <a class='text-white' href='#comments'><img src='{{asset("site-img/comentarios.png")}}' alt='error'> (0)</a> 
            
                <!-- If I found the like in table likes I proceed here or not -->
                @if(Auth::user() && !empty($media->likes()->first()) && $media->likes()->where('user_id',Auth::user()->id)->where('media_id',$media->id)->first())
                    @php $pic = "like"; @endphp 
                @else
                    @php $pic = "like-nao-marcado"; @endphp 
                @endif

                <span style='cursor:pointer' id='bt-like' class='text-white'>
                    <input id='hd-val-rank' type='hidden' value='{{$media->id}}'>
                    <img id='img-like' src='/site-img/{{$pic}}.png' alt='error'>
                </span>(<span id='cont-media-likes'>{{$media->likes}}</span>)<br>
                
                <span><b>Data de estréia:</b> {{Carbon\Carbon::parse($media->release_date)->format('d/m/Y')}}</span><br>
                <!-- <span class='badge badge-warning badge-pill'>Lançamento</b></span><br> -->
                <div>
                    Plataformas:
                    @if(!empty($media->platforms()->first()))
                        @foreach($media->platforms()->get() as $platform)
                            <span class='badge badge-primary badge-pill'>{{$platform->name}}</span>
                        @endforeach
                    @else
                        <span>Não informado</span>
                    @endif
                </div>
            </div>

            @php $aux = null; if(Auth::user()) { $aux = $media->avaliacoes()->where('user_id',Auth::user()->id)->where('media_id',$media->id)->first(); } $title = ['Péssimo','Ruim','Regular','Bom','Ótimo'] ; @endphp
            
            @if($aux)
                
                <div id="ratingStarUser">
                    <div class="rating-stars mt-3">
                        <ul id="stars" class="stars-users">

                                
                                @for ($i=0; $i<$aux->avaliacao;$i++)

                                    <li id="star{{$i+1}}" data-star="{{$i+1}}" data-value="{{$i+1}}" onclick="toggleStarEffect({{$i+1}})" class="star selected btnChangeValueVoteInput" title={{$title[$i]}}>
                                        <i class="fa fa-star"></i>
                                    </li>
                                
                                @endfor

                                @for ($i=$aux->avaliacao; $i<5;$i++)

                                    <li id="star{{$i+1}}" data-star="{{$i+1}}" data-value="{{$i+1}}" onclick="toggleStarEffect({{$i+1}})" class="star btnChangeValueVoteInput" title={{$title[$i]}}>
                                        <i class="fa fa-star"></i>
                                    </li>

                                @endfor
                        </ul>
                    </div>
                    <span id='fix-btn' class='btn btn-warning btnChangeValueVoteInput2'>Salvar</b></span>

                </div>
                                                
            @else 
            
            <div id="ratingStarUser">
                <div class="rating-stars mt-3">
                    <ul id="stars" class="stars-users">

                            <li id="star1" data-star="1" data-value="1" onclick="toggleStarEffect(1)" class="star btnChangeValueVoteInput" title="Péssimo">
                                <i class="fa fa-star"></i>
                            </li>
                                <li id="star2" data-star="2" data-value="2" onclick="toggleStarEffect(2)" class="star btnChangeValueVoteInput" title="Ruim">
                                <i class="fa fa-star"></i>
                            </li>
                                <li id="star3" data-star="3" data-value="3" onclick="toggleStarEffect(3)" class="star btnChangeValueVoteInput" title="Regular">
                                <i class="fa fa-star"></i>
                            </li>
                                <li id="star4" data-star="4" data-value="4" onclick="toggleStarEffect(4)" class="star btnChangeValueVoteInput" title="Bom">
                                <i class="fa fa-star"></i>
                            </li>
                                <li id="star5" data-star="5" data-value="5" onclick="toggleStarEffect(5)" class="star btnChangeValueVoteInput" title="Ótimo">
                                <i class="fa fa-star"></i>
                            </li>
                        
                    </ul>
                </div>
                <span id='fix-btn' class='btn btn-warning btnChangeValueVoteInput2'>Salvar</b></span>
            </div>
            @endif

        </div>
       
        <div class='container'>
            <div class="toast" id="myToast">
                <div class="toast-header">
                    <strong class="mr-auto"></i> Avaliação salva com sucesso!</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>        
            </div>
        </div>

        <div class="container mb-3">
            Recomendações:<br>
            @if(!empty($arrNomesMidiasRecomendadas))
                @foreach($arrNomesMidiasRecomendadas as $midia)
                    @if($midia['type_of_media']=='movie')
                        <span class='badge badge-primary badge-pill'><a style="color:#fff" href='\medias\movie\{{$midia["id"]}}'>{{$midia['name']}}</a></span>
                    @elseif($midia['type_of_media']=='game')
                        <span class='badge badge-primary badge-pill'><a style="color:#fff" href='\medias\game\{{$midia["id"]}}'>{{$midia['name']}}</a></span>
                    @elseif($midia['type_of_media']=='serie')
                        <span class='badge badge-primary badge-pill'><a style="color:#fff" href='\medias\serie\{{$midia["id"]}}'>{{$midia['name']}}</a></span>
                    @endif
                @endforeach
            @else
                <span>Não informado</span>
            @endif
        </div>

        <div class='col-6'>
        
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sobre</a>
                    <a class="nav-item nav-link" id="nav-news-tab" data-toggle="tab" href="#nav-news" role="tab" aria-controls="nav-news" aria-selected="false">Novidades</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Vídeos</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Fotos</a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">{{$media->synopsis}}</div>
                <div class="tab-pane fade" id="nav-news" role="tabpanel" aria-labelledby="nav-news-tab">Em breve!</div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Em breve!</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Em breve!</div>
            </div>
            
        </div>

    </div>

</div>

<div id='comments' class='container mt-5'>
    <h2 class='text-center text-white'>Comentários</h2>
    <div class='row text-white p-1'>
        <div class='col-12 text-justify bg-light'>
          <span class='text-dark'>aqui é um comentário</span>
        </div>

        <div class='col-12 text-justify bg-light'>
          <span class='text-dark'>aqui é um comentário</span>
        </div>
        <div class='col-12 text-justify bg-light'>
          <span class='text-dark'>aqui é um comentário</span>
        </div>
        <div class='col-12 text-justify bg-light'>
          <span class='text-dark'>aqui é um comentário</span>
        </div>
    </div>
</div>

@include('footer')