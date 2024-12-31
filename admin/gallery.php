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
              New Gallery added successfully!
            </div>
            <?php elseif (isset($_GET['error']) && isset($_GET['type']) && $_GET['type'] === 'leader'): ?>
            <div
            id="error-alert"
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
            >
            Failed to add the Gallery. Please try again.
          </div>
          
          <?php endif; ?>

      <div class="card-header d-flex justify-content-between align-items-center">
        <span class="table-title"><strong>Images</strong></span>

        <!-- Add Button to trigger the modal -->
        <button
          class="btn btn-primary"
          type="button"
          data-bs-toggle="modal"
          data-bs-target="#addgallery"
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
                <th>Associated Department</th>
                <th>Event Title</th>
                <th>Event Caption</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Photo_One</th>
                <th>Action</th>
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
          id="addgallery"
          tabindex="-1"
          aria-labelledby="addItemModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-warning text-light">
                <h5 class="modal-title" id="addItemModalLabel">
                  Add New Gallery
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
                      >Department Asociated</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="department"
                      name="department_assoc"
                      placeholder="Which FLY_M Department is Event Asscociated to?"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Event Title</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="event_title"
                      placeholder="Enter Event Title"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="position" class="form-label">Event Description</label>
                    <input
                      type="text"
                      class="form-control"
                      id="position"
                      name="event_description"
                      placeholder="Enter Event Description"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Venue</label>
                    <input
                      type="text"
                      class="form-control"
                      id="phone"
                      name="venue"
                      placeholder="Where did the event Happen? "
                      required
                    />
                  </div>

                  <div class="mb-3">
                    <label for="phone" class="form-label">Date</label>
                    <input
                      type="date"
                      class="form-control"
                      id="phone"
                      name="date"
                      placeholder="When did the event Happen? "
                      required
                    />
                  </div>

                  <div class="mb-3">
                    <div class="row" >
                    	<div class="col-md-3">
                    		<label for="phone" class="form-label">Photo_One</label>
                    		<input type="file" 
                    		class="form-control" 
                    		id="phone" 
                    		name="photo_one"
                    		placeholder="When did the event Happen? "
                    		required/>
                    	</div>

                    	<div class="col-md-3">
                    		<label for="phone" class="form-label">Photo_Two</label>
                    		<input type="file" 
                    		class="form-control" 
                    		id="phone" 
                    		name="photo_two"
                    		placeholder="When did the event Happen? "
                    		required/>
                    	</div>

                    	<div class="col-md-3">
                    		<label for="phone" class="form-label">Photo_Three</label>
                    		<input type="file" 
                    		class="form-control" 
                    		id="phone" 
                    		name="photo_three"
                    		placeholder="When did the event Happen? "
                    		required/>
                    	</div>

                    	<div class="col-md-3">
                    		<label for="phone" class="form-label">Photo_Four</label>
                    		<input type="file" 
                    		class="form-control" 
                    		id="phone" 
                    		name="photo_four"
                    		placeholder="When did the event Happen? "
                    		required/>
                    	</div>
                    </div>
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
</div>
</main>


<!--Include Footer Section-->
<?php include 'includes/footer.php' ?>