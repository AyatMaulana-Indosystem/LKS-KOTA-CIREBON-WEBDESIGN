<div class="row">
	<div class="col-md-8 col-md-offset-2">
		@if(Session::has('sc_msg'))
			<div class="alert alert-success">{{ Session::get('sc_msg') }}</div>
		@endif

		@if(Session::has('err_msg'))
			@if(is_array(Session::get('err_msg')))
				<div class="aler alert-danger">
					<ul>
						@foreach(Session::get('err_msg') as $value)
							<li>{{ $value }}</li>
						@endforeach
					</ul>
				</div>
			@else
				<div class="alert alert-danger">
					{{ Session::get('err_msg') }}
				</div>
			@endif
		@endif
		
	</div>
</div>