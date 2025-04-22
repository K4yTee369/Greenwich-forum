<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Edit Module</h1>
                </div>
                <form class="user" action="edit_modules.php" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="module_name" 
                            name="module_name" placeholder="Module Name" 
                            value="<?= htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Save Changes
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="admin.php">Back to Admin Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div> 