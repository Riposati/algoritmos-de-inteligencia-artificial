var cont=0;
var v
var f = false

function toggleStarEffect(id){

    for(var i=5;i>=1;i--){
        $('#star' + i).removeClass('selected');
    }

    if(cont%2==0 && id==1){
        $('#star1').addClass('selected');
        cont++;
    }else if(cont%2!=0 && id==1){
        cont++;
        $('#star1').removeClass('selected');
    }else if(id!=1){
        for(var i=1;i<=id;i++){
            $('#star' + i).addClass('selected');
            cont=0;
        }
    }
    //console.log(cont);
}


function mediaAvaliacao(idMedia, v){
    // ajax to chance value of likes in the database
    $.ajax({
       Method:'POST',
       url:"/user/avaliacao",
       data:{idMedia:idMedia, v:v },
       success:function(data){
           //console(data.success);
       }
   });
}

function mediaRemoveAvaliacao(idMedia){
    // ajax to chance value of likes in the database
    $.ajax({
       Method:'POST',
       url:"/user/deleta-avaliacao",
       data:{idMedia:idMedia},
       success:function(data){
           //console(data.success);
       }
   });
}

$(document).ready(function(){

    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){

        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
        });
    });
    
    $(document).on('click','.btnChangeValueVoteInput',function (e) {

        const value = $(this).data('star') ;
        $('#voteUser').val(value);
        $("#btnRating").prop("disabled",false);
        //console.log(cont);

        v = value

        if(cont % 2 === 0 && v===1){
            console.log("estrelas apagadas!")
            f = true
        }else
            f = false

        //console.log(value);
    });

    $(document).on('click','.btnChangeValueVoteInput2',function (e) {
        idMedia = $('#hd-val-rank').val();
        $("#myToast").toast({ delay: 3000 });
        $("#myToast").toast('show');
        if(f){
            console.log('deletar avaliacao')
            mediaRemoveAvaliacao(idMedia);
        }else{
            //console.log(v)
            mediaAvaliacao(idMedia,v);
        }   
    });
});