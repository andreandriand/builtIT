<nav class="navbar navbar-expand-lg navbar-light bg-pink">
    <div class="container">
      <a class="navbar-brand" href="index.php">BuildIT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <?php

          if (isset($_SESSION['username'])) {
            $id = $_SESSION['username'];
            echo '<a class="nav-item nav-link" href="history.php?id=' . $id . '" >History</a>';
            echo '<a class="nav-item nav-link" href="logout.php">Logout</a>';
          } else {
            echo '<button type="button" class="nav-link btn" data-bs-toggle="modal" data-bs-target="#login">
                    Login
                  </button>';
            echo '<button type="button" class="nav-link btn" data-bs-toggle="modal" data-bs-target="#register">
                  Register
                </button>';
          }

          ?>
        </div>
      </div>
    </div>
  </nav>