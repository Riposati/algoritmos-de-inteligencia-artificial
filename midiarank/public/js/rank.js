$(function () {
    
    //Begin filter rank
    //$('#list div').hide();
    $('#mediaTags').on('keyup', function () {
        $('#mediaTagsname').html('You selected: ' + this.value);
        filterTags(this.value);
    });
    
    function filterTags(search) {
        $('#list div').each(function(el) { 
            var text = $(this).text();
            if(!text) {
                return;
            }
            var regex = new RegExp(search, 'i');
            
            if(regex.test(text)) { 
                $(this).show() 
            }else { 
                $(this).hide(); 
            } 
        })
    } // end of rank filter

    //Begin pagination
    var page = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });
    function loadMoreData(page){

        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {   
                //console.log(data);
                if(data.html == ""){
                    $('.ajax-load').html("Fim dos conteudos");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('Servidor nao respondendo...');
            });
    }// End of ajax pagination
});