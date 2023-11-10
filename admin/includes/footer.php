<footer class="footer pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
         
          <div class="col-lg-12">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
           
              <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">About Us</a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </main>

  <!--   Core JS Files   -->
  <script src="assets/js/jquery-3.6.3.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>

  <!--ALERTIFY JS-->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <script>
    <?php if(isset($_SESSION['message'])) { ?>
     alertify.set('notifier','position', 'top-right');
     alertify.success("<?= $_SESSION['message']; ?> ");

   <?php

   unset($_SESSION['message']);

    } 

    ?>
  
  </script>

  </body>

</html>