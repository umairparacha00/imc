<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\User;

	class documentsApprovingController extends Controller
	{
		public function show()
		{
			$documents = User::where('cnic_file', '<>', null)
				->where('cnic_file_status', '<>', 'approved')
				->paginate(10);
			return view('Admin.users.documents', compact('documents'));
		}

		public function approve($id)
		{
			$user = User::findOrFail($id);
			$user->update(['cnic_file_status' => 'approved']);
			return back()->withToastSuccess('Document approved successfully!');
		}

		public function reject($id)
		{
			$user = User::findOrFail($id);
			$user->update(['cnic_file' => null, 'cnic_file_status' => 'rejected']);
			return back()->withToastSuccess('Document rejected successfully!');
		}
	}
