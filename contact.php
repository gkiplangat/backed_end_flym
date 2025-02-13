<!--Include footer Section -->
<?php 
include "includes/header.php"
?>
    <!-- Page Header Start -->
    <div
      class="container-fluid page-header mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">
          Contact Us
        </h1>
        
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div
              class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3"
            >
              Contact Us
            </div>
            <h3 class="display-6 mb-5">
              If You Have Any Query, Please Contact Us
            </h3>

            <form id="contact-form">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" id="name" name="name" class="form-control"  placeholder="Your Name" required  />
                    <label for="name">Your Name</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" id="email" name="email" class="form-control"  placeholder="Your Email" required  />
                    <label for="email">Your Email</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" id="subject" name="subject" class="form-control"  placeholder="Subject" required  />
                    <label for="subject">Subject</label>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-floating">
                    <textarea id="message" name="message" class="form-control"  placeholder="Leave a message here" required style="height: 100px"></textarea>
                    <label for="message">Message</label>
                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary py-2 px-3 me-3">
                    Send Message
                    <div
                      class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2"
                    >
                      <i class="fa fa-arrow-right"></i>
                    </div>
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div
            class="col-lg-6 wow fadeIn"
            data-wow-delay="0.5s"
            style="min-height: 450px"
          >
            <div class="position-relative rounded overflow-hidden h-100">
              <iframe
                class="position-relative w-100 h-100"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8034729386954!2d36.8184897732075!3d-1.2923217356290553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d5dfa419c9%3A0x2231b24ba92f77a4!2sCommerce%20house!5e0!3m2!1sen!2ske!4v1735057952241!5m2!1sen!2ske"
                frameborder="0"
                style="min-height: 450px; border: 0"
                allowfullscreen=""
                aria-hidden="false"
                tabindex="0"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->

<!--Include footer Section -->
<?php 
include "includes/footer.php"
?>