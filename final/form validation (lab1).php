<?php
$name = $id = $email = $password = $dob = $bg = $gender = $text_address = "";
$checkboxes = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
        $errors[] = "Name is required";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    
    if (empty($_POST["id"])) {
        $errors[] = "ID is required";
    } else {
        $id = $_POST["id"];
    }

    
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $errors[] = "Password is required";
    } else {
        $password = $_POST["password"];
    }
    $dob = $_POST["dob"];

    
    $bg = $_POST["bg"];

    
    if (empty($_POST["gender"])) {
        $errors[] = "Gender is required";
    } else {
        $gender = $_POST["gender"];
    }

    
    if (!empty($_POST["checkbox"])) {
        $checkboxes = $_POST["checkbox"];
    }

    
    $text_address = $_POST["text_address"];

    
    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"];
        
    }

    if (empty($errors)) {
        echo "<h3>Form submitted successfully!</h3>";
        
    }
}
?>
<html>
<head>
    <title>HTML Form with PHP</title>
</head>
<body>
    <h1>HTML Form</h1>

    <?php
    if (!empty($errors)) {
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" value="<?= htmlspecialchars($name) ?>" /></td>
                </tr>
                <tr>
                    <td>ID:</td>
                    <td><input type="number" name="id" value="<?= htmlspecialchars($id) ?>" /></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" value="<?= htmlspecialchars($email) ?>" /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" /></td>
                </tr>
                <tr>
                    <td>DOB:</td>
                    <td><input type="date" name="dob" value="<?= htmlspecialchars($dob) ?>" /></td>
                </tr>
                <tr>
                    <td>BG:</td>
                    <td>
                        <select name="bg">
                            <option value="A+" <?= $bg == "A+" ? "selected" : "" ?>>A+</option>
                            <option value="B+" <?= $bg == "B+" ? "selected" : "" ?>>B+</option>
                            <option value="AB+" <?= $bg == "AB+" ? "selected" : "" ?>>AB+</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="Male" <?= $gender == "Male" ? "checked" : "" ?> /> Male 
                        <input type="radio" name="gender" value="Female" <?= $gender == "Female" ? "checked" : "" ?> /> Female 
                        <input type="radio" name="gender" value="Other" <?= $gender == "Other" ? "checked" : "" ?> /> Other 
                    </td>
                </tr>
                <tr>
                    <td>Address Options:</td>
                    <td>
                        <input type="checkbox" name="checkbox[]" value="Opt-1" <?= in_array("Opt-1", $checkboxes) ? "checked" : "" ?>> Opt-1
                        <input type="checkbox" name="checkbox[]" value="Opt-2" <?= in_array("Opt-2", $checkboxes) ? "checked" : "" ?>> Opt-2
                        <input type="checkbox" name="checkbox[]" value="Opt-3" <?= in_array("Opt-3", $checkboxes) ? "checked" : "" ?>> Opt-3
                    </td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea name="text_address"><?= htmlspecialchars($text_address) ?></textarea></td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td><input type="file" name="image" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Submit" />
                        <input type="reset" value="Reset" />
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
