<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors dashboard - E-Health Mate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #f5f7fa;
        }

        /* Navbar Styles from Home Page */
        .nav-bar {
            position: fixed;
            top: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            padding: 15px 40px;
            background-color: white;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .nav-image {
            margin-right: auto;
            padding-left: 3%;
        }

        .nav-image img {
            width: 200px;
            height: auto;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            color: #333;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #00aaff;
        }

        .user-icon {
            width: 35px;
            height: 35px;
            background-color: #00aaff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            margin-left: 20px;
            cursor: pointer;
        }

        /* Main Content Styles */
        .main-container {
            margin-top: 100px;
            padding: 40px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h2 {
            color: #2c3e50;
            font-size: 24px;
        }

        /* Table Styles */
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #00aaff;
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        td {
            color: #555;
        }

        /* Action Buttons */
        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 20px;
            padding: 20px;
        }

        .action-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .accept-btn {
            background-color: #00aaff;
            color: white;
        }

        .cancel-btn {
            background-color: #ff4444;
            color: white;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        @media (max-width: 968px) {
            .nav-bar {
                padding: 10px 20px;
            }

            .nav-image img {
                width: 150px;
            }

            .nav-links {
                gap: 15px;
            }

            .main-container {
                padding: 20px;
            }

            .table-container {
                overflow-x: auto;
            }

            th, td {
                padding: 12px 15px;
            }
        }
        /* footer.css */
        .footer {
            background-color: #005580;
            color: white;
            padding: 60px 0 20px;
            margin-top: auto;
            width: 100%;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            padding: 0 20px;
        }
        
        .footer-section {
            margin-bottom: 30px;
        }
        
        .footer-section h3 {
            color: #ffffff;
            font-size: 20px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-section h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: #00aaff;
        }
        
        .footer-section p {
            line-height: 1.6;
            color: #e0e0e0;
        }
        
        .footer-section ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-section ul li {
            margin-bottom: 12px;
        }
        
        .footer-section ul li a {
            color: #e0e0e0;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-section ul li a:hover {
            color: #00aaff;
        }
        
        .contact-info li {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #e0e0e0;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .social-links a {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }
        
        .social-links a:hover {
            background-color: #00aaff;
        }
        
        .app-downloads {
            margin-top: 20px;
        }
        
        .store-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        .store-buttons img {
            height: 35px;
            width: auto;
        }
        
        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer-bottom p {
            color: #e0e0e0;
            font-size: 14px;
            margin: 5px 0;
        }
        
        @media (max-width: 968px) {
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }
        }
        
        @media (max-width: 576px) {
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .footer-section {
                text-align: center;
            }
            
            .footer-section h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .social-links {
                justify-content: center;
            }
            
            .store-buttons {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar from Home Page -->
    <div class="nav-bar">
        <div class="nav-image">
            <img src="https://i.ibb.co/MDjvdK5/Navbar-logo.png" alt="Navbar-logo">
        </div>
        <div class="nav-links">
            <a href="Home Page.html">Home</a>
            <a href="#">Contact Us</a>
            <a href="#">About Us</a>
            <div class="user-icon">&#128100;</div>
        </div>
    </div>

    <div class="main-container">
        <div class="page-header">
            <h2>Patient Requests</h2>
        </div>

        <div class="table-container">
        <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Address</th>
            <th>Reason</th>
            <th>Actions</th> <!-- New column for actions -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Include the fetch_patient_request.php file to get the user data
        $users = include 'backend/fetch_patient_request.php';

        if (!empty($users)) {
            foreach ($users as $user) {
                echo "<tr>
                        <td>{$user['id']}</td>
                        <td>{$user['name']}</td>
                        <td>{$user['phone']}</td>
                        <td>{$user['email']}</td>
                        <td>{$user['address']}</td>
                        <td>{$user['reason']}</td>
                        <td>
                            <button class='action-btn accept-btn' data-id='{$user['id']}'>Accept</button>
                            <button class='action-btn cancel-btn' data-id='{$user['id']}'>Cancel</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        ?>
    </tbody>
</table>

                
            </table>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About E-Health Mate</h3>
                <p>E-Health Mate is your trusted healthcare companion, providing 24/7 access to medical professionals, online consultations, and personalized health advice. Our platform connects patients with qualified doctors for reliable healthcare solutions.</p>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Find a Doctor</a></li>
                    <li><a href="#">Book Appointment</a></li>
                    <li><a href="#">Health Blog</a></li>
                    <li><a href="#">Emergency Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Us</h3>
                <ul class="contact-info">
                    <li><i class="fas fa-phone"></i> +1 (234) 567-8900</li>
                    <li><i class="fas fa-envelope"></i> support@ehealthmate.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> 123 Healthcare Avenue, Medical District, NY 10001</li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Connect With Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="app-downloads">
                    <p>Download Our App</p>
                    <div class="store-buttons">
                        <a href="#"><img src="app-store.png" alt="App Store"></a>
                        <a href="#"><img src="play-store.svg" alt="Play Store"></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 E-Health Mate. All rights reserved.</p>
            <p>Terms of Service | Privacy Policy | Cookie Policy</p>
        </div>
    </footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listeners to all accept buttons
        document.querySelectorAll('.accept-btn').forEach(button => {
            button.addEventListener('click', function() {
                const patientId = this.getAttribute('data-id');
                // Navigate to Doctor Call.html with the patient ID as a query parameter
                window.location.href = `Calling.html?id=${patientId}`;
            });
        });

        // Add event listeners to all cancel buttons
        document.querySelectorAll('.cancel-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                if (confirm('Are you sure you want to cancel this request?')) {
                    fetch('backend/delete_patient_request.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ id }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const row = document.getElementById(`row-${id}`);
                                if (row) {
                                    alert('Request deleted successfully.');
                                    row.remove(); // Only remove if the element exists
                                    
                                }
                            } else {
                                alert('Failed to delete the request.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred.');
                        });
                }
            });
        });
    });
</script>

</body>
</html>
