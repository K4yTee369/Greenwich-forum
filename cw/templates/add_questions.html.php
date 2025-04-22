<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add New Question</h1>
                </div>
                <form class="user" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" rows="5" 
                            placeholder="Type your post content"></textarea>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" id="title" name="title" rows="2" 
                            placeholder="Post title"></textarea>
                    </div>

                    <div class="form-group">
                        <select name="module_name" class="form-control">
                            <option value="">Select a module</option>
                            <?php foreach ($modules as $module): ?>
                                <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8');?>">
                                    <?=htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8');?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="user" class="form-control">
                            <option value="">Select a user</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8');?>">
                                    <?=htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="file" id="pic" name="pic" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Add Question
                    </button>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>