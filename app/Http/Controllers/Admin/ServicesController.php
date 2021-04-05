<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\Services;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;

	class ServicesController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function index()
		{
			$services = Services::all();
			return view('Admin.services.index', ['services' => $services]);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function create()
		{
			return view('Admin.services.create');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function store(Request $request): RedirectResponse
		{
			$data = $this->validator($request->all())->validate();
			Services::create(['name' => $data['name'], 'price' => $data['price']]);
			return redirect(route('services.index'))->withToastSuccess('Service Created Successfully!');
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
				'price' => ['required', 'numeric',],
			]);
		}

		/**
		 * Display the specified resource.
		 *
		 * @param Services $service
		 * @return Application|Factory|Response|View
		 */
		public function show(Services $service)
		{
			return view('Admin.services.show', compact('service'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param Services $service
		 * @return Application|Factory|Response|View
		 */
		public function edit(Services $service)
		{
			return view('Admin.services.edit', compact('service'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param Services $service
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function update(Request $request, Services $service): RedirectResponse
		{
			$data = $this->updateValidator($request->all())->validate();
			$service->update($data);
			return redirect(route('services.index'))->withToastSuccess('Service Updated Successfully!');
		}

		protected function updateValidator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$rules = [
				'name' => ['required', 'string'],
				'price' => ['required', 'numeric',],
			];
			return Validator::make($data, $rules);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param Services $service
		 * @return RedirectResponse
		 */
		public function destroy(Services $service): RedirectResponse
		{
			$service->delete();
			return redirect(route('services.index'))->withToastSuccess('Service with name ' . $service->name . ' have been deleted successfully.');
		}

		/**
		 * @param Request $request
		 * @param Services $services
		 * @return JsonResponse
		 */
		public function getServiceDetailsForDestroying(Request $request, Services $services): JsonResponse
		{
			$data = $request->all();
			$serviceInfo = $services->where('id', $data['id'])->first();
			$array = ['name' => $serviceInfo->name];
			return response()->json($array);
		}
	}
