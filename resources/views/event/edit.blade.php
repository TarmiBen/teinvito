<form action="{{ route('event.update',$event) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Edit Event</h3>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Update
            </button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <label for="name">UserId</label>
                    <select name="user_id">
                        <option value="{{$event->user_id}}">{{$event->user_id}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="name">UserInvitedId</label>
                    <select name="user_invited_id">
                        <option value="{{$event->user_invited_id}}">{{$event->user_invited_id}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="name">InvitationId</label>
                    <select name="invitation_id">
                        <option value="{{$event->invitation_id}}">{{$event->invitation_id}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="name">Type</label>
                    <input type="text" name="type" value="{{$event->type}}">
                    <label for="name">CeremonyDate</label>
                    <input type="date" name="ceremony_date" value="{{$event->ceremony_date}}">
                    <label for="name">EventDate</label>
                    <input type="date" name="event_date" value="{{$event->event_date}}">
                    <label for="name">Title</label>
                    <input type="text" name="title" value="{{$event->title}}">
                </div>
            </div>
        </div>
    </div>
</form>
