<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <button id="sign-out-button">Sign Out</button>
        </div>
    </header>
    <div class="container">
        <div class="user-controls">
            <input type="text" class="search-bar" placeholder="Search...">
            <select class="rows-per-page" name="rows-per-page">
                <option value="5">5 Rows</option>
                <option value="10">10 Rows</option>
                <option value="20">20 Rows</option>
            </select>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Registration_ID</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Email</th>
                    
                </tr>
            </thead>
            <tbody>
                <!-- User data will be dynamically populated here -->
                <?php 
                    include 'dbconn.php';
                    $sql = "SELECT * FROM user";
                    $result = $con->query($sql);
                        
                    if(!$result){
                        die("Invalid query: " . $con->error);
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[regno]</td>
                            <td>$row[username]</td>
                            <td>$row[usertype]</td>
                            <td>$row[email]</td>
                        </tr>
                       ";
                    }
                   ?>
            </tbody>
            </tbody>
        </table>
       
    </div>
    <div class="container-button">
        <button class="overthrow-user-button" onclick="overthrowUser()">Overthrow Previous User</button>
        <!-- <button class="add-user-button" onclick="showPopup()">Add User</button> -->
        <a href="create.php" style="background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 50px;
    cursor: pointer;
    margin-left: 50px;
    border-radius: 25px;
    text-decoration: none;">add user</a>
       
    </div>
    <script>
        // function showPopup() {
        //     document.getElementById("user-dialog").style.display = "flex";
        // }

        function closeDialog() {
            document.getElementById("user-dialog").style.display = "none";
        }

        function saveUser() {
            const Registration_ID = document.getElementById("Registration_ID").value;
            const username = document.getElementById("new-username").value;
            const userType = document.getElementById("new-user-type").value;
            const password = document.getElementById("new-password").value;
            const confirmPassword = document.getElementById("new-confirm-password").value;

            // alert(`User Data:
            //       Registration_ID: ${Registration_ID}
            //       Username: ${username}
            //       User Type: ${userType}
            //       Password: ${password}
            //       Confirm Password: ${confirmPassword}`);

            // Close the dialog after saving the user data
            closeDialog();
        }

        // function overthrowUser() {
           
        //     alert("Overthrowing the present user.");
        // }
        // function addUserToTable(Registration_ID,username, userType) {
        //     const tableBody = document.querySelector("tbody");
        //     const newRow = document.createElement("tr");
        //     newRow.innerHTML = `
        //         <td>${Registration_ID}</td>
        //         <td>${username}</td>
        //         <td>${userType}</td>
        //         <td><button onclick="editUser(this)">Edit</button></td>
        //     `;

        //     tableBody.appendChild(newRow); 
        //  }
        //  document.addEventListener("DOMContentLoaded", function () {
        //     // Add some demo users to the table
        //     addUserToTable("RA2211032010001","John Doe", "Student");
        //     addUserToTable("RA2211032010002","Alice Smith", "Admin");
        //     addUserToTable("RA2211032010003","Bob Johnson", "Read only");
        //     addUserToTable("RA2211032010004","Eve Brown", "Write Only");
        // });
    </script>
</body>
</html>
