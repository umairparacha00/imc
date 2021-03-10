<?php

namespace App\Http\Controllers\Admin;

use App\Rate;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Foundation\Application;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
		$rates = Rate::all();
		return view('Admin.rates.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
		return view('Admin.rates.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return mixed
	 * @throws ValidationException
	 */
    public function store(Request $request)
	{
		$data = $this->validator($request->all())->validate();
		Rate::create(['name' => $data['name'], 'rate' => $data['rate']]);
		return redirect(route('rates.index'))->withToastSuccess('Rate Created Successfully!');
    }

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param array $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
	{
		return Validator::make($data, [
			'name' => ['required', 'string'],
			'rate' => ['required', 'numeric',],
		]);
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return Application|Factory|Response|View
     */
    public function show(Rate $rate)
    {
		return view('Admin.rates.show', compact('rate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return View
     */
    public function edit(Rate $rate): View
	{
		return view('Admin.rates.edit', compact('rate'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param Rate $rate
	 * @return mixed
	 * @throws ValidationException
	 */
    public function update(Request $request, Rate $rate)
	{
		$data = $this->updateValidator($request->all())->validate();
		$rate->update($data);
		return redirect(route('rates.index'))->withToastSuccess('Rate Updated Successfully!');
    }

	protected function updateValidator(array $data): \Illuminate\Contracts\Validation\Validator
	{
		$rules = [
			'name' => ['required', 'string'],
			'rate' => ['required', 'numeric',],
		];
		return Validator::make($data, $rules);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Rate $rate
	 *
	 * @return mixed
	 * @throws \Exception
	 */
    public function destroy(Rate $rate)
    {
		$rate->delete();
		return redirect(route('rates.index'))->withToastSuccess('Rate with name ' . $rate->name . ' have been deleted successfully.');
    }

	public function getRateDetailsForDestroying(Request $request, Rate $rate): \Illuminate\Http\JsonResponse
	{
		$data = $request->all();
		$rateInfo = $rate->where('id', $data['id'])->first();
		$array = ['name' => $rateInfo->name];
		return response()->json($array);
	}
}
