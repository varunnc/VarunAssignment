<!DOCTYPE html>
<html>

<head>
    <title>Form Validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            height: 35px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .user-operation-form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <h1>Form Validation</h1>
    <form id="myForm" action="process_form.php" method="post" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required pattern="[0-9]{10}"><br><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="state">State:</label>
        <select id="state" name="state" onchange="populateCities()">
            <option value="">Select State</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Gujarat">Gujarat</option>
        </select><br><br>

        <label for="city">City:</label>
        <select id="city" name="city" required>
            <option value="">Select City</option>
        </select><br><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br><br>

        <label for="pincode">Pin Code:</label>
        <input type="text" id="pincode" name="pincode" required pattern="[0-9]{6}"><br><br>

        <input type="submit" value="Submit">
    </form>

    <form id="updateUserForm" class="user-operation-form" action="process_form.php" method="post" >
        <h2>Update User</h2>
        <label for="updateUserName">Name:</label>
        <input type="text" id="updateUserName" name="updateUserName" required>
        <label for="phone">New Phone Number:</label>
        <input type="text" id="phone" name="phone" required pattern="[0-9]{10}"><br><br>
        <input type="submit" value="Update User">
    </form>

    <form id="deleteUserForm" class="user-operation-form" action="process_form.php" method="post" >
        <h2>Delete User</h2>
        <label for="deleteUserName">Name:</label>
        <input type="text" id="deleteUserName" name="deleteUserName" required>
        <input type="submit" value="Delete User">
    </form>

    <script>
        const citiesByState = {
            "Maharashtra": [
                "Mumbai", "Pune", "Nagpur", "Nashik", "Aurangabad",
                "Solapur", "Amravati", "Kolhapur", "Sangli", "Satara"
            ],
            "Karnataka": [
                "Bangalore", "Mysore", "Hubli", "Belgaum", "Mangalore",
                "Gulbarga", "Davanagere", "Shimoga", "Bellary", "Tumkur"
            ],
            "Gujarat": [
                "Ahmedabad", "Surat", "Vadodara", "Rajkot", "Bhavnagar",
                "Jamnagar", "Junagadh", "Gandhinagar", "Anand", "Bharuch"
            ]
        };

        function populateCities() {
            const stateSelect = document.getElementById("state");
            const citySelect = document.getElementById("city");
            const selectedState = stateSelect.value;

            citySelect.innerHTML = "<option value=''>Select City</option>";

            if (selectedState in citiesByState) {
                const cities = citiesByState[selectedState];
                cities.forEach(city => {
                    const option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            }
        }

        function validateForm() {
            const name = document.getElementById("name").value;
            const phone = document.getElementById("phone").value;
            const email = document.getElementById("email").value;
            const state = document.getElementById("state").value;
            const city = document.getElementById("city").value;
            const country = document.getElementById("country").value;
            const pincode = document.getElementById("pincode").value;

            if (!name || !phone || !email || !state || !city || !country || !pincode) {
                alert("All fields are mandatory!");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>