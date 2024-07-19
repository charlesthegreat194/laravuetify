<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller{
    
    public function delete($id){
        
        $user = User::find($id);

        if(!$user){
            return response()->json(['message' => 'User not found', 404]);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        if(!$user){
            return response()->json(['message'=>'User not found'], 404);
        }
        
        $user->update($request->all());
        
    }

}