<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Edit User</h1>
                </div>
                <form class="user" action="edit_users.php" method="post">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="username" 
                            name="username" placeholder="Username" 
                            value="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="email" 
                            name="email" placeholder="Email Address" 
                            value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Save Changes
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="admin.php">Back to Admin Panel</a>
                </div>
            </div>
        </div>
    </div>
</div>
