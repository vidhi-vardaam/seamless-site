<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Internal:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: 220 90% 56%;
            --muted: 210 40% 96.1%;
            --foreground: 222.2 84% 4.9%;
            --font-sans: 'Inter', system-ui, -apple-system, sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-sans);
            background-color: hsl(var(--muted));
            color: hsl(var(--foreground));
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .error-container {
            padding: 2rem;
            animation: fadeIn 0.6s ease-out;
        }

        .error-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1;
            color: hsl(var(--foreground));
        }

        .error-message {
            font-size: 1.1rem;
            color: hsl(var(--foreground) / 0.6);
            margin-bottom: 1rem;
        }

        .error-link {
            display: inline-flex;
            font-size: 1rem;
            color: hsl(221, 83%, 53%);
            /* Explicit blue to match reference */
            text-decoration: underline;
            transition: opacity 0.2s;
        }

        .error-link:hover {
            opacity: 0.8;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1 class="error-title">404</h1>
        <p class="error-message">Oops! Page not found</p>
        <a href="/" class="error-link">Return to Home</a>
    </div>
</body>

</html>