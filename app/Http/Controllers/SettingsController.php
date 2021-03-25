<?php

	namespace App\Http\Controllers;

	use App\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;

	class SettingsController extends Controller
	{
		public function showChangePassword()
		{
			return view('setting.change-password');
		}

		public function changePassword(Request $request, User $user)
		{

			$data = $this->validator($request->all())->validate();
			if (Hash::check($data['current_password'], current_user()->password)) {
				$user->where('id', current_user()->id)->update(['password' => bcrypt($data['password'])]);
				return back()->withToastSuccess('Password Updated Successfully!');
			} else {
				return back()->with('toast_error', 'Current Password does not match.');
			}
		}

		protected function validator(array $data)
		{
			$rules = [
				'current_password' => 'required|numeric',
				'password' => 'required|string|min:8|confirmed'
			];
			$message = [
				'current_password.required' => 'Current Password is required.',
			];

			return Validator::make($data, $rules, $message);
		}
	}
