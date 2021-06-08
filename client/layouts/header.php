<?php
session_start();
?>

<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/uas-donordarah" class="mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <i class="bi-bootstrap" style="font-size: x-large;"></i>
        <span class="fs-4 ml-4">Client</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="/uas_donordarah/client/index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="pmi" class="nav-link">Kapasitas Darah</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        <?php if (isset($_SESSION['level'])) : ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['level'] ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">               
                <li><a class="dropdown-item" href="/uas-donordarah/client/edit_profile.php">Edit Profile</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
            <?php endif; ?>
        </li>
    </ul>
</header>