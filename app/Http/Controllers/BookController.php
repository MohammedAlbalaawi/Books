<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Department;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $flashMsg = session('success');
        return view('books.index',compact('books','flashMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $departments = Department::all();

        return view('books.create',
            compact(
                'authors',
                'departments')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

        $author = Author::all()->where('name','=',$request->authorName)->first();
        $department = Department::all()->where('name','=',$request->departmentName)->first();

        // Get Image Path
        $imageName = $request->file('bookImage')->getClientOriginalName();
        $path = $request->file('bookImage')->storeAs('books',$imageName,'publicImages');

        $book = Book::create([
            'title' => $request->title,
            'author_id' => $author->id
        ]);

        $book->bookdetail()->create([
            'department_id' => $department->id,
            'language' => $request->language,
            'year' => $request->year,
            'image' => $path
        ]);

        return redirect()
            ->route('books.index')
            ->with('success','Book Added SUCCESSFULLY');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
