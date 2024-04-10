<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('isAdmin', 0)->get();
        return view('admin.dashboard', compact('users'));
    }
    
    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $user->update($request->only('isVerified'));
        return redirect()->back()->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    public function trashed(){
        $users=User::onlyTrashed()->get();
        return view('admin.trashed',compact('users'));
    
    }
    public function restore($id)
    {
        $user=User::withTrashed()->find($id);
        $user->restore();
        return redirect()->back()->with('success', 'User restored successfully.');
    }
}
