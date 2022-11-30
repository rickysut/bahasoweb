<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    
    public function list()
    {
        return  Array(
            'message' => '200',
            'data' => Article::with('author')->select()->get(),
        );     
    }

    public function index(User $author)
    {
        return  Array(
            'message' => '200',
            'data' => Article::with('author')->where('user_id', $author->id)->select()->get(),
        ); 
    }

    
    public function create(Request $request, $authorId)
    {
        $author=User::find($authorId);
        if ($author){
            $article = Article::create($request->all());

            return  Array(
                'message' => '200',
                'data' => $article->load([])->where('id', $article->id)->with('author')->get(),
            ); 
        } else return Array(
            'message' => '404',); // author not found
    }

    
    public function show(Article $article)
    {
        return  Array(
            'message' => '200',
            'data' => $article->load([])->where('id', $article->id)->with('author')->get(),
        ); 
    }

    
    
    public function update(Request $request,  Article $article)
    {
        $article->update($request->only('title','body','picture'));

        return Array(
            'message' => '200',
            'data' => $article->load([])->where('id', $article->id)->with('author')->get(),
        );
    }

    
    public function delete($id)
    {
        $data=Article::find($id);
        if ($data){
            $data->delete();
            return Array(
                'message' => '200',
                
            );
        }
        else return Array(
            'message' => '204',);
    }
}
