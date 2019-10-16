@if(session('flash_notification'))

    @foreach (session('flash_notification', collect())->toArray() as $message)
        @if ($message['overlay'])
            @include('flash::modal', [
                'modalClass' => 'flash-modal',
                'title'      => $message['title'],
                'body'       => $message['message']
            ])
        @else
            <div class="alert
                        alert-{{ $message['level'] }}
                        {{ $message['important'] ? 'alert-important' : '' }}
                        disapear"
                        role="alert"
            >
                @if ($message['important'])
                    <button type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-hidden="true"
                    >&times;</button>
                @endif

                <div class="container">
                    {!! $message['message'] !!}
                </div>
            </div>
        @endif
    @endforeach

@elseif (isset($errors) && $errors->first())

    <div class="alert alert-danger alert--active disapear">
        <div class="container">
            {{ $errors->first() }}
        </div>
    </div>

@elseif (session('status'))

    <div class="alert alert-success alert--active disapear">
        <div class="container">
            {{ session('status') }}
        </div>
    </div>

@endif

{{ session()->forget('flash_notification') }}
