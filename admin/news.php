<!--Include Header Section -->
<?php include 'includes/header.php' ?>

<main class="mt-5 pt-3">
	<div class="container-fluid">
		<!--Title-->
        <div class="row mb-2">
          <div class="col-md-12 fw-bold fs-3 section-title">
            What's New
          </div>  
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

      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="table-title"><strong>Our News</strong></span>

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
	</div>
</main>


<!--Include Footer Section-->
<?php include 'includes/footer.php' ?>