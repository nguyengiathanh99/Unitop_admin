<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        dd(1);
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'date_of_birth' => $request->dob,
            'address' => $request->address,
            'description' => $request->desc,
        ];
        if($request->file('member_image')){
            $file= $request->file('member_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('member/image'), $filename);
            $data['image'] = 'member/image/'.$filename;
        }
        $member = Member::create($data);
        if ($member) {
            return redirect()->route('member.index');
        }
        return redirect()->back();
    }
}
