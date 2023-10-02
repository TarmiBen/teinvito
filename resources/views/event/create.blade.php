<form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">New Event</h3>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">
                <i data-feather="plus-square"></i>
                Crear
            </button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="stretch-card">
            <div class="card">
                <div class="card-body">
                    <label for="name">UserId</label>
                    <select name="user_id">
                        <option value="">Selection</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    @error('user_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="name">UserInvitedId</label>
                    <select name="user_invited_id">
                        <option value="">Selection</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    @error('user_invited_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="name">InvitationId</label>
                    <select name="invitation_id">
                        <option value="">Selection</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    @error('invitation_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="name">Type</label>
                    <input type="text" name="type" value="{{old('type')}}">
                    @error('type')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="name">CeremonyDate</label>
                    <input type="date" name="ceremony_date" value="{{old('ceremony_date')}}">
                    @error('ceremony_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="name">EventDate</label>
                    <input type="date" name="event_date" value="{{old('event_date')}}">
                    @error('event_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <label for="name">Title</label>
                    <input type="text" name="title" value="{{old('title')}}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</form>
