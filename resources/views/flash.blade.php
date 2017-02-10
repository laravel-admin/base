@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="alert alert-{{ Session::get('flash_notification.level') }} alert--active disapear">
            <div class="container">
                {{ Session::get('flash_notification.message') }}
            </div>
        </div>
    @endif

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
