<!-- Module Management Table -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Module Management</h6>
        <a href="add_modules.php" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add New Module
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="moduleTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Module Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($modules as $module): ?>
                        <tr>
                            <td><?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <a href="edit_modules.php?id=<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>" 
                                   class="btn btn-primary btn-sm">Edit</a> 
                                <a href="delete_modules.php?id=<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>" 
                                   class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DataTables JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('#moduleTable').DataTable();
});
</script> 