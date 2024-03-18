<?php

namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\BookStoreRequest;
use MicroService\App\Resources\BookResource;
use MicroService\App\Services\BookService;

class BookController extends BaseController
{
        protected $bookService;
    
        public function __construct(BookService $bookService)
        {
            $this->bookService = $bookService;
        }

        /**
         * store data
         *
         * @param BookStoreRequest $request
         *
         * @return BookResource
         */
        public function storeBook(BookStoreRequest $request): BookResource {
            $book = $this->bookService->storeBook($request->validated());
            return new BookResource($book);
        }
        /**
         * get data
         *
         * @return void
         */
        public function getBook()
        {
            $book = $this->bookService->getBook();
            return BookResource::collection($book);
        }
        /**
         * displaying data
         *
         * @param string $bookId
         *
         * @return BookResource
         */
        public function showBook(string $bookId): BookResource
        {
            $book = $this->bookService->showBook($bookId);
            return new BookResource($book);
        }
        /**
         * deleting data
         *
         * @param string $bookId
         *
         * @return JsonResponse
         */
        public function deleteBook(string $bookId): JsonResponse
        {
            $book = $this->bookService->deleteBook($bookId);
            return response()->json(['message' => 'Book has Successfully Deleted!'], 200);
        }
        /**
         * update data
         *
         * @param BookStoreRequest $request
         * @param string $bookId
         *
         * @return BookResource
         */
        public function updateBook(BookStoreRequest $request, string $bookId): BookResource
        {
            $book = $this->bookService->updateBook($request->validated(), $bookId);
            return new BookResource($book);
        }
    
}