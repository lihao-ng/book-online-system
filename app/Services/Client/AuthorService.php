<?php

namespace App\Services\Client;

use App\Author;
use Illuminate\Http\Request;
use App\Services\TransformerService;
use App\Services\Client\ImageLibraryBookService;

class AuthorService extends TransformerService {
  protected $imageLibraryService;
  
  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

  public function search(Request $request){
    $authors = Author::where('name', 'like', "%{$request->author}%")->limit(10)->get();

    return $this->transformCollection($authors);
  }

  public function transform($author){
    return [
      'id' => $author->id,
      'name' => $author->name,
      'description' => $author->description,
      'penName' => $author->pen_name,
      'birthday' => $author->birthday,
      'birthPlace' => $author->birth_place,
      'image' => $this->imageLibraryService->fullPath($author->image)
    ];
  }
}
