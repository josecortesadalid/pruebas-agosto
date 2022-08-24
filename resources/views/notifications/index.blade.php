@include('partials.comun')

<div class="container mt-5">
    <h1>Notificaciones</h1>
    <div class="row mt-5">
        <div class="col-md-6">
            <div>No leídas</div>
            <div class="list-group">
                @foreach ($unreadNotifications as $unreadNotification)
                    <div class="list-group-item">
                        {{ $unreadNotification->data['recipient_id'] }}
                        <form method="POST" action="{{ route('notifications.read', $unreadNotification->data['recipient_id']) }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <p> <div class="btn btn-danger">X</div> </p>
                        </form>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div>Leídas</div>
            <div class="list-group">
                @foreach ($readNotifications as $readNotification)
                    <div class="list-group-item">
                        {{ $readNotification->data['recipient_id'] }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>