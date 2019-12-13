  <!--   Core   -->
  <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
   <script src="./assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
   <script src="./assets/js/plugins/country-picker-flags/js/countrySelect.min.js"></script>
   <script>
$("#country_selector").countrySelect({
  defaultStyling:"inside",
  defaultCountry: 'np',
  //preferredCountries: ['np','gb','ch','ca','do','np']
});

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


 $(document).ready(function() { 
      $("#GFG :input").prop("disabled", true); 
      $(".slide-toggle").click(function() { 
        if ($(".slide-toggle").is(":checked")) { 
          $(".slide-toggle").removeAttr("Checked",""); 
          $("#GFG :input").prop("disabled", false); 
        } 
        else { 
          $(".slide-toggle").attr("checked", "checked");
          $("#GFG :input").prop("disabled", true); 
        } 
      }); 
    }); 
$('#modal-chgpwd').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
})

   </script>
  <!--   Argon JS   -->
  <script src="./assets/js/argon-dashboard.min.js?v=1.1.0"></script>

  <!--<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>-->


</body>

</html>