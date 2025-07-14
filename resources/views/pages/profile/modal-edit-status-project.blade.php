<div class="modal fade" tabindex="-1" role="dialog" id="statusProject{{ $project->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Status Project {{ $project->nama_project }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('profile.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Edit Status</label>
                        <select class="form-control select" name="status_project">
                            <option {{ $project->status_project == 'lead' ? 'selected' : '' }} value="lead">Lead
                            </option>
                            <option {{ $project->status_project == 'lag' ? 'selected' : '' }} value="lag">Lag
                            </option>
                            <option {{ $project->status_project == 'delay' ? 'selected' : '' }} value="delay">Delay
                            </option>
                            <option {{ $project->status_project == 'closed' ? 'selected' : '' }} value="closed">Closed
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
