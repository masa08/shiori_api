<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
  public function getAll()
  {
    return Book::orderBy('created_at', 'desc')->get();
  }

  public function getFirstByIsbn($isbn)
  {
    return Book::where('isbn', $isbn)->first();
  }

  public function create($book_data)
  {
    $book = new Book();

    $book->title           = $book_data["title"];
    $book->isbn            = $book_data["isbn"];
    $book->author          = $book_data["author"];
    $book->publisher_name  = $book_data["publisherName"];
    $book->item_caption    = $book_data["itemCaption"];
    $book->sales_date      = $book_data["salesDate"];
    $book->large_image_url = $book_data["largeImageUrl"];

    $book->save();

    return $book;
  }
}
