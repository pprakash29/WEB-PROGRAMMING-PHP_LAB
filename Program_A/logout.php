<?php
date_default_timezone_set('Asia/Kolkata');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get session details before destroying the session
$name = $_SESSION['name'] ?? 'User';
$startTime = $_SESSION['start_time'] ?? time();

// Calculate actual session duration
$logoutTime = time();
$duration = max(0, $logoutTime - $startTime);

$hours = floor($duration / 3600);
$minutes = floor(($duration % 3600) / 60);
$seconds = $duration % 60;

$formattedDuration = sprintf(
    '%02d:%02d:%02d',
    $hours,
    $minutes,
    $seconds
);

$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

// Destroy session after calculating duration
$_SESSION = [];

if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Program A</title>
    <link rel="stylesheet" href="../assets/css/program.css">

    <style>
        .center-wrap {
            min-height: 75vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 45px 20px;
        }

        .center-card {
            width: 100%;
            max-width: 730px;
            background: #fff;
            border: 1px solid #e9edf5;
            border-radius: 22px;
            padding: 38px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(35, 55, 90, 0.06);
        }

        .status-icon {
            width: 54px;
            height: 54px;
            margin: 0 auto 22px;
            display: grid;
            place-items: center;
            border-radius: 17px;
            background: #e6f8f2;
            color: #20a987;
            font-size: 29px;
        }

        .center-card h1 {
            font-size: 28px;
            margin: 0 0 12px;
            color: #17233d;
        }

        .description {
            color: #8490a4;
            margin-bottom: 30px;
            line-height: 1.7;
        }

        .duration-box {
            display: inline-block;
            background: #f3f6ff;
            border-radius: 15px;
            padding: 19px 28px;
            margin-bottom: 24px;
        }

        .duration-label {
            color: #71809a;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.3px;
            margin-bottom: 9px;
        }

        .duration-value {
            color: #5575e8;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .center-btn {
            display: inline-block;
            background: #fff;
            color: #647795;
            text-decoration: none;
            padding: 13px 23px;
            border: 1px solid #dce3f0;
            border-radius: 10px;
            font-weight: 700;
            font-size: 13px;
        }

        .center-btn:hover {
            background: #f7f9fd;
        }

        @media(max-width: 600px) {
            .center-card {
                padding: 28px 18px;
            }

            .center-card h1 {
                font-size: 23px;
            }

            .duration-value {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<main class="center-wrap">

    <section class="center-card">

        <div class="status-icon">✓</div>

        <h1>Thank you, <?= $safeName ?>!</h1>

        <p class="description">
            You have successfully logged out.
            Here is your total usage duration.
        </p>

        <div class="duration-box">

            <div class="duration-label">
                SESSION DURATION
            </div>

            <div class="duration-value">
                <?= $formattedDuration ?>
            </div>

        </div>

        <br>

        <a href="index.php" class="center-btn">
            Start a new session
        </a>

    </section>

</main>

</body>
</html>
