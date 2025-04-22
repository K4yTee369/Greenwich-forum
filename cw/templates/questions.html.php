<?php
if (empty($post)) {
    echo '<div class="alert alert-info" role="alert">No questions found.</div>';
} else {
    foreach ($post as $post): ?>
        <div class="card mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary" style="color: #2980b9;">
                    <i style="color: #3498db;"></i>
                    <?=htmlspecialchars($post['username'], ENT_QUOTES, 'UTF-8')?>
                </h6>
                <span class="badge badge-primary">
                    <?=htmlspecialchars($post['module_name'], ENT_QUOTES, 'UTF-8')?>
                </span>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-3 fw-bold" style="color: #34495e;">
                    <?=htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8')?>
                </h6>
                <p class="card-text" style="color: #505864;">
                    <?=htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8')?>
                </p>
                <?php if (isset($post['pic'])): ?>
                    <img class="img-fluid rounded" style="max-width: 300px; border: 2px solid #f0f2f5;" 
                         src="data:image/jpeg;base64,<?=base64_encode($post['pic'])?>"/>
                <?php endif; ?>
            </div>
            <div class="card-footer bg-transparent border-0">
                <small style="color: #7f8c8d;">
                    <i class="far fa-clock me-1" style="color: #95a5a6;"></i>
                    Posted on: <?=htmlspecialchars($post['created_at'], ENT_QUOTES, 'UTF-8')?>
                </small>
                <div class="btn-group float-right">
                    <a href="edit_questions.php?id=<?=$post['id']?>" 
                       class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="delete_questions.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?=htmlspecialchars($post['id'], ENT_QUOTES, 'UTF-8')?>">
                        <button type="submit" 
                                class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;
}
?>

<style>
/* Add hover effects for buttons */
.btn:hover {
    opacity: 0.85;
    transform: translateY(-1px);
}

/* Add smooth transition for cards */
.question-container .card {
    transition: transform 0.2s ease-in-out;
}

.question-container .card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
}

/* Custom scrollbar for better aesthetics */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #3498db;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #2980b9;
}
</style>