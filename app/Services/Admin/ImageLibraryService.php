<?php

namespace App\Services\Admin;

use Storage;
use Carbon\Carbon;

class ImageLibraryService {
  public function create($path, $image) { 
    $fileName = Carbon::now()->timestamp; 
    
    Storage::disk('local')->put($path . $image, 'Contents');
  }
}