<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\MediaPhoto;
use App\Models\MediaAvaliacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;  
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function getAllMedias(){
        
        $games = Media::where('type_of_media', 'game')->take(10)->orderBy('release_date', 'desc')->get();
        $movies = Media::where('type_of_media', 'movie')->take(10)->orderBy('release_date', 'desc')->get();
        $series = Media::where('type_of_media', 'serie')->take(10)->orderBy('release_date', 'desc')->get();

        return view('welcome',compact('games', 'movies', 'series'));
    }

    public function showAllGames(Request $request){
        $medias = Media::where('type_of_media', 'game')->orderBy('release_date', 'desc')->paginate(100);

        if ($request->ajax()) {
    		$view = view('data',compact('medias'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('medias',compact('medias'));
    }

    public function showOneGame($id){

        $media = Media::where('type_of_media', 'game')->where('id', $id)->first();
        $arrNomesMidiasRecomendadas = [];

        if(Auth::user()){

            $arrNomesMidiasRecomendadas = $this->leTxtRecomendacoes($id);

            if(!Session::get('saveJson')){ // se ainda n gerou e o usuário estiver logado

               $this->gravaJson();
            }
        }
        return view('media', compact('media', 'arrNomesMidiasRecomendadas'));
    }

    public function showAllMovies(Request $request){
        $medias = Media::where('type_of_media', 'movie')->orderBy('release_date', 'desc')->paginate(100);

        if ($request->ajax()) {
    		$view = view('data',compact('medias'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('medias',compact('medias'));
    }

    public function leTxtRecomendacoes($idMidiaAtual){
        
        $arrNomesMidiasRecomendadas = [];

        if(file_exists(storage_path() . '\app\recomendacoes_usuario_logado_' . Auth::user()->id . '.txt')){

            $file = fopen(storage_path() . '\app\recomendacoes_usuario_logado_' . Auth::user()->id . '.txt', "r");
            $i=0;

            while(!feof($file)) {
                $aux = fgets($file);
                
                if((int)$aux != (int) $idMidiaAtual){ // para não colocar uma recomendação da própria mídia que vc estiver vendo no momento

                    $recomendacoes = Media::get()->where('id', $aux)->toArray();

                    if((int)$aux-1 < 0 )
                        break;

                    $arrNomesMidiasRecomendadas[$i++] = $recomendacoes[(int)$aux-1];
                }
            }
            
            fclose($file);
        }

        return $arrNomesMidiasRecomendadas;
    }

    public function gravaJson(){

        $avaliacoesJson = MediaAvaliacao::get()->toArray();
        $totalMidias = count(Media::get());
        $totalUsuarios = count(User::get());

        $resp = array();
        $nomeUsers = array();
        $resp = array();

        for($i=0;$i<sizeof($avaliacoesJson);$i++){

            $nomeUsers[$i] = User::where('id', $avaliacoesJson[$i]['user_id'])->get('id')->toArray();
            $nomeMidias[$i] = Media::where('id', $avaliacoesJson[$i]['media_id'])->get('id')->toArray();

            $resp[$i]['idUsuario'] = intval(implode($nomeUsers[$i][0]));
            $resp[$i]['idMidia'] = intval(implode($nomeMidias[$i][0]));
            $resp[$i]['avaliacao'] = intval($avaliacoesJson[$i]['avaliacao']);
            $resp[$i]['totalMidias'] = intval($totalMidias);
            $resp[$i]['totalUsuarios'] = intval($totalUsuarios);
            $resp[$i]['idUsuarioLogado'] = intval(Auth::user()->id);
        }
        
        usort($resp, function($a, $b) {return strcmp($a["idUsuario"], $b["idUsuario"]);});
        
        $resp = json_encode($resp, true); // pega o array php e gera um json
    
        Storage::disk('local')->put('avaliacoes.json', $resp); // arquivo com o json pro python, se ja existir o arquivo ele atualiza o conteúdo

        Session::put('saveJson', true); // validacao pra n ficar salvando toda hora
    }

    public function showOneMovie($id){

        $media = Media::where('type_of_media', 'movie')->where('id', $id)->first();
        $arrNomesMidiasRecomendadas = [];

        if(Auth::user()){

            $arrNomesMidiasRecomendadas = $this->leTxtRecomendacoes($id);

            if(!Session::get('saveJson')){ // se ainda n gerou e o usuário estiver logado

               $this->gravaJson();
            }
        }
        return view('media', compact('media', 'arrNomesMidiasRecomendadas'));
    }

    public function showAllSeries(Request $request){
        $medias = Media::where('type_of_media', 'serie')->orderBy('release_date', 'desc')->paginate(100);

        if ($request->ajax()) {
    		$view = view('data',compact('medias'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('medias',compact('medias'));
    }

    public function showOneSerie($id){

        $media = Media::where('type_of_media', 'serie')->where('id', $id)->first();
        $arrNomesMidiasRecomendadas = [];

        if(Auth::user()){

            $arrNomesMidiasRecomendadas = $this->leTxtRecomendacoes($id);

            if(!Session::get('saveJson')){ // se ainda n gerou e o usuário estiver logado

               $this->gravaJson();
            }
        }
        return view('media', compact('media', 'arrNomesMidiasRecomendadas'));
    }
}
