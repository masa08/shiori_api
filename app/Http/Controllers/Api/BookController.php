<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return response()->json([
            'books' => $books,
        ]);
    }
}
