@include('header')

<div class="mt-1 container">
	<div class="row text-white p-2">
        <img class='rounded border' style='width:100%;max-height:400px' src='/users-img/wallpaper.jpg' alt='error'>
        
        <div class='rounded border mt-1 col-3 text-white bg-dark'>
            <img class='mt-1 img-fluid' src='/users-img/no-photo.png' alt='error'>
            <div class='text-center'>
                <span>{{$user->name}}</span>
            </div>
            <hr>
            <div style='font-size:14px' class='mt-2 mb-2 text-left'>  
                <span class='d-block'>Seguindo</span><hr>
                <span class='d-block'>Seguidores</span><hr>
                <span class='d-block'>Fotos</span><hr>
                <span class='d-block'>Editar Perfil</span><hr>
                <span class='d-block'>Bau de mídias</span><hr>
                <span class='d-block'>Minhas favoritas</span>
            </div>
        </div>

        <div class='mt-1 col-5 text-white text-center'>
            
        </div>

        <div class='mt-1 col-4 text-white text-center'>
            <span>Conquistas</span>
        </div>
    </div>
</div>

@include('footer')