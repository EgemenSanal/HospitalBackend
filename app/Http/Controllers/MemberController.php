<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFromRequest;
use App\Models\Member;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth::id();

        $member = DB::table('members')->where('id', $userId)->first();
        if ($member->role === 'A') {
            return response()->json([
                'message' => 'success',
                'role' => $member->role,
                'members' => Member::all(),
                'data' => $member

            ]);
        }

        return response()->json([
            'message' => 'success',
            'role' => $member->role,
            'data' => $member
        ]);
    }
    public function login(LoginFromRequest $request){

        $request->validate([
            'email' => 'required|email|exists:members',
            'password' => 'required'
        ]);

        $user = Member::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'errors' => [
                    'email' => ['The provided credentials are incorrect.']
                ]
            ];
            // return [
            //     'message' => 'The provided credentials are incorrect.'
            // ];
        }
        $token = $user->createToken($user->name);
        $userid = $user->id;


        return [
            'user' => $user,
            'userid' => $userid,
            'token' => $token->accessToken
        ];

    }
    public function logout(Request $request){
        $token = $request->user()->token();
        $token->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|',
            'password' => 'required|confirmed',
            'role' => 'required'
        ]);
        $fields['password'] = Hash::make($fields['password']);
        $user = Member::create($fields);

        $token = $user->createToken($request->name);
        $userid = $user->id;
        return [
            'user' => $user,
            'userid' => $userid,
            'token' => $token->accessToken
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        $member->update($fields);

        return ([
            'success',
            'The user was updated successfully.'
        ]);
        //$member->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return ['message' => 'Member deleted'];

    }
}
