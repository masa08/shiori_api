<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BookService;


class BookController extends Controller
{
    public function __construct(
        BookService $bookService
    ) {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAll();

        return response()->json([
            'books' => $books,
        ]);
    }
}
