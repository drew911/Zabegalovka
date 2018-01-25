<?php
namespace App\Helpers;
class ImageHelper
{


  public function generateUrl($image){
     $imageUrl = explode ("/", $image->file_name);
     $imageUrl[0]='storage';
     $imageUrl = implode ('/', $imageUrl);
     return asset($imageUrl);
   }

    // public function deleteOne($image)
    // {
    //     $this->deleteOneFromFileSystem($image);
    //     $image->delete();
    // }
    // /**
    //  * @param $image
    //  */
    // protected function deleteOneFromFileSystem($image)
    // {
    //     $path = storage_path('app/' . $image->file_name);
    //     if (file_exists($path)) {
    //         unlink($path);
    //     }
    // }
}
