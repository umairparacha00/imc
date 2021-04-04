<?php

	namespace App\Http\Controllers\Admin;

	use App\Orders;
	use Illuminate\View\View;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use App\Http\Controllers\Controller;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Contracts\Foundation\Application;

	class OrdersController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function index()
		{
			$orders = Orders::paginate(20);

			return view('Admin.orders.index', compact('orders'));
		}

		/**
		 * @return Application|Factory|Response|\Illuminate\View\View
		 */
		public function pending()
		{
			$orders = Orders::where('status', 0)->paginate(15);
			return view('Admin.orders.pending', ['orders' => $orders]);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			//
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return Response
		 */
		public function store(Request $request)
		{
			//
		}

		/**
		 * Display the specified resource.
		 *
		 * @param int $id
		 * @return Application|Factory|Response|View
		 */
		public function show(int $id)
		{
			$order = Orders::findOrFail($id);

			return view('Admin.orders.show', compact('order'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function edit($id)
		{
			//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param int $id
		 * @return Response
		 */
		public function update(Request $request, $id)
		{
			//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function destroy($id)
		{
			//
		}
	}
