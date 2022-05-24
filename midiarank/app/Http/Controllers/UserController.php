<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Media;
use App\Models\MediaLike;
use App\Models\MediaAvaliacao;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function myProfile(){
        $user = Auth::user();
        return view('my-profile',compact('user'));
    }

    public function like(Request $request){
        $user = Auth::user();
        $like = $request->likes;
        $idMedia = $request->idMedia;

        $hasAlready = MediaLike::where('user_id', $user->id)->where('media_id', $idMedia)->value('like');

        if(!$hasAlready){ // not liked the media

            $saveLikeUser = Media::find($idMedia);
            $saveLikeUser->likes = $like;
            $saveLikeUser->save();

            // save like of user in aux table
            $mediaLike = new MediaLike;

            $mediaLike->like = true;
            $mediaLike->user_id = $user->id;
            $mediaLike->media_id = $idMedia;
            $mediaLike->created_at = Carbon::now();
            $mediaLike->updated_at = Carbon::now();
            $mediaLike->save();

        // return response()->json([
        //     'success'=>'success'
        // ]);

        }
    }

    public function dislike(Request $request){
        $user = Auth::user();

        $like = $request->likes;
        $idMedia = $request->idMedia;

        $saveLikeUser = Media::find($idMedia);
        $saveLikeUser->likes = $like;
        $saveLikeUser->save();

        // delete from aux table the like from user to the specific media
        MediaLike::where('user_id', $user->id)->where('media_id', $idMedia)->delete();

        // return response()->json([
        //     'success'=>'success'
        // ]);
    }

    public function avaliacao(Request $request){
        $user = Auth::user();
        $avaliacao = $request->v;
        $idMedia = $request->idMedia;

        $hasAlready = MediaAvaliacao::where('user_id', $user->id)->where('media_id', $idMedia)->value('avaliacao');

        if(!$hasAlready){
            
            $mediaAvaliacao = new MediaAvaliacao;

            $mediaAvaliacao->avaliacao = $avaliacao;
            $mediaAvaliacao->user_id = $user->id;
            $mediaAvaliacao->media_id = $idMedia;
            $mediaAvaliacao->created_at = Carbon::now();
            $mediaAvaliacao->updated_at = Carbon::now();
            $mediaAvaliacao->save();

        // return response()->json([
        //     'success'=>'success'
        // ]);

        }else
            MediaAvaliacao::where('user_id', $user->id)->where('media_id', $idMedia)->update(['avaliacao' => $avaliacao]);
            
    }

    public function deletaAvaliacao(Request $request){
        $user = Auth::user();
        $idMedia = $request->idMedia;

        // delete from aux table the like from user to the specific media
        $hasAlready = MediaAvaliacao::where('user_id', $user->id)->where('media_id', $idMedia)->value('avaliacao');

        if($hasAlready){
            MediaAvaliacao::where('user_id', $user->id)->where('media_id', $idMedia)->delete();
        }

        // return response()->json([
        //     'success'=>'success'
        // ]);
    }
}
