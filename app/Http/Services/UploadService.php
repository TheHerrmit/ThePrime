<?php

namespace App\Http\Services;
class UploadService
{
    public function store($request)
    {
        if($request->hasFile('file')){

            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            dd($name);
            $path = $request->file('file')->storeAs(
                'uploads/'.date('Y,m,d'),
                $request->user()->id,
               );

        }
    }
}
