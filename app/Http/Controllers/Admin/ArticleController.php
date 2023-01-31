<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    // articles list page
    public function articlesPage(){
        $articles = Post::with('postContents')->paginate(6);
        return view('articles.articles',['articles'=>$articles]);
        // $post = Post::get();
        // $post_content = PostContent::get();
        // return view('articles.articles',['post'=>$post,'post_content'=>$post_content]);
    }

    // upload article page
    public function uploadArticle(){
        return view('articles.create');
    }

    public function saveArticle(Request $request){
        $this->validateData($request);
        $data = $this->getHeroData($request);

        //save hero image
        if($request->hasFile('hero_image')){
            $hero_image = $request->file('hero_image');
            $filename = uniqid().'_'.$hero_image->getClientOriginalName();
            // $hero_image->move(public_path().'/heroImage',$filename);
            Storage::disk('public')->put('heroImage/'.$filename,File::get($hero_image));
            $data['hero_image'] = $filename;
        }

        Post::create($data);
        $post = Post::where('title',$request->title)->first();
        $content_images = [];

        //save post
        foreach($request->content as $content){
            PostContent::create([
                'post_id' => $post->id,
                'content' => $content,
            ]);
            }

        $content = PostContent::where('post_id',$post->id)->get();

        //save content image to storage
        foreach($request->file('image') as $img){
            $filename = uniqid().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put('postImage/'.$filename,File::get($img));
            $content_images[] = $filename;
        }

        //save content image to database
        for($i=0;$i<count($content_images);$i++){
            PostContent::where('id',$content[$i]->id)
                ->update([
                    'image' => $content_images[$i]
                ]);
                }

        return redirect()->back();
    }

    public function detail($id){
        $article = Post::where('id',$id)->with('postContents')->first();
        return view('articles.detail',['article'=>$article]);
    }

    public function edit($id){
        $article = Post::where('id',$id)->with('postContents')->first();
        return view('articles.edit',['article'=>$article]);
    }

    public function update(Request $request,$id){
        $article = Post::where('id',$id)->with('postContents')->first();
        $this->validateData($request,'update');
        $data = $this->getHeroData($request);

        //save hero image
        if($request->hasFile('hero_image')){
            Storage::delete('public/heroImage'.$article->hero_image);
            $hero_image = $request->file('hero_image');
            $filename = uniqid().'_'.$hero_image->getClientOriginalName();
            // $hero_image->move(public_path().'/heroImage',$filename);
            Storage::disk('public')->put('heroImage/'.$filename,File::get($hero_image));
            $data['hero_image'] = $filename;
        }

        Post::where('id',$id)->update($data);
        // $post = Post::where('id',$id)->first();
        $content_images = [];

        //save post
        foreach($request->content as $content){
            PostContent::where('post_id',$id)->update(['content' => $content]);
            }

        // $content = PostContent::where('post_id',$id)->get();

        if($request->hasFile('image.*')){
            //save content image to storage
            foreach($request->file('image') as $img){
                foreach($article->postContents as $content){
                    Storage::delete('public/postImage'.$content->image);
                }
                $filename = uniqid().'_'.$img->getClientOriginalName();
                Storage::disk('public')->put('postImage/'.$filename,File::get($img));
                $content_images[] = $filename;
            }
             //save content image to database
        for($i=0;$i<count($content_images);$i++){
            PostContent::where('post_id',$id)
                ->update([
                    'image' => $content_images[$i]
                ]);
                }
        }

        return redirect()->back();

    }

    //validation
    private function validateData($request,$status){
        $validate = [
            'title' => 'required',
            'category_id' => 'required',
            // 'hero_image' => 'required|mimes:png,jpg,jpeg',
            'author_name' => 'required',
            'content.*' => 'required',
            'image.*' => 'mimes:png,jpg,jpeg'
        ];

        $validate['hero_image'] = $status == 'update' ?  'mimes:png,jpg,jpeg' :  'required|mimes:png,jpg,jpeg';
        Validator::make($request->all(),$validate)->validate();
    }

    //get input data
    private function getHeroData($request){
        return[
            'title' => $request->title,
            'category_id' => $request->category_id,
            'author_name' => $request->author_name
        ];
    }

}
