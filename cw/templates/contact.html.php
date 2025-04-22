<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Contact Us</h1>
                </div>
                <form class="user" action="send_email.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="username" id="username" class="form-control">
                            <option value="">Select a user</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?=htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');?>">
                                    <?=htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8');?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="module_name" id="module_name" class="form-control">
                            <option value="">Select a module</option>
                            <?php foreach ($modules as $module): ?>
                                <option value="<?=htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8');?>">
                                    <?=htmlspecialchars($module['module_name'], ENT_QUOTES, 'UTF-8');?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea id="message" name="message" rows="5" class="form-control" 
                            placeholder="Type your message here"></textarea>
                    </div>

                    <button type="submit" name="submitContact" class="btn btn-primary btn-user btn-block">
                        Send Message
                    </button>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>