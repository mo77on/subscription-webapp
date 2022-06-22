<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Mail\Postnotif;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $users = User::where('role_id', 2)->get();

        try{
              $post = Post::create([                    
                    'user_id' => 1,
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => 1,
                ]);   
                
                if(!empty($users)){
                    Foreach($users as $user){
                        Mail::to($user->email)->send(new Postnotif($post));
                    }
                }

                return response()->json(['success' => 'Posted']);
       
        } catch (Exception $e) {
            return Redirect::to('home')->withStatus(__('Error.'));
        }
    }

    public function post()
    {   
        $data = Post::all();
        return response()->json($data);        
    }
}
