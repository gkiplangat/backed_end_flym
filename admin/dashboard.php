<?php include 'includes/header.php' ?>

    <!--Main Content-->
    <main class="mt-5 pt-3">
      <!--Container to nest all other divisions-->
      <div class="container-fluid">

        <!--Title-->
        <div class="row mb-2">
          <div class="col-md-12 fw-bold fs-3 section-title">
            Fly-M Arms Overview
          </div>  
        </div>

        <div class="row">

          <!--First Card: Lambs Ministry-->
          <div class="col-md-3 mb-3">
            <div class="card text-white bg-info h-100">
              <div class="card-header">Lambs Ministry</div>
              <div class="card-body">
                <h5 class="card-title">Schools Reached</h5>
                <p class="card-text">.....</p>
              </div>
            </div>
          </div>

          <!--Second Card: Junior Radicals-->
          <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning h-100">
              <div class="card-header">Junior Radicals</div>
              <div class="card-body">
                <h5 class="card-title">Total Mentees</h5>
                <p class="card-text">...</p>
              </div>
            </div>
          </div>

          <!--Third Card: Breach Repairers-->
          <div class="col-md-3 mb-3">
            <div class="card text-white bg-success h-100">
              <div class="card-header">Breach Repairers</div>
              <div class="card-body">
                <h5 class="card-title">Universities Reached</h5>
                <p class="card-text">...</p>
              </div>
            </div>
          </div>

          <!--Fourth Card: Alumni-->
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

        <!--Leadership-->
        <div class="row mb-2 section-title">
          <div class="col-md-12 fw-bold fs-3">Departmental Leadership</div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <div class="card">
              <!-- Check for success or error flags -->
              <?php if (isset($_GET['success']) && isset($_GET['type']) && $_GET['type'] === 'leader'): ?>
              <div
              id="success-alert"
              class="alert alert-success alert-dismissible fade show"
              role="alert"
              >
              New leader added successfully!
            </div>
            <?php elseif (isset($_GET['error']) && isset($_GET['type']) && $_GET['type'] === 'leader'): ?>
            <div
            id="error-alert"
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
            >
            Failed to add the leader. Please try again.
          </div>
          
          <?php endif; ?>

          <!--reset-->

            <!-- Check for success or error flags -->
              <?php if (isset($_GET['success']) && isset($_GET['type']) && $_GET['type'] === 'resetPassS'): ?>
              <div
              id="success-alert"
              class="alert alert-success alert-dismissible fade show"
              role="alert"
              >
              Password reset successfully!
            </div>
            <?php elseif (isset($_GET['error']) && isset($_GET['type']) && $_GET['type'] === 'resetPassE'): ?>
            <div
            id="error-alert"
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
            >
            Failed to reset password. Please try again.
          </div>
          
          <?php endif; ?>

      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="table-title"><strong>Leaders Tables</strong></span>

        <!-- Add Button to trigger the modal -->
        <button
          class="btn btn-primary"
          type="button"
          data-bs-toggle="modal"
          data-bs-target="#addleader"
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

        <!-- Modal for Adding New Leader -->
        <div
          class="modal fade"
          id="addleader"
          tabindex="-1"
          aria-labelledby="addItemModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header text-white">
                <h5 class="modal-title" id="addItemModalLabel">
                  Add New Leader
                </h5>
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
                    <label for="department" class="form-label"
                      >Department</label
                    >
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
                    <button
                      type="submit"
                      class="btn btn-primary"
                      id="saveItemButton"
                    >
                      Save
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


        <!--Departments and Subdeparments-->
      <div class="row mb-3">
  <!-- Categories Section -->
  <div class="col-md-6">
    <div class="card">
      <!-- Check for success or error flags -->
      <?php if (isset($_GET['success']) && isset($_GET['type']) && $_GET['type'] === 'category'): ?>
      <div
        id="category-success-alert"
        class="alert alert-success alert-dismissible fade show"
        role="alert"
      >
        New Category added successfully!
      </div>
      <?php elseif (isset($_GET['error']) && isset($_GET['type']) && $_GET['type'] === 'category'): ?>
      <div
        id="category-error-alert"
        class="alert alert-danger alert-dismissible fade show"
        role="alert"
      >
        Failed to add the category. Please try again.
      </div>
      <?php endif; ?>

      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="table-title"><strong>Roles Categories</strong></span>
        <!-- Add Button to trigger the modal -->
        <button
          class="btn btn-primary"
          type="button"
          data-bs-toggle="modal"
          data-bs-target="#addCategory"
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
                <th>Department Name</th>
              </tr>
            </thead>
            <tbody>
              <?php include 'get_categories.php'; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Departments Section -->
  <div class="col-md-6">
    <div class="card">
      <!-- Check for success or error flags -->
      <?php if (isset($_GET['success']) && isset($_GET['type']) && $_GET['type'] === 'department'): ?>
      <div
        id="success-alert"
        class="alert alert-success alert-dismissible fade show"
        role="alert"
      >
        New Department added successfully!
      </div>
      <?php elseif (isset($_GET['error']) && isset($_GET['type']) && $_GET['type'] === 'department'): ?>
      <div
        id="error-alert"
        class="alert alert-danger alert-dismissible fade show"
        role="alert"
      >
        Failed to add the Department. Please try again.
      </div>
      <?php endif; ?>

      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="table-title"><strong>Departments</strong></span>
        <!-- Add Button to trigger the modal -->
        <button
          class="btn btn-primary"
          type="button"
          data-bs-toggle="modal"
          data-bs-target="#addDepartment"
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
                <th>Department Name</th>
                <th>Year Founded</th>
              </tr>
            </thead>
            <tbody>
              <?php include 'get_departments.php'; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


        <!--Category Modal-->
        <div
          class="modal fade"
          id="addCategory"
          tabindex="-1"
          aria-labelledby="addItemModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-light" id="addItemModalLabel">
                  Add New Category
                </h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <form id="addItemForm" action="add_category.php" method="POST">
                  <div class="mb-3">
                    <label for="department" class="form-label"
                      >Category_ID</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="department"
                      name="category_id"
                      placeholder="Enter Category ID"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Category_Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="category_name"
                      placeholder="Enter Category Name"
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
                    <button
                      type="submit"
                      class="btn btn-primary"
                      id="saveItemButton"
                    >
                      Save
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!--Departments Modal-->
        <div
          class="modal fade"
          id="addDepartment"
          tabindex="-1"
          aria-labelledby="addItemModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-light" id="addItemModalLabel">
                  Add New Department
                </h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <form id="addItemForm" action="add_department.php" method="POST">
                  <div class="mb-3">
                    <label for="department" class="form-label"
                      >Department_ID</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="department"
                      name="department_id"
                      placeholder="Enter Department ID"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Department_Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="department_name"
                      placeholder="Enter Department Name"
                      required
                    />
                  </div>

                  <div class="mb-3">
                    <label for="name" class="form-label">Year Founded</label>
                    <input
                      type="date"
                      class="form-control"
                      id="name"
                      name="year"
                      placeholder="When was it founded"
                      required
                    />
                  </div>
                 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                    </button>

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

<!--Include Footer Section-->
<?php include 'includes/footer.php' ?>
