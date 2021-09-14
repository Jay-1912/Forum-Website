<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request, $id){
        $input = $request->all();
        $user = User::find($id);
        $user->fill($input)->save();

        toastr()->success('Your informations saved successfully!');

        return back();
    }

    public function updateImage(Request $request, $id)
    {
        if(!$request->profile_image)
        {
            toastr()->error('Please select Image');
            return back();
        }

        $image = $request->profile_image;
        $name = $image->getClientOriginalName();
        $new_image = time().$name;
        $dir = 'storage/profiles/';
        $image->move($dir, $new_image);
        $user = User::find($id);
        $user->image = $new_image;
        $user->save();
        toastr()->success('Image updated successfully!');
        return back();
    }

}
