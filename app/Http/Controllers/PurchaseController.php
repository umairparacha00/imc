<?php

	namespace App\Http\Controllers;

	use App\Orders;
	use App\Services;
	use Carbon\Carbon;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Str;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;

	class PurchaseController extends Controller
	{
		/**
		 * @return Application|Factory|View
		 */
		public function create()
		{
			$services = Services::all();
			$orders = Orders::where('user_id', current_user()->id)->paginate(15);
			return view('purchase.services', ['services' => $services, 'orders' => $orders]);
		}

		/**
		 * @param Request $request
		 * @param Orders $orders
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function store(Request $request, Orders $orders): RedirectResponse
		{
			$data = $this->validator($request->all())->validate();
			$service = Services::where('name', $data['service'])->first();
			$orders->create(
				[
					'user_id' => current_user()->id,
					'service_id' => $service->id,
					'payment_gateway_id' => $data['payment_gateway_id'],
					'transaction_id' => $data['transaction_id'],
					'link' => $data['link'],
					'delivery_date' => Carbon::now()->addMonths(2),
				]
			);

			return back()->with('toast_success', 'Order created successfully and sent for approval');
		}

		/**
		 * @param array $all
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $all): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'service.required' => 'Select a Service',
				'transaction_id.required' => 'Transaction Id is required'
			];
			return Validator::make($all, [
				'payment_gateway_id' => ['required', 'exists:payment_gateways,id'],
				'service' => ['required', 'string', 'exists:services,name'],
				'link' => ['required', 'url'],
				'transaction_id' => ['required', 'string', 'regex:/^([A-Za-z0-9\_#]+)$/'],
			], $message);
		}

		/**
		 * @param Request $request
		 * @param Services $service
		 * @return JsonResponse
		 * @throws ValidationException
		 */
		public function getServicePrice(Request $request, Services $service): JsonResponse
		{
			$value = $this->validator($request->all())->validate();
			$serviceInfo = $service->where('name', $value['service'])->first();
			if ($serviceInfo === null) {
				throw ValidationException::withMessages([
					'service' => 'Service dose not exists'
				]);
			} else {
				$name = $value['service'];
				$replaced = str_replace('_', ' ', $name);
				$replaced1 = Str::ucfirst($replaced);
				$price = $serviceInfo['price'];
				$array = ['name' => $replaced1, 'price' => $price];
				return response()->json($array);
			}
		}
	}
