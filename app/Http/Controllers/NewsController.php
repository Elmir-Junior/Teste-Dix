<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $search = request('search');
        $user = auth()->user();

        if ($search) {
            $news =
                News::where('titulo', 'like', '%' . $search . '%')
                ->where('user_id', $user->id)->get();
        } else
            $news = News::where('user_id', $user->id)->get();


        return view('news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $news = new News();
        $user = auth()->user();

        $news->conteudo = $request->conteudo;
        $news->titulo = $request->titulo;
        $news->user_id = $user->id;

        //image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/news'), $imageName);

            $news->image = $imageName;
        }

        $news->save();

        return redirect()->route('news.index')->with('msg', 'Noticia criada com sucesso');
    }

    public function show(News $news)
    {
        return view('news.show', ['news' => $news]);
    }

    public function edit(News $news)
    {
        return view('news.edit', ['news' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $data = $request->all();

        //image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/news'), $imageName);

            $data['image'] = $imageName;
        }

        $news->update($data);

        return redirect()->route('news.index')->with('msg', 'Noticia Atualizada com sucesso');
    }

    public function delete($id)
    {
        $new = News::findorfail($id);
        return view('news.delete', ['new' => $new]);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('msg', 'Noticia Excluida com sucesso');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = User::search($search)->paginate(5);

        return view('products.index', compact('search', 'news'));
    }
}
