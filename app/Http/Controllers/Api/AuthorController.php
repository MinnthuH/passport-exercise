<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    // AUTHOR REGISTER METHOD
    public function registerAuthor(Request $request)
    {
        // Validation
        $request-> validate([
            'name'=>'required',
            'email'=>'required|email|unique:authors',
            'phone'=>'required',
            'password'=>'required',
            'password_confirmation'=> 'required|same:password'

        ]);

        // Create Data

        $author = new Author();

        $author->name = $request->name;
        $author->email = $request->email;
        $author->phone = $request->phone;
        $author->password = Hash::make($request->password);

        // Save Data and send response

        $author->save();

        return response()->json([
            'status'=>1,
            'message'=> 'Author created successfully'
        ]);

    }

    // AUTHOR LOGIN METHOD
    public function loginAuthor(Request $request)
    {

    }

    // AUTHOR PROFILE METHOD
    public function profileAuthor()
    {

    }

    // AUTHOR LOGOUT METHOD
    public function logoutAuthor()
    {

    }


}
