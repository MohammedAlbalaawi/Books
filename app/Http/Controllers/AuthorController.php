<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Author::class ,'model');

        $this->middleware('auth:web')->only(['create','store','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $authors = Author::all();
        $flashMsg = session('success');
        return view('authors.index', compact('authors', 'flashMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->all());

        session()->flash('success', 'Author successfully created!');
        return response()->json(['success' => true]);
    }

    /**
     * @param Author $model
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Author $model)
    {
        $author = $model;
        return view('authors.show', compact('author'));
    }

    /**
     * @param Author $model
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Author $model)
    {
        $author = $model;

        return view('authors.edit', compact('author'));
    }

    /**
     * @param Request $request
     * @param Author $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Author $model)
    {
        $model->update($request->all());

        return redirect()
            ->route('authors.index')
            ->with('success', 'Author Edited SUCCESSFULLY');
    }

    /**
     * @param Author $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Author $model)
    {
        $model->delete();

        return redirect()
            ->route('authors.index')
            ->with('success', 'Author and His Books Deleted SUCCESSFULLY');
    }
}
