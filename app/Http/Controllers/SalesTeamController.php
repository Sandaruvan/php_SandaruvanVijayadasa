<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesTeam;
use App\Repositories\SalesTeamRepository;
use Illuminate\Http\Request;

class SalesTeamController extends Controller
{

    private $repository;

    public function __construct(SalesTeamRepository $managerRepository)
    {
        $this->repository = $managerRepository;
    }

    /**
     * Display a listing of the sales team.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $managers = $this->repository->getAllTeamMembers();
        return view('manager.index', compact('managers'));
    }

    /**
     * Show the form for creating a new sales team member.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.create');
    }

    /**
     * Store a newly created team member in storage.
     *
     * @param SalesTeam $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SalesTeam $request)
    {
        return $this->repository->saveMember($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified sales team member.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = $this->repository->getMember($id);
        return view('manager.edit', compact('member'));
    }

    /**
     * Update the specified member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, SalesTeam $request)
    {
        return $this->repository->updateMember($request, $id);
    }

    /**
     * Remove the specified member from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        return $this->repository->deleteMember($id);
    }
}
