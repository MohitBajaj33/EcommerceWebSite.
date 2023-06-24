<footer id="footer" class="section-p1">
    <div class="copyright">
        <div class="address">
            <div class="col-md-12 px-5 text-center">
                    <h5><i class="fa-solid fa-phone"></i> Phone: 9720161885</h5>
                    <h5><i class="fa-regular fa-envelope"></i> E-mail: mohitbajaj5599@gmail.com</i></h5>
                    <h5><i class="fa-sharp fa-solid fa-location-dot"></i> Badaun road ,bareilly ,uttar pradesh -243001</h5>
            </div>
            </div class="py-2">
                <p>&#169; 2022,Tech2 etc-HTML CSS Ecommerce Template</p>
            </div>
        </div>
       
    </div>
       
</footer>


<script src="assets/js/jquery-3.6.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>

    <!-- alertifyjs -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


<script>
    alertify.set('notifier','position', 'top-right');
  <?php if(isset($_SESSION['message'])){?>
      
      alertify.success('<?php echo $_SESSION['message']?>' );
  <?php
  unset($_SESSION['message']);
  } ?>
</script>
  </body>
</html>