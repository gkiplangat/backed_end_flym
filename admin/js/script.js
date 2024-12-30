// Auto-dismiss success alert after 5 seconds
setTimeout(() => {
  const successAlert = document.getElementById('success-alert');
  const errorAlert = document.getElementById('error-alert');
  if (successAlert) {
    successAlert.classList.remove('show');
    successAlert.classList.add('fade');
  }
  if (errorAlert) {
    errorAlert.classList.remove('show');
    errorAlert.classList.add('fade');
  }
}, 5000);