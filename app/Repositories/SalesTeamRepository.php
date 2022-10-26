<?php

namespace App\Repositories;

use App\Models\SalesTeam;
use Carbon\Carbon;

class SalesTeamRepository
{

    /**
     * get all team sales team members for listing.
     *
     * @return SalesTeam[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllTeamMembers()
    {
        return SalesTeam::all();
    }

    /**
     * use this function for save newly created member's data into database.
     *
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveMember($request)
    {
        //set date to correct format
        $date = Carbon::parse($request->get('joinedDate'))->format('Y-m-d');
        $request->merge(['joinedDate' => $date]);
        $member = SalesTeam::create($request->all());
        return redirect()->route('create')->with('success', 'Sales team member added successful!');

    }

    /**
     * get specified member details for viewing.
     *
     * @param $id
     * @return mixed
     */
    public function getMember($id)
    {
        return SalesTeam::find($id);
    }

    /**
     * use this function for update specified member's data into database.
     *
     * @param $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateMember($request, $id)
    {
        $member = SalesTeam::find($id);
        //set date to correct format
        $date = Carbon::parse($request->get('joinedDate'))->format('Y-m-d');
        $request->merge(['joinedDate' => $date]);
        $update = $member->update($request->all());
        return redirect()->route('edit', $id)->with('success', 'Sales team member update successful!');
    }

    /**
     * use this for delete specified member from database.
     * use soft delete.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMember($id)
    {
        SalesTeam::find($id)->delete();
        return redirect()->route('list')->with('success', 'Sales team member delete successful!');
    }
}
