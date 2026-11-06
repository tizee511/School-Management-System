<?php

namespace App\Trait;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{

    // public function uploadFile ($request, $name, $folder)
    // {
    //     $file_name = $request->file ($name)->getClientOriginalName ();
    //     $request->file($name)->storeAs('attachments/',$folder.'/'.$file_name,'upload_attachments');

    // }

    // public function deleteFile ($name)
    // {
    //     $exists = Storage::disk ('upload_attachments')->exists ('attachments/library/'.$name);
    //     if ($exists)
    //     {
    //         Storage::disk ('upload_attachments')->delete ('attachments/library/'.$name);
    //     }
    // }

    public function verifyAndStoreImage (Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
        {

        if ($request->hasFile ($inputname))
            {

            // Check img
            if (! $request->file ($inputname)->isValid ())
                {
                flash ('Invalid Image!')->error()->important ();
                return redirect ()->back ()->withInput ();
                }

            $photo    = $request->file ($inputname);
            $name     = \Str::slug ($request->input ('Name'));
            $filename = $name.'.'.$photo->extension ();


            // insert Image
            $Image                 = new Image();
            $Image->filename       = $filename;
            $Image->imageable_id   = $imageable_id;
            $Image->imageable_type = $imageable_type;
            $Image->save ();
            return $request->file ($inputname)->storeAs ($foldername, $filename, $disk);

            }
            /*
            f($request->hasfile('photos'))
                {
                    foreach($request->file('photos') as $file)
                    {
                        


                        
                        // insert in image_table
                        $images= new Image();
                        $images->filename=$file->getClientOriginalName();
                        $images->imageable_id= $students->id;
                        $images->imageable_type = 'App\Models\Student';
                        $images->save();

                        $file->storeAs('attachments/students/'.$students->Name,'upload_attachments');
                    }
                }
             */

        return null;

        }
    public function Delete_attachment ($disk, $path, $id, $filename)
    {
        \Storage::disk ($disk)->delete ($path);
        Image::where ('imageable_id', $id)->orWhere ('filename', $filename)->delete ();
    }

}
