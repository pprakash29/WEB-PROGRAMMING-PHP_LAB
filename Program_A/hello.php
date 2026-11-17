<?php
ob_start();

date_default_timezone_set('Asia/Kolkata');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Start a new session after form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');

    if ($name === '') {
        header('Location: index.php');
        exit();
    }

    session_regenerate_id(true);

    $_SESSION['name'] = $name;
    $_SESSION['start_time'] = time();
}

// Check session details
if (!isset($_SESSION['name'], $_SESSION['start_time'])) {
    header('Location: index.php');
    exit();
}

$name = $_SESSION['name'];
$startTime = $_SESSION['start_time'];
$formattedTime = date('d-m-Y h:i:s A', $startTime);
$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Program A</title>
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

        .details {
            background: #f7f9fd;
            border-radius: 14px;
            padding: 22px;
            margin: 0 auto 25px;
            max-width: 430px;
            text-align: left;
        }

        .detail-label {
            color: #71809a;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .detail-value {
            color: #17233d;
            font-size: 17px;
            margin-bottom: 22px;
        }

        .detail-value:last-child {
            margin-bottom: 0;
        }

        .center-btn {
            display: inline-block;
            background: linear-gradient(100deg, #4778f5, #796be9);
            color: white;
            text-decoration: none;
            padding: 14px 25px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 13px;
            border: none;
        }

        @media(max-width: 600px) {
            .center-card {
                padding: 28px 18px;
            }

            .center-card h1 {
                font-size: 23px;
            }
        }
    </style>
</head>
<body>

<header class="nav">
    <a class="brand" href="../">
        <b>P</b> PHP LAB
    </a>
    <a class="back" href="../">← Back to programs</a>
</header>

<main class="center-wrap">

    <section class="center-card">

        <div class="status-icon">✓</div>

        <h1>Welcome, <?= $safeName ?>!</h1>

        <p class="description">
            Your session has started successfully.
            Your session details are recorded below.
        </p>

        <div class="details">

            <div class="detail-label">YOUR NAME</div>
            <div class="detail-value"><?= $safeName ?></div>

            <div class="detail-label">SESSION STARTED AT (IST)</div>
            <div class="detail-value"><?= $formattedTime ?></div>

        </div>

        <a href="logout.php" class="center-btn">
            Logout →
        </a>

    </section>

</main>

<footer class="footer">
    PHP LAB STUDIO · PROGRAM A
</footer>

</body>
</html>
