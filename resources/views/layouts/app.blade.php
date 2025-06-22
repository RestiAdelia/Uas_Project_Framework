<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Login')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap');

        :root {
            --color-bg: #ffffff;
            --color-primary: #FFD93D;
            --color-secondary: #6BCB77;
            --color-text-primary: #111827;
            --color-text-secondary: #6b7280;
            --border-radius: 0.75rem;
            --shadow-light: 0 4px 12px rgba(0, 0, 0, 0.05);
            --max-width: 1200px;
            --transition-speed: 0.3s;
            --spacing-xl: 5rem;
            --spacing-lg: 3rem;
            --spacing-md: 2rem;
            --spacing-sm: 1rem;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-bg);
            color: var(--color-text-primary);
            line-height: 1.6;
            font-size: 18px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: var(--color-primary);
            padding: 1rem 0;
            box-shadow: var(--shadow-light);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        nav {
            max-width: var(--max-width);
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .nav-logo {
            font-weight: 800;
            font-size: 1rem;
            color: var(--color-bg);
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--color-bg);
        }

        .nav-links a {
            color: var(--color-bg);
            text-decoration: none;
        }

        .nav-links a:hover {
            color: var(--color-bg);
        }



        footer {
            text-align: center;
            padding: 0.5rem 0.5rem;
            font-size: 1rem;
            background: var(--color-primary);
            color: var(--color-text-primary);
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            box-shadow: var(--shadow-light);
            margin-top: auto;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="nav-logo">Pengaduan</div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; 2024 Pengaduan Masyarakat. All rights reserved.
    </footer>
</body>

</html>
