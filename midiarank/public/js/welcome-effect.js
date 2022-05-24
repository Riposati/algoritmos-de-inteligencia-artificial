$('document').ready(function(){ // after jquery is ready ...
    
    $('.pacman-loading-div').css('display', 'none');
    $('.content').css('display' , 'block');

    window.addEventListener('load', function(){
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
        }
        });

        new Glider(document.querySelector('.glider-2'), {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots-2',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
        }
        });

        new Glider(document.querySelector('.glider-3'), {
            slidesToShow: 5,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots-3',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
        }
        });
    });
});