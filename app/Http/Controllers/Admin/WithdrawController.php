<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
		$withdraws = Withdraw::all();
		return view('Admin.withdraws.index', ['withdraws' => $withdraws]);
    }

	public function pending()
	{
		$withdraws = Withdraw::where('status', 0)->paginate(15);
		return view('Admin.withdraws.pending', ['withdraws' => $withdraws]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	protected function approve($id)
	{
		$withdrawData = Withdraw::where('id', $id)->first();
		$withdrawData->update(
			[
				'status' => 1,
			]
		);

		return back()->with('toast_success', 'Withdraw approved successfully');
	}
}
