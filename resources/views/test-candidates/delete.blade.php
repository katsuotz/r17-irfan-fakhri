<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('test-candidate.destroy', 0) }}" method="POST" id="deleteForm">
            @csrf
            @method('delete')
            <div class="modal-body">
                <p class="text-center">Are you sure you want to delete this data?</p>

                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        const deleteModal = document.getElementById('deleteModal')
        const deleteForm = document.getElementById('deleteForm')

        deleteModal.addEventListener('shown.bs.modal', (e) => {
            deleteForm.action = e.relatedTarget.getAttribute('data-url')
        })
    </script>
@endpush
