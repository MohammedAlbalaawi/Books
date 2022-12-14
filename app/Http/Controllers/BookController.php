<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookEdittRequest;
use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Department;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class BookController extends Controller
{


    public function __construct(){
        $this->middleware('auth:web')->only(['create','store','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $flashMsg = session('success');
        return view('books.index', compact('books', 'flashMsg'));
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

        return view(
            'books.create',
            compact(
                'authors',
                'departments'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

        $author = Author::all()->where('name', '=', $request->authorName)->first();
        $department = Department::all()->where('name', '=', $request->departmentName)->first();

        // Get Image Path
        $imageName = $request->file('bookImage')->getClientOriginalName();
        $path = $request->file('bookImage')->storeAs('books', $imageName, 'publicImages');


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
            ->with('success', 'Book Added SUCCESSFULLY');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findorfail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findorfail($id);
        $authors = Author::all();
        $departments = Department::all();
        return view('books.edit', compact('book', 'authors', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookEdittRequest $request, Book $book)
    {

        $author = Author::where('name', '=', $request->authorName)->first();
        $department = Department::where('name', '=', $request->departmentName)->first();


        $book->update([
            'title' => $request->title,
            'author_id' => $author->id
        ]);

        $book->bookdetail()->update([
            'department_id' => $department->id,
            'language' => $request->language,
            'year' => $request->year
        ]);

        if ($request->hasfile('bookImage')) {
            // Get Image Path
            $imageName = $request->file('bookImage')->getClientOriginalName();
            $path = $request->file('bookImage')->storeAs('books', $imageName, 'publicImages');

            $book->bookdetail()->update([
                'image' => $path
            ]);
        }

        return redirect()
            ->route('books.index')
            ->with('success', 'Book Edited SUCCESSFULLY');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book Deleted SUCCESSFULLY');
    }
}
