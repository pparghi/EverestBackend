<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MemberDebtorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mail = base64_decode($request->token);

        if ($mail != "") {
            $user = DB::select('web.SP_ValidateUserEmail @email = ?', [$mail]);
        } else {
            $user = [];
        }
        if(count($user) > 0){

            $DebtorKey = $request->get('DebtorKey');
            
            $memberDebtor = DB::select('web.SP_DebtorMasterMemberDetails @Debtorkey  = ?', [$DebtorKey]);
            
            return response()->json([
                'memberDebtor' => $memberDebtor,
            ]);
        } else {
                return response()->json(['message' => 'User not found'], 404);
            }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
