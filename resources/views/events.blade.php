<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Success/Error Messages --}}
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Create Form Card --}}
                    <div class="card shadow-sm mb-5">
                        <div class="card-header bg-primary text-white">
                            Create New Event
                        </div>
                        <div class="card-body">
                            <form action="{{ route('events.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="starts_on" class="form-label">Starts On</label>
                                        <input type="datetime-local" class="form-control" id="starts_on" name="starts_on" value="{{ old('starts_on') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="team_one" class="form-label">Team One</label>
                                        <input type="text" class="form-control" id="team_one" name="team_one" value="{{ old('team_one') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="team_one_logo" class="form-label">Team One Logo URL</label>
                                        <input type="text" class="form-control" id="team_one_logo" name="team_one_logo" value="{{ old('team_one_logo') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="team_two" class="form-label">Team Two</label>
                                        <input type="text" class="form-control" id="team_two" name="team_two" value="{{ old('team_two') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="team_two_logo" class="form-label">Team Two Logo URL</label>
                                        <input type="text" class="form-control" id="team_two_logo" name="team_two_logo" value="{{ old('team_two_logo') }}" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 w-100">Create Event</button>
                            </form>
                        </div>
                    </div>

                    {{-- Events Table Card --}}
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white">
                            Existing Events
                        </div>
                        <div class="card-body">
                            @if($events->isEmpty())
                                <p class="text-center text-muted">No events found.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Starts On</th>
                                                <th>Team One</th>
                                                <th>Team Two</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($events as $event)
                                                <tr>
                                                    <td>{{ $event->id }}</td>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ $event->starts_on }}</td>
                                                    <td>
                                                        <img src="{{ $event->team_one_logo }}" alt="{{ $event->team_one }}" width="30" class="me-2 rounded-circle">
                                                        {{ $event->team_one }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ $event->team_two_logo }}" alt="{{ $event->team_two }}" width="30" class="me-2 rounded-circle">
                                                        {{ $event->team_two }}
                                                    </td>
                                                    <td>
                                                        <span class="badge {{ $event->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $event->status == 1 ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editEventModal{{ $event->id }}">Edit</a>
                                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?');">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                {{-- Edit Modal --}}
                                                <div class="modal fade" id="editEventModal{{ $event->id }}" tabindex="-1" aria-labelledby="editEventModalLabel{{ $event->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning text-dark">
                                                                <h5 class="modal-title" id="editEventModalLabel{{ $event->id }}">Edit Event</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('events.update', $event->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="title{{ $event->id }}" class="form-label">Title</label>
                                                                        <input type="text" class="form-control" id="title{{ $event->id }}" name="title" value="{{ $event->title }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="starts_on{{ $event->id }}" class="form-label">Starts On</label>
                                                                        <input type="datetime-local" class="form-control" id="starts_on{{ $event->id }}" name="starts_on" value="{{ date('Y-m-d\TH:i', strtotime($event->starts_on)) }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="team_one{{ $event->id }}" class="form-label">Team One</label>
                                                                        <input type="text" class="form-control" id="team_one{{ $event->id }}" name="team_one" value="{{ $event->team_one }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="team_one_logo{{ $event->id }}" class="form-label">Team One Logo URL</label>
                                                                        <input type="text" class="form-control" id="team_one_logo{{ $event->id }}" name="team_one_logo" value="{{ $event->team_one_logo }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="team_two{{ $event->id }}" class="form-label">Team Two</label>
                                                                        <input type="text" class="form-control" id="team_two{{ $event->id }}" name="team_two" value="{{ $event->team_two }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="team_two_logo{{ $event->id }}" class="form-label">Team Two Logo URL</label>
                                                                        <input type="text" class="form-control" id="team_two_logo{{ $event->id }}" name="team_two_logo" value="{{ $event->team_two_logo }}" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="status{{ $event->id }}" class="form-label">Status</label>
                                                                        <select class="form-select" id="status{{ $event->id }}" name="status">
                                                                            <option value="1" {{ $event->status == 1 ? 'selected' : '' }}>Active</option>
                                                                            <option value="0" {{ $event->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
