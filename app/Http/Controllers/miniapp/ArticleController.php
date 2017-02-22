<?php

namespace app\Http\Controllers\miniapp;

/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\User;
use App\Product;
use App\Article;
use Redirect;

//小程序首页数据
class ArticleController extends Controller
{	

	//查询帮助中心下的所有分类
	public function index(){

		$articles = Article::join('article_categories','articles.category_id','=','article_categories.id')
				->where('article_categories.display_name','=','帮助中心')
				->orWhere('article_categories.name','=','help-us')
				->groupBy('articles.id')
				->select('articles.id','articles.title')
				->get();
		return  response()->json($articles);
	}

	//查询单个分类下的内容
	public function articleContent($id){

		$article = Article::select('content')->find($id);
		return  response()->json($article);
	}
}
