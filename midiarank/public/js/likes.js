var likes;
var idMedia;

function mediaLikes(likes, idMedia){
    // ajax to chance value of likes in the database
    $.ajax({
       Method:'POST',
       url:"/user/like",
       data:{idMedia:idMedia, likes:likes},
       success:function(data){
           //console(data.success);
       }
   });
}

function mediaDislikes(likes, idMedia){
    // ajax to chance value of likes in the database
    $.ajax({
       Method:'POST',
       url:"/user/dislike",
       data:{idMedia:idMedia, likes:likes},
       success:function(data){
           //console(data.success);
       }
   });
}

$('document').ready(function(){ // after jquery is ready ...

    $('#bt-like').click(function(e){

        e.preventDefault();
        // console.log('bt like clicado');
    
        idMedia = $('#hd-val-rank').val();
        var src = $('#img-like').attr('src');

        if(src=='/site-img/like-nao-marcado.png'){
            $('#img-like').attr('src', '/site-img/like.png');
            likes = parseInt($('#cont-media-likes').text())+1;
            $('#cont-media-likes').text(likes);
            mediaLikes(likes, idMedia);

        }else if(src=='/site-img/like.png'){

            $('#img-like').attr('src', '/site-img/like-nao-marcado.png');
            likes = parseInt($('#cont-media-likes').text())-1;
            $('#cont-media-likes').text(likes);
            mediaDislikes(likes, idMedia);
        }
    });
});