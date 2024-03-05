<div class="card p-3">
    <div class="card-title h1">
        <?= $data['judul']; ?>
    </div>
    <div class="card-body">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach( $data['user'] as $usr ) : ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?= $usr['name']; ?></td>
            <td><?= $usr['email']; ?></td>
            <td><?= $usr['password']; ?></td>
            <td>
                <div>
                    <button class="btn btn-primary update_data" data-name="<?= $usr['name']; ?>" data-email="<?= $usr['email']; ?>" data-userid="<?= $usr['id_users']; ?>">EDIT</button>
                    <button class="btn btn-danger delete_data" data-name="<?= $usr['name']; ?>" data-userid="<?= $usr['id_users']; ?>">HAPUS</button>
                </div>
            </td>
        </tr>
   <?php endforeach; ?>
  </tbody>
</table>
    </div>
</div>




<div class="modal fade" id="update_data_modal" tabindex="-1" aria-labelledby="update_data_modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="update_data_modalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="update_data_form" method="post">
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
                <input type="password" name="password" class="form-control" id="password" placeholder="password baru">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_submit">Simpan</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var base_url = '<?= BASEURL; ?>';
    $(document).ready(function () {
        $('.delete_data').on('click', function () {
            var name = $(this).data('name');  
            if (confirm('Apakah Anda yakin ingin menghapus data ' + name + '?')) {
                var userId = $(this).data('userid');  
                $.ajax({
                    type: 'POST',
                    url: base_url+'public/destroy/', 
                    data: { user_id: userId },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    }
                });
            }
        });


    //     $(".update_data").on('click', function(){
    //         var name = $(this).data('name');
    //         var email = $(this).data('email');
    //         $('#update_data_modal').modal('show');
    //         $('#update_data_modalLabel').text('Update data '+name);
    //         $('#nama').val(name);
    //         $('#email').val(email);
    //     })


    //    $('.update_submit').on('click', function () {
    //         var updatedName = $('#nama').val();
    //         var updatedEmail = $('#email').val();
    //         var userId = $(this).data('userid');
    //         var updatedPassword = $('#password').val();
    //         $.ajax({
    //             type: 'POST',
    //             url: base_url + 'public/update_data/',
    //             data: {
    //                 user_id: userId,
    //                 updated_name: updatedName,
    //                 updated_email: updatedEmail,
    //                 updated_password: updatedPassword
    //             },
    //             success: function (response) {
    //                 // location.reload();
    //             },
    //             error: function (error) {
    //                 console.error('Error:', error);
    //             }
    //         });
    //         $('#update_data_modal').modal('hide');
    //     });
    $(".update_data").on('click', function(){
    var name = $(this).data('name');
    var email = $(this).data('email');
    var userId = $(this).data('userid'); // Add this line to get the user ID
    $('#update_data_modal').modal('show');
    $('#update_data_modalLabel').text('Update data ' + name);
    $('#nama').val(name);
    $('#email').val(email);
    // Set the user ID in the update_submit button's data attribute
    $('.update_submit').data('userid', userId);
});

$('.update_submit').on('click', function () {
    var updatedName = $('#nama').val();
    var updatedEmail = $('#email').val();
    var userId = $(this).data('userid'); // Use the data attribute to get the user ID
    var updatedPassword = $('#password').val();
    $.ajax({
        type: 'POST',
        url: base_url + 'public/update_data/',
        data: {
            user_id: userId,
            updated_name: updatedName,
            updated_email: updatedEmail,
            updated_password: updatedPassword
        },
        success: function (response) {
            location.reload();
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
    $('#update_data_modal').modal('hide');
});

    });
</script>
