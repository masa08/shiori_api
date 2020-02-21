<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\User;
use App\Models\Sentence;

class SentenceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('user_id')) {
            $user_id = $request->input('user_id');
            $sentences = Sentence::where('user_id', $user_id)->with('book')->orderBy('created_at', 'desc')->get();
        } else {
            $sentences = Sentence::with('book')->orderBy('created_at', 'desc')->get();
        }

        return response()->json([
            'sentences' => $sentences,
        ]);
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $isbn = $request->input('isbn');
        $author = $request->input('author');
        $publisherName = $request->input('publisherName');
        $itemCaption = $request->input('itemCaption');
        $salesDate = $request->input('salesDate');
        $largeImageUrl = $request->input('largeImageUrl');

        if (empty(Book::where('isbn', $isbn)->first())) {
            $book = new Book();
            $book->title = $title;
            $book->isbn = $isbn;
            $book->author = $author;
            $book->publisher_name = $publisherName;
            $book->item_caption = $itemCaption;
            $book->sales_date = $salesDate;
            $book->large_image_url = $largeImageUrl;
            $book->save();
        }else{
            $book = Book::where('isbn', $isbn)->first();
        }

        $request_sentence = $request->input('sentence');
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $sentence = new Sentence();
        $sentence->sentence = $request_sentence;
        $sentence->book_id = $book->id;
        $sentence->user_id = $user->id;
        $sentence->save();

        return response()->json([
            'sentence' => "success",
        ]);
    }
}
