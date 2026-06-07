<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: index.php');
    exit;
}

$vendors = [
    ['name' => 'Micheal', 'photo' => 'https://i.pravatar.cc/60?img=12'],
    ['name' => 'John', 'photo' => 'https://i.pravatar.cc/60?img=33'],
    ['name' => 'Chris brown', 'photo' => 'https://i.pravatar.cc/60?img=15'],
    ['name' => 'Anthony', 'photo' => 'https://i.pravatar.cc/60?img=53'],
];

$orders = [
    ['no' => '#56734', 'customer' => 'Micheal clark', 'vendor' => 'John Doe', 'status' => 'Completed'],
    ['no' => '#76646', 'customer' => 'Tony', 'vendor' => 'James', 'status' => 'Dispatched'],
    ['no' => '#345645', 'customer' => 'Steve', 'vendor' => 'Remy', 'status' => 'In progress'],
    ['no' => '#87567', 'customer' => 'Micheal clark', 'vendor' => 'Richard', 'status' => 'Completed'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Emergency Dispatch Systems - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body class="dashboard-page">
    <main class="dashboard-shell">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <div class="logo-box"><i class="bi bi-caret-left-fill"></i></div>
                <div>
                    <strong>EMERGENCY</strong>
                    <span>DISPATCH SYSTEMS</span>
                </div>
            </div>

            <nav class="sidebar-nav">
                <a class="active" href="#"><i class="bi bi-grid-1x2"></i>Dashboard</a>
                <a href="#"><i class="bi bi-geo-alt"></i>Vendors</a>
                <a href="#"><i class="bi bi-person"></i>Agents</a>
                <a href="#"><i class="bi bi-wallet2"></i>Revenue</a>
                <a href="#"><i class="bi bi-gear"></i>Settings</a>
            </nav>
        </aside>

        <section class="dashboard-main">
            <header class="topbar">
                <button class="icon-btn" type="button" aria-label="Menu"><i class="bi bi-list"></i></button>
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search here..." aria-label="Search">
                </div>
                <div class="topbar-user">
                    <button class="icon-btn" type="button" aria-label="Notifications"><i class="bi bi-bell"></i></button>
                    <img src="https://i.pravatar.cc/80?img=11" alt="John Doe">
                    <span>John Doe</span>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
            </header>

            <div class="content-area">
                <h1 class="dashboard-title">Dashboard</h1>

                <div class="summary-grid">
                    <div class="summary-card red">
                        <span>No. of vendors</span>
                        <strong>56</strong>
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="summary-card blue">
                        <span>No. of Agents</span>
                        <strong>47</strong>
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="summary-card pink">
                        <span>Invoice</span>
                        <strong>87</strong>
                        <i class="bi bi-receipt"></i>
                    </div>
                    <div class="summary-card purple">
                        <span>Ongoing orders</span>
                        <strong>1,145</strong>
                        <i class="bi bi-card-checklist"></i>
                    </div>
                </div>

                <div class="list-grid">
                    <section class="list-panel vendor-panel">
                        <div class="panel-heading">
                            <h2>Vendor list</h2>
                            <button type="button">View all</button>
                        </div>
                        <?php foreach ($vendors as $vendor): ?>
                            <div class="person-row">
                                <img src="<?php echo htmlspecialchars($vendor['photo']); ?>" alt="">
                                <span><?php echo htmlspecialchars($vendor['name']); ?></span>
                                <small><i class="bi bi-geo-alt-fill"></i>10 Alaska Street, 99536 US</small>
                                <time>APR 20</time>
                            </div>
                        <?php endforeach; ?>
                    </section>

                    <section class="list-panel agent-panel">
                        <div class="panel-heading">
                            <h2>Agents list</h2>
                            <button type="button">View all</button>
                        </div>
                        <?php foreach ($vendors as $agent): ?>
                            <div class="person-row">
                                <img src="<?php echo htmlspecialchars($agent['photo']); ?>" alt="">
                                <span><?php echo htmlspecialchars($agent['name']); ?></span>
                                <small><i class="bi bi-geo-alt-fill"></i>10 Alaska Street, 99536 US</small>
                                <time>APR 20</time>
                            </div>
                        <?php endforeach; ?>
                    </section>
                </div>

                <section class="orders-section">
                    <div class="panel-heading">
                        <h2>Order List</h2>
                        <button type="button">View all</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table order-table align-middle">
                            <thead>
                                <tr>
                                    <th>Order no.</th>
                                    <th>Customer Name</th>
                                    <th>Vendor Name</th>
                                    <th>Vehicle Details</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($order['no']); ?></td>
                                        <td><?php echo htmlspecialchars($order['customer']); ?></td>
                                        <td><?php echo htmlspecialchars($order['vendor']); ?></td>
                                        <td>2HG or 3HG, 50 CC to 69 CC<br>WMI, Lorem Ipsum</td>
                                        <td><span class="status <?php echo strtolower(str_replace(' ', '-', $order['status'])); ?>"><?php echo htmlspecialchars($order['status']); ?></span></td>
                                        <td><button class="eye-btn" type="button" aria-label="View order"><i class="bi bi-eye-fill"></i></button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </section>
    </main>

    <script src="assets/js/app.js"></script>
</body>
</html>
