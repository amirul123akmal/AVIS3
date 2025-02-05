<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joined Activity</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f4f6f7; /* Light gray background for elegance */
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        .header {
            background-color: #ffffff;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            display: flex;
            align-items: center;
        }

        .header .logo img {
            width: 35px;
            margin-right: 10px;
        }

        .header .user {
            display: flex;
            align-items: center;
            font-size: 16px;
        }

        .header .user img {
            width: 40px;
            margin-left: 10px;
            border-radius: 50%;
            border: 2px solid #1f6d84; /* Match the theme color */
        }

        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            font-size: 28px;
            text-align: center;
            color: #1f6d84; /* Primary theme color */
            margin-bottom: 30px;
            font-weight: 700;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            margin-bottom: 30px;
        }

        .search-bar input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #cce7eb;
            border-radius: 10px 0 0 10px;
            outline: none;
            font-size: 16px;
        }

        .search-bar button {
            padding: 12px 20px;
            border: none;
            background-color: #1f6d84;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #14505e;
        }

        /* Activity Sections */
        .activity-section {
            margin-bottom: 40px;
            border-radius: 12px;
            background-color: rgba(31, 109, 132, 0.2); /* Transparent green */
            padding: 20px 25px;
        }

        .activity-section h3 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #1f6d84;
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .table th {
            background-color: #e8f5f7; /* Subtle greenish header */
            color: #1f6d84;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .table td {
            font-size: 16px;
            color: #333;
        }

        .cancel-btn {
            background-color: #d32f2f; /* Red */
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .cancel-btn:hover {
            background-color: #b71c1c; /* Darker red */
        }

        .see-more {
            text-align: center;
            color: #1f6d84;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .see-more:hover {
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 20px;
        }

        .footer span {
            color: #1f6d84;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <!--<div class="header">
        <div class="logo">
            <img src="logo.png" alt="Logo"> Amal Valley Organization
        </div>
        <div class="user">
            Erin <img src="user-icon.png" alt="User Icon">
        </div>
    </div>-->
    <x-ben-sidebar>
        <x-ben-navbar />
    <!-- Main Content -->
    <div class="container">
        <h2>Joined Activity</h2>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" placeholder="Search Activity">
            <button>Search</button>
        </div>

        <!-- Join Activity Section -->
        <div class="activity-section">
            <h3>Join Activity</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Flood Relief Distribution</td>
                        <td>28/01/2025</td>
                        <td><button class="cancel-btn">Cancel</button></td>
                    </tr>
                    <tr>
                        <td>Eid Adha Food Donation</td>
                        <td>31/05/2025</td>
                        <td><button class="cancel-btn">Cancel</button></td>
                    </tr>
                    <tr>
                        <td>Back to School Distribution</td>
                        <td>05/05/2025</td>
                        <td><button class="cancel-btn">Cancel</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Previous Activity Section -->
        <div class="activity-section">
            <h3>Previous Activity</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Funeral Kit Donation</td>
                        <td>04/06/2024</td>
                    </tr>
                    <tr>
                        <td>Bubur Donation</td>
                        <td>22/02/2024</td>
                    </tr>
                    <tr>
                        <td>Medical Kit Distribution</td>
                        <td>11/12/2024</td>
                    </tr>
                </tbody>
            </table>
            <p class="see-more">See More</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>If you have any inquiries, call us at <span>018-4040483</span>.</p>
    </div>
    </x-ben-sidebar>
</body>
</html>
