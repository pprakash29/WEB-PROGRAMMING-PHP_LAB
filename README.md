# PHP LAB STUDIO – PHP PRACTICALS

A modern and interactive PHP lab website containing three practical programs developed as part of the Web Programming course.

## Project Overview

This project includes:

- **Homepage (`index.php`):** Designed homepage linking to all three PHP programs.
- **Program A – Session Management:** Name input, session start time, welcome page and logout duration calculation.
- **Program B – Date and Time:** Displays the current date, time and day using PHP.
- **Program C – Age Verification:** Accepts name and age and checks website access authorization.
- **Assets (`assets/css`):** Shared styling with a modern and responsive design.

## Technologies Used

- PHP 8+
- HTML5
- CSS3
- Git and GitHub
- Docker
- Render

## Run Locally

### Using XAMPP
1. Extract the project ZIP.
2. Copy the project folder into `C:\xampp\htdocs\`.
3. Start Apache from XAMPP Control Panel.
4. Open `http://localhost/PHP_LAB_DESIGNED/`.

### Using VS Code Terminal
1. Open the project folder in VS Code.
2. Select Terminal → New Terminal.
3. Run:

```powershell
& "C:\xampp\php\php.exe" -S localhost:8000
```

4. Keep the terminal running.
5. Open `http://localhost:8000/`.

## GitHub Repository

The complete project source code is maintained on GitHub.

Repository: https://github.com/pprakash29/WEB-PROGRAMMING-PHP_LAB

## Deployment – Render

This project is intended to be deployed on Render using Docker.

Deployment steps:
1. Push the complete project to GitHub.
2. Add a Dockerfile to the project root.
3. Sign in to Render.
4. Create a new Web Service.
5. Connect the GitHub repository.
6. Select Docker as the runtime environment.
7. Configure the Free instance and deploy.
8. Access the website using the public Render URL.

**Note:** A Dockerfile is required for deploying this PHP project on Render. GitHub Pages does not support PHP execution.

## Project Structure

```text
PHP_LAB_DESIGNED/
│
├── index.php
├── README.md
├── Dockerfile
│
├── Program_A/
│   ├── index.php
│   ├── hello.php
│   └── logout.php
│
├── Program_B/
│   └── index.php
│
├── Program_C/
│   ├── index.php
│   └── check.php
│
└── assets/
    └── css/
        ├── style.css
        └── program.css
```

---

**PHP LAB STUDIO | WEB PROGRAMMING**