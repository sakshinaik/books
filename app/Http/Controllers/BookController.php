<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Filesystem\Filesystem;

use App\Book;

use App\Http\Requests\BookRequest;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = \App\Book::where(['user_id' => Auth::user()->id])->get();

        return view('home', ['books' => $books]);
    }

    /**
     * Create a new book
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('book.add')->with('book', new \App\Book);
    }

    /**
     * Update an existing book
     *
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Book $book)
    {
        return view('book.add')->with('book', $book);
    }

    /**
     * Store a book in the database and the image on s3
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request, \App\Book $book)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = Auth::user()->id;

        $filePath = $book->image_path;        

        if($request->has('image')) {
            if(!is_null($filePath)) {
                \Storage::disk('s3')->delete($filePath);
            }

            $filePath = '/book-covers/' . Auth::user()->id . '/' . microtime() . '.' . $data['image']->getClientOriginalExtension();
            \Storage::disk('s3')->put($filePath, file_get_contents($data['image']), 'public');
        } elseif(!is_null($book->image_path)) {
            $filePath = $book->image_path;
        }

        unset($data['image']);
        $data['image_path'] = $filePath;

        $book = \App\Book::updateOrCreate(['id' => $book['id']], $data);

        return redirect()->route('home');
    }

    /**
     * Delete a book
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(BookRequest $request, \App\Book $book) 
    {
        if(!is_null($book->image_path)) {
            \Storage::disk('s3')->delete($book->image_path);
        }

        $book->delete();

        return response()->json($book);
    }
}