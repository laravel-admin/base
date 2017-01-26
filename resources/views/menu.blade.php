<ul class="nav navbar-nav">

	@foreach (config('admin.menu') as $main)

		@if (!empty($main['children']))
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ $main['name'] }} <span class="caret"></span>
				</a>

				<ul class="dropdown-menu" role="menu">
					@foreach ($main['children'] as $sub)
						<li>
							<a href="{{ $sub['url'] }}">{{ $sub['name'] }}</a>
						</li>
					@endforeach
				</ul>
			</li>

		@else
			<li>
				<a href="{{ $main['url'] }}">{{ $main['name'] }}</a>
			</li>
		@endif
	@endforeach
</ul>
