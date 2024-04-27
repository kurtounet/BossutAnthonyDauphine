<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="https://localhost/bossutanthonydauphine/index.php">Home</a>
            </li>

            <?PHP
            if (isset($_SESSION["username"])) {
                echo ' 
                <li class="nav-item">
                <a class="nav-link" href="./index.php">Admin</a>
                </li>               
                 <li class="nav-item">
                <a class="nav-link" href="https://localhost/bossutanthonydauphine/logout.php">LoginOut</a>
                </li>';
            }

            ?>
        </ul>
    </div>
</nav>