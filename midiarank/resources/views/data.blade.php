@foreach($medias as $media)
    <div class='container border border-primary rounded mb-2 mt-2 p-2'>
        <div class='row'>
            <div class='col-2'>
                @if($media->type_of_media=='game')
                    @php $path = "game"; @endphp
                    @if(!empty($media->photos()->first()))
                        <a href='game/{{$media->id}}'><img class='img-fluid img-pagination-medias' src="/games-img/{{$media->photos()->first()->photo}}" alt='error'></a>
                    @else
                        <a href='game/{{$media->id}}'><img class='img-fluid img-pagination-medias' src="{{asset('site-img/midiarank_logo_not_found.png')}}" alt='error'><a/>
                    @endif
                @endif

                @if($media->type_of_media=='movie')
                    @php $path = "movie"; @endphp
                    @if(!empty($media->photos()->first()))
                        <a href='movie/{{$media->id}}'><img class='img-fluid img-pagination-medias' src="/movies-img/{{$media->photos()->first()->photo}}" alt='error'></a>
                    @else
                        <a href='movie/{{$media->id}}'><img class='img-fluid img-pagination-medias' src="{{asset('site-img/midiarank_logo_not_found.png')}}" alt='error'></a>
                    @endif
                @endif

                @if($media->type_of_media=='serie')
                    @php $path = "serie"; @endphp
                    @if(!empty($media->photos()->first()))
                        <a href='serie/{{$media->id}}'><img class='img-fluid img-pagination-medias' src="/series-img/{{$media->photos()->first()->photo}}" alt='error'></a>
                    @else
                        <a href='serie/{{$media->id}}'><img class='img-fluid img-pagination-medias' src="{{asset('site-img/midiarank_logo_not_found.png')}}" alt='error'></a>
                    @endif
                @endif
            </div>

            <div id='div-info-rank' class='col-10'>
                <a class='text-white font-weight-bold' href='{{$path}}/{{$media->id}}'>{{$media->name}}</a><br>
                <span class='text-white font-italic'>{{$media->official_title}}</a><br>
                <img src='{{asset("site-img/trailer.png")}}' alt='error'>
                <img src='{{asset("site-img/comentarios.png")}}' alt='error'> (0) 
                <img src='{{asset("site-img/like.png")}}' alt='error'>({{$media->likes}})<br>
                <span><b>Data de estréia:</b> {{Carbon\Carbon::parse($media->release_date)->format('d/m/Y')}}</span><br>
                <span class='badge badge-secondary badge-pill'>Lançamento</b></span><br>
                <a class='text-warning' href="https://api.whatsapp.com/send?text=Não deixe de conferir sobre {{$media->name}} no Mídiarank! Vote no ranking, assista o trailer, data de estreia e muito mais! https://www.midiarank.com.br" id="whatsapp-share-btt" rel="nofollow" target="_blank" class="links-midia-bottom">
        	    <i class="fab fa-whatsapp"></i> Indicar</a>
            </div>
        </div>
    </div>
@endforeach