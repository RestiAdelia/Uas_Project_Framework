<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Submission Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<style>
  /* Reset and base */
  *, *::before, *::after {
    box-sizing: border-box;
  }
  body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: #f9fafb;
    color: #111827;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  /* Layout: Navbar, Sidebar, Content */
  .navbar {
    position: sticky;
    top: 0;
    height: 56px;
    background: linear-gradient(135deg, #10b981, #047857);
    color: #ffffff;
    display: flex;
    align-items: center;
    padding: 0 24px;
    z-index: 1000;
    box-shadow: 0 2px 4px rgb(0 0 0 / 0.1);
  }
  .navbar .logo {
    font-weight: 700;
    font-size: 1.25rem;
    letter-spacing: 0.05em;
    user-select: none;
  }
  .navbar .spacer {
    flex-grow: 1;
  }
  .navbar .profile {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    position: relative;
  }
  .navbar .profile img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 2px solid #34d399;
  }
  .navbar .profile span {
    font-weight: 600;
    font-size: 0.875rem;
    white-space: nowrap;
  }
  .navbar .profile .material-icons {
    font-size: 20px;
    user-select: none;
  }

  /* Main Layout flex container */
  .dashboard {
    display: flex;
    flex-grow: 1;
    min-height: calc(100vh - 56px);
    overflow: hidden;
  }

  /* Sidebar */
  .sidebar {
    width: 280px;
    background: #e6fffa;
    border-right: 1px solid #d1fae5;
    display: flex;
    flex-direction: column;
    padding-top: 24px;
  }
  .sidebar nav {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    gap: 12px;
    padding: 0 16px 24px;
  }
  .sidebar nav a {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 12px 16px;
    color: #065f46;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 12px;
    text-decoration: none;
    transition: background-color 0.25s ease, box-shadow 0.25s ease;
  }
  .sidebar nav a:hover,
  .sidebar nav a.active {
    background: linear-gradient(135deg, #10b981, #047857);
    color: #ffffff;
    box-shadow: 0 8px 20px rgb(16 185 129 / 0.35);
  }
  .sidebar nav a .material-icons {
    font-size: 24px;
    flex-shrink: 0;
  }

  /* Main content */
  main.content {
    flex-grow: 1;
    padding: 32px 48px;
    overflow-y: auto;
  }
  main.content h1 {
    font-size: 2rem;
    font-weight: 900;
    margin-bottom: 16px;
    color: #065f46;
  }
  main.content p {
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 40px;
    color: #4b5563;
  }

  /* Table of submissions */
  table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 12px;
  }
  thead th {
    text-align: left;
    font-weight: 700;
    font-size: 0.875rem;
    padding: 12px 24px;
    background: #ecfdf5;
    color: #065f46;
    border-radius: 12px 12px 0 0;
  }
  tbody tr {
    background: #ffffff;
    box-shadow: 0 4px 10px rgb(0 0 0 / 0.05);
    border-radius: 12px;
    transition: transform 0.3s ease;
  }
  tbody tr:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgb(0 0 0 / 0.1);
  }
  tbody td {
    padding: 16px 24px;
    vertical-align: middle;
    color: #374151;
  }
  tbody td.status {
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.875rem;
  }

  /* Status color variants */
  .status-pending {
    color: #d97706; /* amber-600 */
  }
  .status-approved {
    color: #059669; /* green-600 */
  }
  .status-rejected {
    color: #dc2626; /* red-600 */
  }

  /* Action buttons */
  .action-btn {
    background: #10b981;
    border: none;
    color: white;
    padding: 8px 16px;
    font-weight: 600;
    border-radius: 12px;
    cursor: pointer;
    transition: background 0.3s ease;
    font-size: 0.875rem;
    user-select: none;
  }
  .action-btn:hover {
    background: #047857;
  }
  .action-btn.reject {
    background: #dc2626;
  }
  .action-btn.reject:hover {
    background: #991b1b;
  }

  /* Responsive adjustments */
  @media (max-width: 1024px) {
    .sidebar {
      width: 220px;
    }
    main.content {
      padding: 24px 32px;
    }
    .navbar {
      padding: 0 16px;
    }
  }
  @media (max-width: 768px) {
    .dashboard {
      flex-direction: column;
    }
    .sidebar {
      width: 100%;
      height: auto;
      border-right: none;
      border-bottom: 1px solid #d1fae5;
      padding: 12px 0;
    }
    .sidebar nav {
      flex-direction: row;
      overflow-x: auto;
      padding: 0 12px;
      gap: 8px;
    }
    .sidebar nav a {
      white-space: nowrap;
      padding: 8px 12px;
      font-size: 0.875rem;
      border-radius: 8px;
    }
    main.content {
      padding: 24px 16px;
    }
  }

  /* Scrollbar for content */
  main.content::-webkit-scrollbar {
    width: 8px;
  }
  main.content::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 8px;
  }
  main.content::-webkit-scrollbar-thumb {
    background: #10b981;
    border-radius: 8px;
  }
</style>
</head>
<body>
  <header class="navbar" role="banner">
    <div class="logo" aria-label="Admin Dashboard Logo">Pengajuan Admin</div>
    <div class="spacer"></div>
    <div class="profile" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-label="User profile menu">
      <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/6d0a5947-f6b4-40c4-998e-1b99e1b42606.png" alt="Admin profile avatar" />
      <span>Admin</span>
      <span class="material-icons" aria-hidden="true">expand_more</span>
    </div>
  </header>
  <div class="dashboard">
    <aside class="sidebar" role="navigation" aria-label="Sidebar navigation">
      <nav>
        <a href="#" class="active" aria-current="page"><span class="material-icons" aria-hidden="true">dashboard</span> Dashboard</a>
        <a href="#"><span class="material-icons" aria-hidden="true">assignment</span> Pengajuan</a>
        <a href="#"><span class="material-icons" aria-hidden="true">people</span> Pengguna</a>
        <a href="#"><span class="material-icons" aria-hidden="true">settings</span> Pengaturan</a>
      </nav>
    </aside>
    <main class="content" role="main" tabindex="-1">
      <h1>Daftar Pengajuan</h1>
      <p>Kelola semua pengajuan yang masuk melalui sistem ini.</p>
      <table aria-label="List of submissions">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Pengaju</th>
            <th scope="col">Tanggal Pengajuan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>PGJ001</td>
            <td>Andi Prasetyo</td>
            <td>2024-06-10</td>
            <td class="status status-pending">Pending</td>
            <td>
              <button class="action-btn">Setujui</button>
              <button class="action-btn reject">Tolak</button>
            </td>
          </tr>
          <tr>
            <td>PGJ002</td>
            <td>Sari Dewi</td>
            <td>2024-06-12</td>
            <td class="status status-approved">Disetujui</td>
            <td>
              <button class="action-btn" disabled>Setujui</button>
              <button class="action-btn reject" disabled>Tolak</button>
            </td>
          </tr>
          <tr>
            <td>PGJ003</td>
            <td>Budi Santoso</td>
            <td>2024-06-13</td>
            <td class="status status-rejected">Ditolak</td>
            <td>
              <button class="action-btn" disabled>Setujui</button>
              <button class="action-btn reject" disabled>Tolak</button>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>

