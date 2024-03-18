<?php
namespace MicroService\App\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use MicroService\App\Exceptions\CreateExceptions;
use MicroService\App\Exceptions\NotFoundException;
use MicroService\App\Exceptions\UpdateException;
use MicroService\App\Models\Book;
use MicroService\App\Resources\BookResource;

class BookService
{
    /**
     * storing data
     *
     * @param array $payload
     *
     * @return Book
     */
    public function storeBook(array $payload): Book
    {
        $book = Book::create($payload);
        try {
             $book = Book::create($payload);
        } catch (QueryException $e) {
            throw new CreateExceptions($e);
        }
        return $book;
    }

    public function getBook()
    {
        $book = Book::get();
        return $book;
    }
    /**
     * display the data
     *
     * @param string $bookId
     *
     * @return Book
     */
    public function showBook(string $bookId): Book
    {
        $book = Book::findOrFail($bookId);
        return $book;
        return $this->findOrFailbook($bookId);
    }
    /**
     * for error handling of show
     *
     * @param string $bookId
     *
     * @return Book
     */
    public function findOrFailbook(string $bookId): Book
    {
        try {
            return Book::findOrFail($bookId);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException($e);
        }
    }
    /**
     * deleting data
     *
     * @param string $bookId
     *
     * @return Book
     */
    public function deleteBook(string $bookId): Book
    {
        $book = Book::findOrFail($bookId);
        $book->delete();
        return $book;
    }
    /**
     * updating data
     *
     * @param array $payload
     * @param string $bookId
     *
     * @return Book
     */
    public function updateBook(array $payload, string $bookId): Book
    {
        $book = Book::where('id', $bookId)->firstOrfail();
        $book->update($payload);
        return $book;
        $book = $this->findOrFailbook($bookId);
        try {
            $book->update($payload);
        } catch (QueryException $e) {   
            throw new UpdateException($e);
        }
            return $book;
    }

}