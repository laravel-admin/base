<ul class="nav navbar-nav">
    @foreach ($items as $item)
        <li>
            @if ($item['children']->count() > 0)
                <a href="{{ $item['url'] }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ $item['name'] }}
                    <span class="caret"></span>
                </a>
            @else
                <a href="{{ $item['url'] }}">
                    {{ $item['name'] }}
                </a>
            @endif

            @if ($item['children']->count() > 0)
                <ul class="dropdown-menu" role="multi-level">
                    @foreach ($item['children'] as $child)
                        @if ($child['children']->count() > 0)
                            <li class="dropdown-submenu">
                                <a href="{{ $child['url'] }}">{{ $child['name'] }}</a>
                                @if ($child['children']->count() > 0)
                                    <ul class="dropdown-menu" role="multi-level">
                                        @foreach ($child['children'] as $grandchild)
                                            <li>
                                                <a href="{{ $grandchild['url'] }}">{{ $grandchild['name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @else
                            <li>
                                <a href="{{ $child['url'] }}">{{ $child['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
