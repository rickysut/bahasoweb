<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    
    public function list()
    {
        return  response()->json([
            'message' => 'Article list',
            'data' => Article::with('author')->select()->get()],
            200
        );     
    }

    public function index()
    {
        $author = Auth::user();
        if ($author){
            return  response()->json([
                'message' => '200',
                'data' => Article::with('author')->where('user_id', $author->id)->select()->get()],
                200
            ); 
        } else return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    
    public function create(Request $request)
    {
        
        if (Auth::user()->role == 'author'){
            $article = Article::create($request->all());

            return  response()->json([
                'message' => 'Article Created',
                'data' => $article->load([])->where('id', $article->id)->with('author')->get()],
                200
            ); 
        } else return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    
    public function show($id)
    {
        $article=Article::find($id);
        if ($article){
            return  response()->json([
                'message' => 'Article show',
                'data' => $article->load([])->where('id', $article->id)->with('author')->get()],
                200
            ); 
        } else return response()->json([
            'message' => 'Article not found'
        ], 404);
        
    }

    
    
    public function update(Request $request,  $articleId)
    {
        if (Auth::user()->role == 'author'){
            $article = Article::find($articleId);
            if ($article){
                $article->update($request->only('title','body','picture'));

                return response()->json([
                    'message' => 'Article updated',
                    'data' => $article->load([])->where('id', $article->id)->with('author')->get()], 
                    200
                );
            } else {
                return response()->json([
                    'message' => 'Article not found'
                ], 404);
            }
        } else return response()->json([
                        'message' => 'Unauthorized'
                    ], 401);
        
    }

    
    public function delete($id)
    {
        if (Auth::user()->role == 'author'){
            $article=Article::find($id);
            if ($article){
                $article->delete();
                return response()->json([
                    'message' => 'Article deleted'
                ], 200);
                
            } else {
                return response()->json([
                    'message' => 'Article not found'
                ], 404);
            }
        }
        else return response()->json([
                        'message' => 'Unauthorized'
                    ], 401);
    }
}
