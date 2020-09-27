@extends('page.information')
@section('content2')
<div class="woocommerce-MyAccount-content">
	@if(count($errors)>0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $err)
		{{$err}}<br>
		@endforeach
	</div>
	@endif
	@if(session('thongbao'))
	<div class="alert alert-success">
		{{session('thongbao')}}
	</div>
	@endif
	<form class="edit-account" action="updateAccount/{{$user->MaND}}" method="post">
		@csrf
		<input type="text" name="_tokten" value="{{csrf_token()}}" hidden>
		<p class="form-row form-row-first">
			<label for="account_first_name">
				Tên:
				<span class="required">*</span>
			</label>
			<input type="text" class="input-text" name="account_fullname" id="account_fullname" value="{{$user->Hoten}}" />
		</p>

		<p class="form-row form-row-last">
			<label for="account_last_name">
				Số điện thoại:
				<span class="required">*</span>
			</label>
			<input type="tel" class="input-text" pattern="[0-9]{10}" name="account_tel" id="account_tel" value="{{$user->SDT}}" />
		</p>
		<div class="clear"></div>

		<p class="form-row form-row-wide">
			<label for="account_email">
				Email:
				<span class="required">*</span>
			</label>

			<input type="email" class="input-text" name="account_email" id="account_email" value="{{$user->email}}" disabled />
		</p>
		<p class="form-row form-row-wide">
			<label for="account_email">
				Địa chỉ:
				<span class="required">*</span>
			</label>

			<input type="text" class="input-text" name="account_address" id="account_address" value="{{$user->Diachi}}" />
		</p>

		<fieldset>
			<legend>Đổi mật khẩu</legend>
			<p class="form-row form-row-wide">
				<label for="password_current">Mật khẩu hiện tại </label>
				<input type="password" disabled class="input-text" name="password_current" id="password_current" value="{{$user->Matkhau}}" />
			</p>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="password_1">Mật khẩu mới </label>
				<input type="password" class="input-text" name="password_1" id="password_1" />
			</p>

			<p class="form-row form-row-wide">
				<label for="password_2">Nhập lại mật khẩu mới</label>
				<input type="password" class="input-text" name="password_2" id="password_2" />
			</p>
		</fieldset>

		<div class="clear"></div>
		<p>
			<input type="submit" class="button" name="save_account_details" value="Lưu" />
		</p>
	</form>
</div>
@endsection