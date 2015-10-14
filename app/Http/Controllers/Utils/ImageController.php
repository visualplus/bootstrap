<?php

namespace App\Http\Controllers\Utils;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Storage;
use Response;

class ImageController extends Controller
{
	/**
     * storage에 저장된 이미지를 가져옴
     *
	 * @param string $size
	 * @param string $path
	 * 
     * @return string
     */
    public function getImage($size, $path) {
    	if (Storage::exists($path)) {
    		$mimeType = Storage::mimeType($path);
			$size = Storage::size($path);
			
    		return Response::make(Storage::get($path), 200, ["Content-Type" => $mimeType, "Content-Length" => $size]);
    	} else {
    		echo $path;
    	}
    }
}
