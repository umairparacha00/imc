{{--<div class="row">--}}
{{--	<div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">--}}
{{--		<div class="form-group">--}}
{{--			<label for="memberships">--}}
{{--				Select Payment Gateway--}}
{{--			</label>--}}
{{--			<select class="custom-select @error('payment_gateway_id') is-invalid @enderror" name="payment_gateway_id" id="payment_gateway_id" wire:model="selected_payment_gateway_id">--}}
{{--				<option selected>-- Select Account --</option>--}}
{{--				@foreach ($paymentMethods as $method)--}}
{{--					<option value="{{ $method->id }}">{{ $method->name }}</option>--}}
{{--				@endforeach--}}
{{--			</select>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--	<div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">--}}
{{--		<div class="form-group">--}}
{{--			--}}
{{--			<label for="memberships">--}}
{{--				Select Service--}}
{{--			</label>--}}
{{--			<select class="custom-select @error('service_id') is-invalid @enderror" name="service_id" wire:model="social_id">--}}
{{--				<option selected>-- Select Service --</option>--}}
{{--				<option value="youtube subscribers">Youtube subscribers</option>--}}
{{--				<option value="youtube watchtime">Youtube watchtime</option>--}}
{{--				<option value="facebook follower">Facebook follower</option>--}}
{{--				<option value="instagram follower">Instagram follower</option>--}}
{{--			</select>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--	<div class="col-xl-4 col-lg-2 col-md-2 col-sm-12">--}}
{{--	</div>--}}
{{--	@if ($details)--}}
{{--		<div class="col-12">--}}
{{--			@if ($details->name === 'BTC')--}}
{{--				<p class="pt-3"><strong>Account Number:</strong> {{ $details->account_iban }}</p>--}}
{{--			@elseif($details->name === 'Bank')--}}
{{--				<p class="pt-3"><strong>Account Type:</strong> {{ $details->name }}</p>--}}
{{--				<p><strong>Bank Name:</strong> {{ $details->bank_name }}</p>--}}
{{--				<p><strong>Branch Code:</strong> {{ $details->bank_branch_code }}</p>--}}
{{--				<p><strong>Account Holder Name:</strong> {{ $details->account_holder_name }}</p>--}}
{{--				<p><strong>Account IBAN:</strong> {{ $details->account_iban }}</p>--}}
{{--				<p><strong>Account Reference Number:</strong> {{ $details->reference_number }}</p>--}}
{{--			@elseif($details->name === 'Jazzcash' || $details->name === 'Easypaisa' )--}}
{{--				<p class="pt-3"><strong>Account Type:</strong> {{ $details->name }}</p>--}}
{{--				<p><strong>Account Holder Name:</strong> {{ $details->account_holder_name }}</p>--}}
{{--				<p><strong>Account Number:</strong> {{ $details->account_iban }}</p>--}}
{{--			@endif--}}
{{--		</div>--}}
{{--	@endif--}}
{{--	@if ($social_id)--}}
{{--		@if ($social_id === 'youtube subscribers')--}}
{{--			<div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="number">Number of Subscribers</label>--}}
{{--					<input required type="text" id="number" name="number" wire:change="subscribersPriceCalculation"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="transaction_id">Transaction ID</label>--}}
{{--					<input required type="number" id="transaction_id" name="transaction_id"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-xl-8 col-lg-10 col-md-10 col-12">--}}
{{--				<div class="d-flex justify-content-between mb-3">--}}
{{--					<div class="position-relative">--}}
{{--						<p><strong>Calculated Price:</strong> {{ $subscribersPrice }}</p>--}}
{{--					</div>--}}
{{--					<div class="btn-actions-pane-right">--}}
{{--						<button id="modal" type="submit" class="btn btn-lg btn-primary">Withdraw</button>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		@elseif($social_id === 'youtube watchtime')--}}
{{--			<div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="number">Number of Subscribers</label>--}}
{{--					<input required type="text" id="number" name="number"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="transaction_id">Transaction ID</label>--}}
{{--					<input required type="number" id="transaction_id" name="transaction_id"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-xl-8 col-lg-10 col-md-10 col-12">--}}
{{--				<div class="d-flex justify-content-between mb-3">--}}
{{--					<div class="position-relative">--}}
{{--						<p><strong>Calculated Price:</strong></p>--}}
{{--					</div>--}}
{{--					<div class="btn-actions-pane-right">--}}
{{--						<button id="modal" type="submit" class="btn btn-lg btn-primary">Withdraw</button>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		@elseif($social_id === 'Jazzcash')--}}
{{--			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="account_holder_name">Account Holder Name</label>--}}
{{--					<input required type="text" id="account_holder_name" name="account_holder_name"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="account_number">Account Number</label>--}}
{{--					<input required type="number" id="account_number" name="account_number"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="amount">Amount</label>--}}
{{--					<input required type="number" id="amount" name="amount"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-12">--}}
{{--				<div class="d-flex justify-content-end">--}}
{{--					<div class="btn-actions-pane-right">--}}
{{--						<button type="submit" class="btn btn-lg btn-primary" id="modal">Withdraw</button>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		@elseif($social_id === 'Easypaisa' )--}}
{{--			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="account_holder_name">Account Holder Name</label>--}}
{{--					<input required type="text" id="account_holder_name" name="account_holder_name"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="account_number">Account Number</label>--}}
{{--					<input required type="number" id="account_number" name="account_number"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">--}}
{{--				<div class="form-group">--}}
{{--					<label for="amount">Amount</label>--}}
{{--					<input required type="number" id="amount" name="amount"--}}
{{--						   class="form-control inp-shadow">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			<div class="col-12">--}}
{{--				<div class="d-flex justify-content-end">--}}
{{--					<div class="btn-actions-pane-right">--}}
{{--						<button type="submit" class="btn btn-lg btn-primary" id="modal">Withdraw</button>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		@endif--}}
{{--	@endif--}}
{{--</div>--}}


<div class="row">
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
		<div class="form-group">
			<label for="memberships">
				Select Account
			</label>
			<select class="custom-select @error('payment_gateway_id') is-invalid @enderror" name="payment_gateway_id"
					id="payment_gateway_id" wire:model="selected_payment_gateway_id">
				<option selected>-- Select Account --</option>
				@foreach ($paymentMethods as $method)
					<option value="{{ $method->id }}">{{ $method->name }}</option>
				@endforeach
			</select>
			@if ($details)
				@if ($details->name === 'BTC')
					<p class="pt-3"><strong>Account Number:</strong> {{ $details->account_iban }}</p>
				@elseif($details->name === 'Bank')
					<p class="pt-3"><strong>Account Type:</strong> {{ $details->name }}</p>
					<p><strong>Bank Name:</strong> {{ $details->bank_name }}</p>
					<p><strong>Branch Code:</strong> {{ $details->bank_branch_code }}</p>
					<p><strong>Account Holder Name:</strong> {{ $details->account_holder_name }}</p>
					<p><strong>Account IBAN:</strong> {{ $details->account_iban }}</p>
					<p><strong>Account Reference Number:</strong> {{ $details->reference_number }}</p>
				@elseif($details->name === 'Jazzcash' || $details->name === 'Easypaisa' )
					<p class="pt-3"><strong>Account Type:</strong> {{ $details->name }}</p>
					<p><strong>Account Holder Name:</strong> {{ $details->account_holder_name }}</p>
					<p><strong>Account Number:</strong> {{ $details->account_iban }}</p>
				@endif
			@endif
		</div>
	</div>
</div>
