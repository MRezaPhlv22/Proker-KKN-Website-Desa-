<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editUserName" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editUserName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserPassword" class="form-label">Password (kosongkan jika tidak ingin mengubah)</label>
                        <input type="password" class="form-control" id="editUserPassword" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="editUserPasswordConfirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="editUserPasswordConfirmation" name="password_confirmation">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update Pengguna</button>
                </div>
            </form>
        </div>
    </div>
</div>