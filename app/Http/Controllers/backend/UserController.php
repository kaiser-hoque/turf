<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\backend\user\AddNewRequest;
use App\Http\Requests\backend\user\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Crypt;
use File;
use Exception;

class UserController extends Controller
{
    public function index(){
        $data=User::paginate(10);
        return view('backend.user.index',compact('data'));
    }

    public function create()
    {
       $role=Role::get();
       return view('backend.user.create',compact('role'));
    }

    public function store(AddNewRequest $request){
        try {
            $data = new User();
            $data->name_en = $request->userName_en;
            $data->name_bn = $request->userName_bn;
            $data->email = $request->EmailAddress;
            $data->contact_no_en = $request->contactNumber_en;
            $data->contact_no_bn = $request->contactNumber_bn;
            $data->role_id = $request->roleId;
            $data->status = $request->status;
            $data->full_access = $request->fullAccess;
            $data->language = 'en';
            $data->password = Hash::make($request->password);

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/users'), $imageName);
                $data->image = $imageName;
            }

            if ($data->save())
                return redirect()->route('user.index')->with('success', 'Successfully saved');
            else
                return redirect()->back()->withInput()->with('error', 'Please try again');

        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Please try again');
        }
    }
    public function destroy($id){
        try {
            $decryptedId = Crypt::decrypt($id);
            $user = User::findOrFail($decryptedId);
            $user->delete();
            return back()->with('success', 'Data deleted');
            } catch (\Exception $e) {
                // dd($e);
                return back()->with('error', 'Please try again');
            }



    }
}

