<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $members = Member::search($request->all())->paginate(10);
        return view('members.index', compact('members', 'request'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->back();
    }

    public function store(MemberRequest $request)
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
        $member = Member::create($data);
        if ($member) {
            return redirect()->route('member.index')->with('success', 'Thêm học viên thành công!');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit', compact('member'));
    }
}
