<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        if(Gate::allows('Admin')){
            $users = User::latest()->paginate(config('constants.paginate.user'));
  
            return view('users.index',compact('users'));
        }
    }

    public function create()
    {
        return view('users.create');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => ['required'],
            'phone' => ['required'],
            'dob' => ['required'],
            'address' => ['required', 'string', 'max:255'],
        ]);

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
        $user->created_user_id = auth()->user()->id;
        $user->save();

        return redirect()->route('users.index')->with('success','User created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if($request->hasFile('profile')) {
            $imagePath = $request->file('profile');
            $imageName = $imagePath->getClientOriginalName();

            $request->file('profile')->storeAs('uploads', $imageName, 'public');
            $profile = $imageName;
        } else {
            $profile = $user->profile;
        }
        $name = $user->name;
        $email = $user->email;
        $type = $user->type;
        $phone = $user->phone;
        $dob = $user->dob;
        $address = $user->address;
        return view('users.edit',compact('user','name','email','type','phone','dob','address','profile'));
    }

    public function editConfirm(Request $request, $id)
    { 
        $user = User::find($id);
        if($request->hasFile('profile')) {
            $imagePath = $request->file('profile');
            $imageName = $imagePath->getClientOriginalName();

            $request->file('profile')->storeAs('uploads', $imageName, 'public');
            $profile = $imageName;
        } else {
            $profile = $user->profile;
        }
        $name = $request->name;
        $email = $request->email;
        $type = $request->type;
        $phone = $request->phone;
        $dob = $request->dob;
        $address = $request->address;
        return view('users.editConfirm',compact('user','name','email','type','phone','dob','address','profile'));
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
    
        // Search in the title and description columns from the posts table
        $users = User::query()
            ->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->paginate(2);
    
        // Return the search view with the results compacted
        return view('users.index', compact('users'));
        
    }

    public function changePassword($id)
    {
        $user = User::find($id);
        return view('users.changePassword',compact('user'));
    } 

    public function passwordUpdate(Request $request, $id)
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
  
          return redirect()->route('users.edit',$user->id)
                            ->with('success', 'Password successfully changed!');
    }
}
