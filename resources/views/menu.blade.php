<ul class="nav navbar-nav">

	@foreach (config('admin.menu') as $main)

		@if (!empty($main['children']))

			<li>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					{{ $main['name'] }} <span class="caret"></span>
				</a>

				<ul class="dropdown-menu" role="multi-level">
					@foreach ($main['children'] as $sub)
						@if (!empty($sub['children']))
						<li class="dropdown-submenu">
							<a href="{{ $sub['url'] }}">{{ $sub['name'] }}</a>

							<ul class="dropdown-menu">
								@foreach ($sub['children'] as $subsub)
									<li>
										<a href="{{ $subsub['url'] }}">{{ $subsub['name'] }}</a>
									</li>
								@endforeach
							</ul>
						</li>
						@else
						<li>
							<a href="{{ $sub['url'] }}">{{ $sub['name'] }}</a>
						</li>
						@endif
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
