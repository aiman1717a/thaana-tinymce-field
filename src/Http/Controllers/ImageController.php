<?php
namespace Aiman\ThaanaTinymceField\Http\Controllers;

use Energon7\MenuBuilder\Http\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;


class ImageController extends Controller
{

    public function saveImage(NovaRequest $request)
    {
        try{

            if (!$request->hasFile('file') && !$request->file('file')->isValid()) {
               throw new Exception('File Missing');
            }
            $file = $request->file('file');
            if(!$this->checkMimeType($file)) {
                throw new Exception('Mime type mismatch');
            }

            if(!$this->checkExtension($file)) {
                throw new Exception('Extension mismatch');
            }

            $newName =  Str::random(10);
            $request->file('file')->storeAs('tinymce', $newName . '.'. $file->getClientOriginalExtension(), 'public');

            return response()->json(['location' => '/storage/tinymce/' . $newName . '.jpg']);

        } catch (Exception $exception){
            return response()->json(['error' => $exception->getMessage()]);
        }

    }

    private function checkMimeType($file) {
        $allowedMimes = ['image/jpeg', 'image/png'];
        if (in_array(strtolower($file->getClientMimeType()), $allowedMimes)) {
            return true;
        }
        return false;
    }
    private function checkExtension($file) {
        $allowedExt = ['jpg', 'jpeg', 'png'];
        if (in_array(strtolower($file->getClientOriginalExtension()), $allowedExt)) {
            return true;
        }
        return false;
    }

}
