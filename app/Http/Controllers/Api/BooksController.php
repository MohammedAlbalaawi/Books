<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Book::all();
        //return Book::all(['id', 'title']);
        //return response()->json(['status' => '200', 'data' => Book::all()]);
        return BookResource::collection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('books', 'publicImages');
        }

        $book = Book::create(Arr::only($data, ['title', 'author_id']));

        $book->bookdetail()->create(Arr::only($data, [
            'department_id',
            'language',
            'year',
            'image'
        ]));

        return response()->json('success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //return Book::with('Author','BookDetail')->find($id);
        //return $book->load('Author','BookDetail');
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookRequest $request, Book $book)
    {
        $data = $request->validated();

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('books', 'publicImages');
        }

        $book->update(Arr::only($data, ['title', 'author_id']));

        $book->bookdetail()->update(Arr::only($data, [
            'department_id',
            'language',
            'year',
            'image'
        ]));

        return response()->json('success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
    }
}
