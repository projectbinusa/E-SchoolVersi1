<!DOCTYPE html>
<html lang="en">

<head>
    <title>Auth Page</title>
    <?php $this->load->view('components/head') ?>
    <style>
    .shadow-input {
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }
    </style>
</head>

<body class="font-web min-vh-100 min-vw-100 d-flex justify-content-center align-items-center container"
    style="background-color: #f1f5f9;">
    <div class="bg-white text-black max-h-75 h-75 max-w-75 w-75 row shadow-lg rounded">
        <div class="px-0 py-5 d-lg-flex d-none col-lg-6 col-12 justify-content-center align-items-center rounded-end"
            style="background-color: #404036;">
            <img src="<?php echo base_url('uploads/logo/logo-baru-crop.png');?>" alt="" width="300px"
                style="margin: 100px;">
        </div>
        <div class="my-auto col-lg-6 col-12">
            <form method="post" action="<?php echo base_url('auth/aksi_login');?>">
                <div class="d-lg-none d-flex justify-content-center py-2">
                    <img src="<?php echo base_url('uploads/logo/logo-baru-crop.png');?>" alt="" width="150px">
                </div>
                <div class="px-3 fs-4 py-2">
                    <h2>Login</h2>
                    <div class="mt-4">
                        <label for="username" class="form-label" style="color: #374151;">Username</label>
                        <input required type="text" name="username" class="form-control shadow-input text-secondary"
                            id="username" placeholder="Username">
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label" style="color: #374151;">Password</label>
                        <div class="position-relative">
                            <input required type="password" name="password" class="form-control shadow-input text-secondary"
                                id="password" placeholder="Password">
                            <span class="position-absolute top-0 mt-2 me-3 pointer text-secondary" id="togglePassword"
                                style="right: 0;cursor
                                : pointer;">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-secondary w-100 fs-4"
                            style="border: 1px solid  #E5E7EB;">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.innerHTML = type === 'password' ? '<i class="fas fa-eye-slash"></i>' :
            '<i class="fas fa-eye"></i>';
    });
    </script>
</body>
<?php $this->load->view('components/scripts') ?>

</html>