<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\Component;
use App\Models\InvitationComponent;
use App\Models\ComponentData;
use App\Models\ComponentPackage;
use App\Models\InvitationComponentPackage;


class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Invitations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($invitationId = null)
    {
        return view('admin.Invitations.create', compact('invitationId'));
    }


    public function show($id = null)
    {
        $invitationId = Invitation::where('id',$id)->first()->id;
        $invitation = Invitation::where('id',$invitationId)->with(['InvitationsComponents'=>function($ivcom) use ($invitationId){
            $ivcom->with(['Component'=>function($com) use ($invitationId){
                $com->with(['ComponentsData' =>function($data) use ($invitationId){
                    $data->where('invitation_id',$invitationId);
                }]);
            }])->orderBy('order','asc');
        }])->first();
        return view('admin.Invitations.show', ['invitation' => $invitation]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
