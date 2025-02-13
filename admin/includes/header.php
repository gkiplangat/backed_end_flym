<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:index.php");
}
?>

<!--HTML Code begins here-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FLY-M Admin</title>

    <!--Styling the ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,file-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="css/style.css" />

    <!-- Favicon -->
    <link rel="icon" href="img/FLY-M.PNG" type="image/x-icon"/>
    <!-- For better browser support, this line important -->
    <link rel="shortcut icon" href="assets/images/FLY-M.PNG" type="image/x-icon"/>
  </head>
  <body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <!-- Offcanvas trigger -->
        <button
          class="navbar-toggler me-2"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasExample"
          aria-controls="offcanvasExample"
        >
          <span
            class="navbar-toggler-icon"
            data-bs-target="#offcanvasExample"
          ></span>
        </button>
        <!-- Offcanvas trigger -->
        <a class="navbar-brand fw-bold text-uppercase me-auto" href="#"
          >Feed My Lambs Youth Ministry
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="d-flex ms-auto">
            <div class="input-group my-3 my-lg-0">
              <input
                type="text"
                class="form-control"
                aria-label="Recipient's username"
                aria-describedby="button-addon2"
              />
              <button class="btn btn-primary" type="button" id="button-addon2">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </nav>
    <!--navbar Ends Here-->

    <!--offcanvas or Sidebar Begins Here-->
    <div
      class="offcanvas offcanvas-start text-white sidebar-nav"
      tabindex="-1"
      id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel"
    >
      <br />
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <a href="dashboard.php" class="nav-link px-3 active">
                <span class="me-2">
                  <i class="bi bi-speedometer2"></i>
                </span>
                <span>Dashboard</span>
              </a>
            </li>

            <li>
              <a href="news.php" class="nav-link px-3 active">
                <span class="me-2">
                  <i class="bi bi-newspaper"></i>
                </span>
                <span>News</span>
              </a>
            </li>

            <li>
              <a href="gallery.php" class="nav-link px-3 active">
                <span class="me-2">
                  <i class="bi bi-images"></i>
                </span>
                <span>Gallery</span>
              </a>
            </li>

            <li>
              <a href="flym_meetings.php" class="nav-link px-3 active">
                <span class="me-2">
                  <i class="bi bi-people-fill"></i>
                </span>
                <span>FLY-M Meetings</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a
                href="#"
                class="nav-link px-3 active dropdown-toggle"
                id="accountDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <span class="me-2">
                  <i class="bi bi-person-fill"></i>
                </span>
                <span>Account</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                <!-- Display logged-in username -->
                <li>
                  <a href="#" class="dropdown-item">
                    <?php echo $_SESSION['username'];?>
                  </a>
                </li>
                <li>
                  <a href="logout.php" class="dropdown-item">Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!--offcanvas Ends Here-->