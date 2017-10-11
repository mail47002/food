<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Article;
use App\ArticleImage;
use File;


class ArticlesController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {

    	return view('frontend.profile.article_new', [
        ]);
    }

    public function create(Request $request)
    {

    	// dd($request);
        $user = Auth::user();
        $article = new Article;
        $article->name = $request->name;
        $article->slug = str_slug($request->name);
        $article->user_id = $user->id;
        $article->description = $request->description;
        $article->image = '';
        $article->status = 1;
        $article->videos = json_encode($request->videos);
        $article->save();

        $i = 0;

        $path   = 'uploads/articles/' . $article->id. '/';
        File::deleteDirectory($path);
        File::makeDirectory($path, 0777, true, true);

        foreach($request->file() as $files){
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $file->move($path, $name);
                $articleImage = new ArticleImage;
                $articleImage->article_id = $article->id;
                $articleImage->image = $path . $name;
                $articleImage->status = 1;
                $articleImage->alt = 'article';
                $articleImage->sort_order = $i;
                $articleImage->save();
                if($i == $request->main){
                    $article->image = $path . $name;
                    $article->save();
                }
                $i++;
            }
        }

        return redirect()
                ->route('profile.articles');

    }

    public function edit($id)
    {

        $article = Article::where('id', $id)->with(['images'])->first();
        return view('frontend.profile.article_edit',[
            'article' => $article,
        ]);

    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $article = Article::find($request->id);
        $article->name = $request->name;
        $article->slug = str_slug($request->name);
        $article->user_id = $user->id;
        $article->description = $request->description;
        $article->image = '';
        $article->status = 1;
        $article->videos = json_encode($request->videos);
        $article->save();

        $i = 0;

        $path   = 'uploads/articles/' . $article->id. '/';
        File::deleteDirectory($path);
        File::makeDirectory($path, 0777, true, true);

        foreach($request->file() as $files){
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $file->move($path, $name);
                $articleImage = new ArticleImage;
                $articleImage->article_id = $article->id;
                $articleImage->image = $path . $name;
                $articleImage->status = 1;
                $articleImage->alt = 'article';
                $articleImage->sort_order = $i;
                $articleImage->save();
                if($i == $request->main){
                    $article->image = $path . $name;
                    $article->save();
                }
                $i++;
            }
        }

        return redirect()
                ->route('profile.articles');


    }

    public function desroy($id)
    {

        $article = Article::where('id', '=', $id)->delete();
        return redirect()
                ->route('profile.articles');

    }
}
