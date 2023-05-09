<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserDetailsController extends Controller
{
    protected $UserDetails;
    public function __construct()
    {
        $this->UserDetails = new \App\Models\UserDetail;
    }
    public function index(Request $request)
    {
        $user_details = $this->UserDetails->getUserDetails();

        return view('welcome')->with('user_details',  $user_details);
    }
    public function create(Request $request)
    {
        return view('create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $fromData = $request->all();

        if ($this->UserDetails->storeNewUserDetailData($fromData)) {
            Session::put('success', 'New User Details saved successfully.');
            return redirect()->route('userDetail.index');
        } else {
            Session::put('error', 'Something Went Wrong. Please try again..!!');
            return redirect()->back();
        }
    }
    public function edit(Request $request)
    {
        $user = $this->UserDetails->findUserDetailById((int) $request->id);
        return view('edit')->with('user_detail', $user);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $fromData = $request->all();
        if ($this->UserDetails->updateUserDetail($fromData)) {
            Session::put('success', 'User Details update successfully.');
            return redirect()->route('userDetail.update');
        } else {
            Session::put('error', 'Something Went Wrong. Please try again..!!');
            return redirect()->back();
        }
    }
    public function remove(Request $request)
    {
        if ($this->UserDetails->deleteUser($request->id)) {
            Session::put('success', 'User deleted successfully.');
            return redirect()->route('userDetail.index');
        } else {
            Session::put('error', 'Something Went Wrong. Please try again..!!');
            return redirect()->back();
        }
    }
}
