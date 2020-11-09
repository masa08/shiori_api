<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\BookService;
use App\Services\SentenceService;

class SentenceController extends Controller
{
    public function __construct(
        BookService $bookService,
        SentenceService $sentenceService
    ) {
        $this->bookService     = $bookService;
        $this->sentenceService = $sentenceService;
    }

    public function index(Request $request)
    {
        $user_id = $request->input('user_id');

        if ($user_id != null) {
            $sentences = $this->sentenceService->getByUserIdWithBooks($user_id);
        } else {
            $sentences = $this->sentenceService->getWithBooks();
        }

        return response()->json([
            'sentences' => $sentences,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $book = $this->bookService->getFirstByIsbn($request->input('isbn'));

        if (empty($book)) {
            $book = $this->bookService->create($data);
        }

        $this->sentenceService->create($data, $book->id);

        return response()->json([
            'sentence' => "success",
        ]);
    }
}
