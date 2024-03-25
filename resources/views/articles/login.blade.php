<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <h1>Form Login</h1>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form id="loginForm">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me?</label>
        </div>
        <button type="button" class="btn btn-primary" onclick="submitLoginForm()">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function submitLoginForm() {
            var formData = {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                _token: '{{ csrf_token() }}'
            };

            // Kirim permintaan POST ke server
            fetch('{{ route("login") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Simpan token ke local storage
                    localStorage.setItem('token', data.access_token);
                    // Redirect ke halaman yang diinginkan
                    window.location.href = '/home'; // Ganti dengan halaman yang diinginkan setelah login berhasil
                })
                .catch(error => {
                    console.error('There was an error!', error);
                    alert('Login failed. Please try again.');
                });
        }
    </script>
</body>

</html>