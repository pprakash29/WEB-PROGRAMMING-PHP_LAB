<?php
date_default_timezone_set('Asia/Kolkata');

session_start();

if (isset($_SESSION['name'], $_SESSION['start_time'])) {
    header('Location: hello.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Management</title>
    <link rel="stylesheet" href="../assets/css/program.css">
</head>
<body>

<header class="nav">
    <a class="brand" href="../">
        <b>P</b> PHP LAB
    </a>
    <a class="back" href="../">← Back to programs</a>
</header>

<main class="wrap">

    <div class="eyebrow">PROGRAM A · SESSION MANAGEMENT</div>

    <h1 class="title">Let's get started.</h1>

    <p class="subtitle">
        Enter your name to begin a session.
        Your start time will be recorded automatically.
    </p>

    <section class="panel">

        <div class="symbol">◉</div>

        <h2>Welcome to your session</h2>

        <p class="muted">
            Your session details will appear after you continue.
        </p>

        <form action="hello.php" method="post">

            <div class="field">
                <label for="name">Your name</label>

                <input
                    id="name"
                    name="name"
                    maxlength="80"
                    placeholder="Enter your full name"
                    required
                >
            </div>

            <button class="btn" type="submit">
                Start session →
            </button>

        </form>

    </section>

</main>

<footer class="footer">
    PHP LAB STUDIO · PROGRAM A
</footer>

</body>
</html>
