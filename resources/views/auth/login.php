<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - InfoKampus</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <?php if (session('success')) { ?>
        <div id="loginToast" class="login-toast login-toast-success"><?= session('success') ?></div>
        <script>
        var t = document.getElementById('loginToast');
        if (t) {
            t.classList.add('show');
            setTimeout(function(){ t.classList.remove('show'); }, 3000);
            setTimeout(function(){ window.location.href = '/dashboard'; }, 3000);
        }
        </script>
    <?php } elseif ($errors->any()) { ?>
        <div id="loginToast" class="login-toast login-toast-error"><?= $errors->first('email') ?></div>
        <script>
        var t = document.getElementById('loginToast');
        if (t) {
            t.classList.add('show');
            setTimeout(function(){ t.classList.remove('show'); }, 3000);
        }
        </script>
    <?php } ?>
    <script>if(!sessionStorage.getItem('v')){document.body.classList.add('page-animate');sessionStorage.setItem('v','1')}</script>
    <div class="auth-page">
            <div class="auth-card">
            <div class="auth-header">
                <h2>Log in</h2>
                <a href="/" class="auth-close">&times;</a>
            </div>

            <form class="auth-form" method="POST" action="/login">
                <?= csrf_field() ?>
                <div class="auth-field">
                    <input type="text" id="email" name="email" placeholder="Username" value="<?= old('email') ?>" required>
                </div>

                <div class="auth-field">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <button type="button" class="auth-pw-toggle" aria-label="Toggle password visibility">
                        <svg class="eye-open" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="eye-closed" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                    </button>
                </div>

                <button type="submit" class="auth-btn">Login</button>
            </form>
        </div>
    </div>

    <script>
    document.querySelectorAll('.auth-pw-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.previousElementSibling;
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            btn.querySelector('.eye-open').style.display = isPassword ? 'none' : '';
            btn.querySelector('.eye-closed').style.display = isPassword ? '' : 'none';
        });
    });
    </script>
</body>
</html>
