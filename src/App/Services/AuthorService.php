<?php
namespace MicroService\App\Services;

// use AuthorService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Resources\Json\ResourceCollection;
use MicroService\App\Exceptions\CreateExceptions;
use MicroService\App\Exceptions\NotFoundException;
use MicroService\App\Exceptions\UpdateException;
use MicroService\App\Models\Author;


class AuthorService
{
    public function storeAuthor(array $payload): Author
    {
        // $author = Author::create($payload);
        // return $author;

        $author = Author::create($payload);
        // $employee = Employee::create($payload);
        // return $employee;
        try {
             $author = Author::create($payload);
        } catch (QueryException $e) {
            throw new CreateExceptions($e);
        }
        return $author;
    }
    public function getAuthor()
    {
        $author = Author::get();
        return $author;
    }

    public function showAuthor(string $authorId): Author
    {
        $author = Author::findOrFail($authorId);
        return $author;
        // $employee = Employee::findOrFail($employeeId);
        // return $employee;
        return $this->findOrFailauthor($authorId);
    }

    public function deleteAuthor(string $authorId): Author
    {
        $author = Author::findOrFail($authorId);
        $author->delete();
        return $author;
    }


    public function updateAuthor(array $payload, string $authorId): Author
    {
        $author = Author::where('id', $authorId)->firstOrfail();
        $author->update($payload);
        return $author;
        $author = $this->findOrFailauthor($authorId);
        try {
            $author->update($payload);
        } catch (QueryException $e) {
            throw new UpdateException($e);
        }
            return $author;
    }

    public function findOrFailauthor(string $authorId): Author
    {
        // return  $employee = Employee::findOrFail($employeeId);
        try {
            return Author::findOrFail($authorId);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException($e);
        }
    }

}


