    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Add New Module</h1>
                    </div>
                    <form class="user" action="add_modules.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="module_name" 
                                name="module_name" placeholder="Module Name" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                            Add Module
                        </button>
                    </form>
                </div>
            </div>
    </div>

