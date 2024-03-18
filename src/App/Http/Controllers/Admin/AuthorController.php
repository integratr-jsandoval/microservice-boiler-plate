<?php
namespace MicroService\App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Laravel\Lumen\Routing\Controller as BaseController;
use MicroService\App\Requests\AuthorStoreRequest;
use MicroService\App\Resources\AuthorResource;
use MicroService\App\Services\AuthorService;

class AuthorController extends BaseController
{
    protected $authorService;
    
        public function __construct(AuthorService $authorService)
        {
            $this->authorService = $authorService;
        }
        /**
         * store data
         *
         * @param AuthorStoreRequest $request
         *
         * @return AuthorResource
         */
        public function storeAuthor(AuthorStoreRequest $request): AuthorResource {
            $author = $this->authorService->storeAuthor($request->validated());
            return new AuthorResource($author);
        }
      
        public function getAuthor()
        {
            $author = $this->authorService->getAuthor();
            return AuthorResource::collection($author);
        }
        /**
         * display data
         *
         * @param string $authorId
         *
         * @return AuthorResource
         */
        public function showAuthor(string $authorId): AuthorResource
        {
            $author = $this->authorService->showAuthor($authorId);
            return new AuthorResource($author);
        }
        /**
         * delete data
         *
         * @param string $authorId
         *
         * @return JsonResponse
         */
        public function deleteAuthor(string $authorId): JsonResponse
        {
            $author = $this->authorService->deleteAuthor($authorId);
            return response()->json(['message' => 'Author has Successfully Deleted!'], 200);
        }
        /**
         * update data
         *
         * @param AuthorStoreRequest $request
         * @param string $authorId
         *
         * @return AuthorResource
         */
        public function updateAuthor(AuthorStoreRequest $request, string $authorId): AuthorResource
        {
            $author = $this->authorService->updateAuthor($request->validated(), $authorId);
            return new AuthorResource($author);
        }
    
        
    }
