<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email !== '' && $password !== '') {
        $_SESSION['user_email'] = $email;
        header('Location: dashboard.php');
        exit;
    }

    $error = 'Please enter your email address and password.';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Emergency Dispatch Systems - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body class="login-page">
    <main class="container-fluid min-vh-100 p-0">
        <div class="row g-0 min-vh-100">
            <section class="col-lg-5 d-flex align-items-center bg-white">
                <div class="login-panel w-100">
                    <div class="brand d-flex align-items-center gap-3 mb-5">
                        <div class="brand-mark">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h1 class="brand-title mb-0">EMERGENCY</h1>
                            <p class="brand-subtitle mb-0">DISPATCH SYSTEMS</p>
                        </div>
                    </div>

                    <h2 class="login-heading">Welcome back</h2>
                    <p class="login-copy mb-4">Please enter your credentials to sign in</p>

                    <?php if ($error !== ''): ?>
                        <div class="alert alert-danger py-2" role="alert"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>

                    <form method="post" action="index.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control custom-input" id="email" name="email" placeholder="john.doe@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="password-field">
                                <input type="password" class="form-control custom-input" id="password" name="password" placeholder="Enter your password" required>
                                <button class="password-toggle" type="button" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <label class="remember-label">
                                <input class="form-check-input me-2" type="checkbox" name="remember">
                                Remember me
                            </label>
                            <a class="text-link" href="#">Forgot password?</a>
                        </div>

                        <button class="btn signin-btn w-100" type="submit">Sign In</button>
                    </form>

                    <p class="signup-copy text-center mt-4 mb-0">
                        Don't have an account? <a href="#">Sign up</a>
                    </p>
                </div>
            </section>

            <section class="col-lg-7 d-none d-lg-flex align-items-center hero-panel">
                <div class="hero-content">
                    <h2>Streamline Your Emergency Response Operations</h2>
                    <p>Manage vendors, agents, and dispatch orders all in one powerful platform. Built for efficiency and reliability.</p>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <strong>1,145</strong>
                            <span>Active Orders</span>
                        </div>
                        <div class="stat-card">
                            <strong>87+</strong>
                            <span>Agents Online</span>
                        </div>
                        <div class="stat-card">
                            <strong>55</strong>
                            <span>Active Vendors</span>
                        </div>
                        <div class="stat-card">
                            <strong>24/7</strong>
                            <span>Support Available</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script src="assets/js/app.js"></script>
</body>
</html>
