<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?php $this->load->view('style/head') ?>
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
        <div class="col my-auto">
            <form action="">
                <div class="px-5 fs-4">
                    <h2>Login</h2>
                    <div class="mt-4">
                        <label for="exampleInputEmail1" class="form-label" style="color: #374151;">Email</label>
                        <input type="email" class="form-control shadow-input text-secondary" id="exampleInputEmail1"
                            placeholder="Email">
                    </div>
                    <div class="mt-3">
                        <label for="exampleInputEmail1" class="form-label" style="color: #374151;">Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control shadow-input text-secondary" id="password"
                                placeholder="Password">
                            <span
                                class="position-absolute top-0 mt-2 me-3 pointer text-secondary"
                                id="togglePassword" style="right: 0;cursor
                                : pointer;">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-outline-secondary w-100 fs-4"
                            style="border: 1px solid  #E5E7EB;">Login</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col px-0 py-5 d-flex justify-content-center align-items-center bg-black rounded-end">
            <img src="<?php echo base_url('uploads/logo/logo.jpeg');?>" alt="" width="400px">
        </div>
    </div>
    <script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' :
            '<i class="fas fa-eye-slash"></i>';
    });
    </script>
</body>
<?php $this->load->view('style/js') ?>

</html>