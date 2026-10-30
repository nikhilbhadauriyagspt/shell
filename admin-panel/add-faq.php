<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $conn->real_escape_string($_POST['question']);
    $answer = $conn->real_escape_string($_POST['answer']);

    $sql = "INSERT INTO faqs (question, answer) VALUES ('$question', '$answer')";
    
    if ($conn->query($sql)) {
        echo "<script type='text/javascript'>
                alert('FAQ added successfully!');
                window.location.href = 'manage_faqs.php';
              </script>";
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add FAQ - Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="d-flex" id="wrapper">

    <?php include 'sidebar.php'; ?>

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="d-flex align-items-center gap-3">
                <button class="btn" id="menu-toggle" title="Toggle Sidebar"><i class="fas fa-bars"></i></button>
                <span class="fw-semibold text-secondary d-none d-sm-inline">FAQ Management</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border px-3 py-2 d-none d-md-inline-flex align-items-center gap-2">
                    <i class="fas fa-user-shield text-danger"></i> <?= htmlspecialchars($_SESSION['admin_user'] ?? 'Admin') ?>
                </span>
                <a href="logout.php" class="btn logout-btn">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <div class="admin-surface-card" style="max-width: 780px; margin: 0 auto;">
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom gap-2">
                    <div>
                        <h2 class="mb-1">Add Frequently Asked Question</h2>
                        <p class="text-muted mb-0" style="font-size: 13.5px;">Create a new question and answer pair for the website FAQ page</p>
                    </div>
                    <a href="manage_faqs.php" class="btn btn-outline-secondary btn-sm px-3 py-2 rounded-3">
                        <i class="fas fa-list-ul me-1"></i> Manage FAQs
                    </a>
                </div>

                <form action="" method="POST">
                    <div class="mb-4">
                        <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
                        <input type="text" name="question" id="question" class="form-control" placeholder="e.g. How long does Ceramic Coating last?" required>
                    </div>

                    <div class="mb-4">
                        <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
                        <textarea name="answer" id="answer" class="form-control" rows="5" placeholder="Write a clear and helpful answer..." required></textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="manage_faqs.php" class="btn btn-light border px-4">Cancel</a>
                        <button type="submit" class="btn btn-dark px-4"><i class="fas fa-plus me-2"></i>Save FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar-wrapper');
    const content = document.getElementById('page-content-wrapper');

    menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('d-none');
        const isMobile = window.innerWidth <= 768;
        if (sidebar.classList.contains('d-none')) {
            content.style.marginLeft = '0';
            content.style.width = '100%';
        } else {
            content.style.marginLeft = isMobile ? '0' : '260px';
            content.style.width = isMobile ? '100%' : 'calc(100% - 260px)';
        }
    });

    document.querySelectorAll('.dropdown').forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            dropdown.classList.toggle('open');
            dropdown.classList.toggle('close', !dropdown.classList.contains('open'));
        });
    });
</script>
</body>
</html>
<?php $conn->close(); ?>