<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>CV</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($candidates as $candidate)
                <tr wire:key="candidate-{{ $candidate->id }}">
                    <td>{{ $candidate->id }}</td>
                    <td>{{ $candidate->name }}</td>
                    <td>
                        <a href="{{ Storage::url($candidate->cv_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            Download
                        </a>
                    </td>
                    <td>{{ $candidate->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <button class="btn btn-sm btn-danger"
                                wire:click="delete({{ $candidate->id }})"
                                wire:confirm="Delete this candidate?">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No candidates yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $candidates->links() }}
</div>