<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Edit Question</h1>
                </div>
                <form class="user" action="edit_questions.php" method="post">
                    <input type="hidden" name="id" value="<?=htmlspecialchars($post['id'], ENT_QUOTES, 'UTF-8');?>">

                    <div class="form-group">
                        <textarea class="form-control" id="title" name="title" rows="2" 
                            placeholder="Question Title"><?=htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8');?></textarea>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" rows="3" 
                            placeholder="Question Content"><?=htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8');?></textarea>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="author" name="author">
                            <?php foreach ($authors as $author): ?>
                                <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8');?>" 
                                    <?= $author['id'] == $post['userid'] ? 'selected' : ''; ?>>
                                    <?=htmlspecialchars($author['username'], ENT_QUOTES, 'UTF-8');?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="module" name="module">
                            <?php foreach ($modules as $module): ?>
                                <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8');?>" 
                                    <?= $module['id'] == $post['moduleid'] ? 'selected' : ''; ?>>
                                    <?=htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8');?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                        Save Changes
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="questions.php">Back to Questions</a>
                </div>
            </div>
        </div>
    </div>
</div>