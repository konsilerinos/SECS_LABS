<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Показать список всех статей.
     *
     * @return \Illuminate\Http\Response
     */
    public function showArticles(Request $request)
    {
        $token = $request->input('tokenInput');
        $name  = $request->input('nameInput');
        $tag   = $request->input('tagInput');

        if ($tag == "") {
            $articles = DB::table('articles')
                            ->select('articles.id', 'name', 'token', 'text', 'dateOfCreated', 'author')
                            ->where('token', 'LIKE', '%'.$token.'%')
                            ->where('name', 'LIKE', '%'.$name.'%')
                            ->orderBy('articles.id', 'asc');
        }
        else {
            $articles = DB::table('articles')
                            ->select('articles.id', 'articles.name', 'articles.token', 'text', 'dateOfCreated', 'author')
                            ->where('articles.token', 'LIKE', '%'.$token.'%')
                            ->where('articles.name', 'LIKE', '%'.$name.'%')
                            ->where('tags.name', 'LIKE', '%'.$tag.'%')
                            ->leftJoin('articleTags', 'articles.id', '=', 'articleTags.articleId')
                            ->join('tags', 'tags.id', '=', 'articleTags.tagId')
                            ->distinct()
                            ->orderBy('articles.id', 'asc');
        }

        return view('posts', ['articles' => $articles->paginate(15)]);
    }

    public function showArticle(Request $request, string $code)
    {
        $article = Article::where('token', '=', $code)
                            ->firstOrFail();
        $tags = [];
        $tags = DB::table('articles')
                        ->select('tags.name')
                        ->leftJoin('articleTags', 'articleTags.articleId', '=', 'articles.id')
                        ->join('tags', 'articleTags.tagId', '=', 'tags.id')
                        ->where('articles.id', '=', $article->id)
                        ->paginate(15);

        return view('postsCode', ['article' => $article, 'tags' => $tags]);
    }
}
