<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
                </li>
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item text-primary" href="https://github.com/pmerrill/PebbleMVC" target="_blank">GitHub</a>
                        <a class="dropdown-item text-primary" href="https://twitter.com/petemerrill" target="_blank">@PeteMerrill</a>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">
                <?php
                if(isset($_SESSION['user_id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Log Out</a>
                </li>
                <?php
                } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Create Account</a>
                </li>
                <?php
                } ?>
            </ul>
        </div>
    </div>
</nav>