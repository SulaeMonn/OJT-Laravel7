<?php

namespace App\Dao\Users;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\Users\UserDaoInterface;

class UserDao implements UserDaoInterface
{

    public function getUserList()
    {
        return User::latest()->paginate(config('constants.paginate.user'));
    }

    public function store($request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
 
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->profile = $request->profile;
        $user->created_user_id = auth()->user()->id;
        $user->updated_user_id = auth()->user()->id;
        $user->save();
        return $user;
    }

    public function show($id)
    {
      $user = User::find($id);
      return $user;
    }

    public function editConfirm($request, $id)
    {
      $user = User::find($id);
        if($request->hasFile('profile')) {
            $imagePath = $request->file('profile');
            $imageName = $imagePath->getClientOriginalName();

            $request->file('profile')->storeAs('uploads', $imageName, 'public');
            $user->profile = $imageName;
        } else {
            $profile = $user->profile;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
      return $user;
    }

    public function update($request, $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->updated_user_id = auth()->user()->id;
        $user->save();
        $user->update($request->all());
      return $user;
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->deleted_user_id = auth()->user()->id;
        $user->save();
        $user->delete();
        return $user;
    }

    public function search($request)
    {
         // Get the search value from the request
        $search = $request->search;
    
        // Search in the title and description columns from the posts table
        $users = User::query()
            ->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->paginate(2);
        return $users;
    }

    public function passwordUpdate($request, $id)
    {
         $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
          ]);
  
          $user = User::find($id);
  
          if (!Hash::check($request->current_password, $user->password)) {
              return back()->with('error', 'Current password does not match!');
          }
  
          $user->password = Hash::make($request->password);
          $user->save();
        return $user;
    }
}