<div class="container">
  <div class="wrapper">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="m-auto text-center sign-in-img">
          <img src="<?= BASEURL; ?>assets/img/registration-form.jpg" alt="" class="img-fluid">
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 p-5 sign-in-form">
        <form id="signInForm" action="<?= BASEURL; ?>public/signin/processSignIn" method="post">

          <h1 class="text-center sign-up-title">Sign In</h1>
          <ul>
            <li>
              <div class="input-group input-group-lg mt-5 mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="akbar@mail.com">
              </div>
            </li>
            <li>
              <div class="input-group input-group-lg mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="123123">
              </div>
            </li>
          </ul>
          <div class="ms-4">
            <div class="form-check mt-2 mb-2">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Agree to all terms and conditions
              </label>
            </div>
            <button id="signInBtn" class="btn btn-lg sign-in-btn text-uppercase" type="button">
              Sign In
            </button>
            belum punya akun? <a href="<?= BASEURL; ?>public/home/register">daftar disini!</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Add jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Handle form submission using jQuery
    $("#signInBtn").click(function() {
        $.ajax({
            type: "POST",
            url: $("#signInForm").attr("action"),
            data: $("#signInForm").serialize(),
            success: function(response) {
              window.location.href = 'home/dashboard';
                console.log(response);
            },
            error: function(error) {
              alert('password atau email salah!')
                console.error(error);
            }
        });
    });
});
</script>
