<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container">
        <a class="navbar-brand" href="/">TODO App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/todos">Todo list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/notes">Notes</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (!isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary mx-2" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="/register">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger mx-2" href="/logout">Logout</a>
                    </li>
                    <?php
                    $id = rand(1000000000, 9999999999);
                    echo "<a href='https://t.me/mt_todo_app_bot?start=$id' class='ms-2 text-underline'>Connect to telegram</a>";
                    ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
