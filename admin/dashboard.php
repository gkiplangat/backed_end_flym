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
        <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">Feed My Lambs Youth Ministry </a>
        
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
    <br>
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
    <!--offcanvas-->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <!---->
        <div class="row mb-2 ">
          <div class="col-md-12 fw-bold fs-3 section-title">Fly-M Arms Overview</div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card text-white bg-info h-100">
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

        <div class="row mb-2 section-title">
          <div class="col-md-12 fw-bold fs-3">Departmental Leadership</div>
        </div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <!-- Check for success or error flags -->
<!-- Check for success or error flags -->
<?php if (isset($_GET['success'])): ?>
      <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        New leader added successfully!
        <!--
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
-->
      </div>
    <?php elseif (isset($_GET['error'])): ?>
      <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to add the leader. Please try again.
    <!--
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        -->
      </div>
    <?php endif; ?>

      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="table-title"><strong>Leaders Tables</strong></span>
        <!-- Add Button to trigger the modal -->
        <button
          class="btn btn-primary"
          type="button"
          data-bs-toggle="modal"
          data-bs-target="#addItemModal"
        >
          Add New
        </button>
      </div>
      <div class="card-body">
      <div class="table-responsive">
  <table
    id="example"
    class="table table-striped data-table"
    style="width: 100%"
  >
    <thead>
      <tr>
        <th>Department</th>
        <th>Name</th>
        <th>Position</th>
        <th>Phone Number</th>
      </tr>
    </thead>
    <tbody>
      <?php include 'get_leaders.php'; ?>
    </tbody>
  </table>
</div>

      </div>
    </div>
  </div>
</div>

<!-- Modal for Adding New Item -->
<div
  class="modal fade"
  id="addItemModal"
  tabindex="-1"
  aria-labelledby="addItemModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItemModalLabel">Add New Leader</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="addItemForm" action="add_leader.php" method="POST">
          <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input
              type="text"
              class="form-control"
              id="department"
              name="department"
              placeholder="Enter Department"
              required
            />
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="fullname"
              placeholder="Enter Name"
              required
            />
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input
              type="text"
              class="form-control"
              id="position"
              name="position"
              placeholder="Enter Position"
              required
            />
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input
              type="number"
              class="form-control"
              id="phone"
              name="phone_number"
              placeholder="Enter Phone Number"
              required
            />
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <!-- Move this button inside the form and set its type to "submit" -->
            <button type="submit" class="btn btn-primary" id="saveItemButton">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!--Departments and Subdeparments-->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <!-- Check for success or error flags -->
<!-- Check for success or error flags -->
<?php if (isset($_GET['success'])): ?>
      <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        New leader added successfully!
        <!--
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
-->
      </div>
    <?php elseif (isset($_GET['error'])): ?>
      <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to add the leader. Please try again.
    <!--
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        -->
      </div>
    <?php endif; ?>

      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="table-title"><strong>Departments and Sub-departments</strong></span>
        <!-- Add Button to trigger the modal -->
        <button
          class="btn btn-primary"
          type="button"
          data-bs-toggle="modal"
          data-bs-target="#addItemModal"
        >
          Add New
        </button>
      </div>
      <div class="card-body">
      <div class="table-responsive">
  <table
    id="example"
    class="table table-striped data-table"
    style="width: 100%"
  >
    <thead>
      <tr>
      <th>Department/Category ID</th>  
      <th>Department/Category Name</th>
      </tr>
    </thead>
    <tbody>
      <?php include 'get_leaders.php'; ?>
    </tbody>
  </table>
</div>

      </div>
    </div>
  </div>
</div>

<!-- Modal for Adding New Item -->
<div
  class="modal fade"
  id="addItemModal"
  tabindex="-1"
  aria-labelledby="addItemModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItemModalLabel">Add New Leader</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="addItemForm" action="add_leader.php" method="POST">
          <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input
              type="text"
              class="form-control"
              id="department"
              name="department"
              placeholder="Enter Department"
              required
            />
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="fullname"
              placeholder="Enter Name"
              required
            />
          </div>
          <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input
              type="text"
              class="form-control"
              id="position"
              name="position"
              placeholder="Enter Position"
              required
            />
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input
              type="number"
              class="form-control"
              id="phone"
              name="phone_number"
              placeholder="Enter Phone Number"
              required
            />
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <!-- Move this button inside the form and set its type to "submit" -->
            <button type="submit" class="btn btn-primary" id="saveItemButton">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
    </main>

<!--adding js ...................................files-->
<script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>