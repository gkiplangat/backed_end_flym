<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>FLY-M Admin</title>
    <!--Styling the ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,file-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="css/style.css" />

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
        <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">Gid</a>
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

    <!--navbar-->
    <!--offcanvas-->

    <div
      class="offcanvas offcanvas-start text-white sidebar-nav"
      tabindex="-1"
      id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2">
                  <i class="bi bi-speedometer2"></i>
                </span>
                <span>Dashboard</span>
              </a>
            </li>

            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2">
                  <i class="bi bi-newspaper"></i>
                </span>
                <span>News</span>
              </a>
            </li>

            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2">
                  <i class="bi bi-images"></i>
                </span>
                <span>Gallery</span>
              </a>
            </li>

            <li>
              <a href="#" class="nav-link px-3 active">
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
        <i class="bi bi-person"></i> <?php echo " <p>". $_SESSION['username']."</p>";?>
      </a>
    </li>
    <!-- Divider -->
    <li><hr class="dropdown-divider"></li>
    <!-- Update Account -->
    <li>
      <a href="#" class="dropdown-item">
        <i class="bi bi-gear"></i> Update Account
      </a>
    </li>
  </ul>
</li>


            
          </ul>
        </nav>
      </div>
    </div>
    <!--offcanvas-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <!---->
        <div class="row">
          <div class="col-md-12 fw-bold fs-3">Dashboard</div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary h-100">
              <div class="card-header">Lambs Ministry</div>
              <div class="card-body">
                <h5 class="card-title">Schools Reached</h5>
                <p class="card-text">
                  .....
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning h-100">
              <div class="card-header">Junior Radicals</div>
              <div class="card-body">
                <h5 class="card-title">Total Mentees</h5>
                <p class="card-text">
                  ...
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card text-white bg-success h-100">
              <div class="card-header">Breach Repairers</div>
              <div class="card-body">
                <h5 class="card-title">
                  Universities Reached
                </h5>
                <p class="card-text">
                  ...
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card text-white bg-secondary h-100">
              <div class="card-header">FLY-M Alumni</div>
              <div class="card-body">
                <h5 class="card-title">Total Alumni</h5>
                <p class="card-text">...</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col md-12">
            <div class="card">
              <div class="card-header">Data Tables</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start Date</th>
                        <th>Salary</th>
                      </tr>
                    </thead>
                      <tr>
                        <td>Gideon Kiplangat</td>
                        <td>Sofware Engineer</td>
                        <td>Israel</td>
                        <td>23</td>
                        <td>22-03-2023</td>
                        <td>$9600</td>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>


    <h1>Admin Page</h1> </br>
    <?php echo " <h1>Welcome ". $_SESSION['username']."</h1>";?>
    <a href="logout.php">Logout</a>

<!--adding js ...................................files-->
<script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>