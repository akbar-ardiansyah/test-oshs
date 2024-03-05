<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-sm-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h1 class="card-title text-center">Register</h1>
                    <form id="register_form" action="<?= BASEURL; ?>public/register" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div class="float-right">Sudah punya akun <a href="<?= BASEURL; ?>public">login disini!</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#register_form").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
                if (response == "Registrasi gagal.") {
                    alert(response);
                } else if(response == "Email sudah terdaftar."){
                    alert(response);
                } else if(response == "Registrasi berhasil."){
                    alert(response);
                    location.reload();
                }
            },
            error: function(error) {
                console.error(error);
                // Handle errors, show an error message, etc.
            }
        });
    });
});
</script>
