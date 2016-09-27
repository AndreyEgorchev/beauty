<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 26.09.2016
 * Time: 13:54
 */

namespace App\Http\Controllers\Auth;

use App\Specialist;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function getProfile($id,Specialist $specialistmodel)
    {
        $user = User::find($id);

        $specialists = Specialist::find($user->id_specialist);
        $specialists['cityfull'] = $specialistmodel->getCityForSpec($id);
        $specialists['specialityfull'] = $specialistmodel->getSpecialityForSpec($id);
        $images = $specialists->images;
//        dd($specialists);
        return view('auth.profile', ['user' => $user,
        'specialists'=>$specialists,
        'images'=>$images]);
    }

    public function edit($id)
    {
        $user = User::findById($id);
        return view('auth.edit')->withTask($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'password'=>'required|same:password_confirmation',
            'password_confirmation'=>'required',
        ]);
        $input = $request->all();
        dd($input);
        $image = $request->file('avatar');
        if ($image) {
            $destinationPath = 'images/uploads/avatars';
            // Get the orginal filname or create the filename of your choice
            $filename = $image->getClientOriginalName();
//        dd($filename);
            // Copy the file in our upload folder
            $image->move($destinationPath, $filename);
            $input['avatar'] = $filename;
        }
        $user->fill($input)->save();
        return redirect()->back();
    }

}