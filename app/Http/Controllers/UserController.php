<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(3);
  
        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function confirm(Request $request)
    {

        $imagePath = $request->file('profile');
        $imageName = $imagePath->getClientOriginalName();

        $path = $request->file('profile')->storeAs('uploads', $imageName, 'public');

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        $type = $request->type;
        $phone = $request->phone;
        $dob = $request->dob;
        $address = $request->address;
        $profile = $imageName;

        return view('users.confirm',compact('name','email','password','password_confirmation','type','phone','dob','address','profile'));
    }

    public function store(Request $request)
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
        $user->save();

        return redirect()->route('users.index')->with('success','User created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function editconfirm(Request $request, $id)
    {
        $user = User::find($id);
        $name = $request->name;
        $email = $request->email;
        $type = $request->type;
        $phone = $request->phone;
        $dob = $request->dob;
        $address = $request->address;
        return view('users.editconfirm',compact('user','name','email','type','phone','dob','address'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
  
        $user->update($request->all());
  
        return redirect()->route('users.index')
                        ->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->search;
    
        // Search in the title and descroption columns from the posts table
        $users = User::query()
            ->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->paginate(2);
    
        // Return the search view with the resluts compacted
        return view('users.index', compact('users'));
        
    }

    public function changepassword($id)
    {
        $user = User::find($id);
        return view('users.changepassword',compact('user'));
    } 

    public function passwordupdate(Request $request, $id)
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
  
          return back()->with('success', 'Password successfully changed!');
    }
}
