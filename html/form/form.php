<?php

session_start();

/*
 * todo
 * create a success page
 */

$firstName = $lastName = $email = $phoneNumber = $mailAddress = $streetTwo = $city = $state = $zip = $amount = $leg = $grantName = $taxId = $contact = $phone = $relative = $description = $files = "";
$error = False;
// define variables and set to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (preg_match('/^[a-zA-Z ]{2,30}\s?$/', $_POST["firstName"])) {
        $firstName = test_input($_POST["firstName"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for first name" . "<br>";
        $error = True;
    }
    if (preg_match('/^[a-zA-Z ]{2,30}\s?$/', $_POST["lastName"])) {
        $lastName = test_input($_POST["lastName"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for last name" . "<br>";
        $error = True;
    }
    if (preg_match('/[a-zA-Z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,3}\s?$/', $_POST["email"])) {
        $email = test_input($_POST["email"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for email" . "<br>";
        $error = True;
    }
    if (preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})\s?$/', $_POST["phoneNumber"])) {
        $phoneNumber = test_input($_POST["phoneNumber"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for phone number" . "<br>";
        $error = True;
    }
    if (preg_match('/^(\d{1,})\s?(\w{0,5})\s([a-zA-Z]{2,30})\s([a-zA-Z]{2,15})\.?\s?(\w{0,5})\s?$/', $_POST["mailAddress"])) {
        $mailAddress = test_input($_POST["mailAddress"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for street address" . "<br>";
        $error = True;
    }
    if (preg_match('/[a-zA-Z]?\s?([0-9]{10})?$/', $_POST["streetTwo"])) {
        $streetTwo = test_input($_POST["streetTwo"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for street address optional" . "<br>";
        $error = True;
    }
    if (preg_match('/^[a-zA-Z ]{2,40}$/', $_POST["city"])) {
        $city = test_input($_POST["city"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for city" . "<br>";
        $error = True;
    }
    if (preg_match('/(?:Alabama|Alaska|Arizona|Arkansas|California|Colorado|Connecticut|Delaware|Florida|Georgia|Hawaii|Idaho|Illinois|Indiana|Iowa|Kansas|Kentucky|Louisiana|Maine|Maryland|Massachusetts|Michigan|Minnesota|Mississippi|Missouri|Montana|Nebraska|Nevada|New[ ]Hampshire|New[ ]Jersey|New[ ]Mexico|New[ ]York|North[ ]Carolina|North[ ]Dakota|Ohio|Oklahoma|Oregon|Pennsylvania|Rhode[ ]Island|South[ ]Carolina|South[ ]Dakota|Tennessee|Texas|Utah|Vermont|Virginia|Washington|West[ ]Virginia|Wisconsin|Wyoming|AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WV|WI|WY)\s?$/', $_POST["state"])) {
        $state = test_input($_POST["state"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for state" . "<br>";
        $error = True;
    }
    if (preg_match('/^\d{5}(-\d{4})?\s?$/', $_POST["zip"])) {
        $zip = test_input($_POST["zip"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for zip" . "<br>";
        $error = True;
    }
    if (preg_match('/(?=.*?\d)^\$?(([1-9]\d{0,2}(,\d{3})*)|\d+)?(\.\d{1,2})?$/', $_POST["amount"])) {
        $amount = test_input($_POST["amount"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for amount" . "<br>";
        $error = True;
    }
    if (!empty($_POST['leg'])) {
        foreach ($_POST['leg'] as $selected) {
            $selected = test_input($selected);
            $leg = $leg . "-" . $selected;
        }
    }
    if (preg_match('/^[a-zA-Z ]{2,30}\s?$/', $_POST["organization"])) {
        $organization = test_input($_POST["organization"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for organization name(grant name)" . "<br>";
        $error = True;
    }
    if (preg_match('/^\(?([0-9]{2})\)?[-. ]?([0-9]{7})\s?$/', $_POST["taxId"])) {
        $taxId = test_input($_POST["taxId"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for tax id" . "<br>";
        $error = True;
    }
    if (preg_match('/^[a-zA-Z ]{2,30}\s?$/', $_POST["contact"])) {
        $contact = test_input($_POST["contact"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for contact name" . "<br>";
        $error = True;
    }
    if (preg_match('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})\s?$/', $_POST["phone"])) {
        $phone = test_input($_POST["phone"]);
    } else {
        $_SESSION['error'] = $_SESSION['error'] . "Please follow the rules for contact phone" . "<br>";
        $error = True;
    }
    $relative = test_input($_POST["relative"]);
    $description = test_input($_POST["description"]);
}
if ($error === TRUE) {
    header("location: index.php");
    echo $_SESSION['error'];
    die("Error in Posted data");
}

////Testing REMOVE BEFORE FINISHED
//var_dump($firstName);
//echo "<br>";
//var_dump($lastName);
//echo "<br>";
//var_dump($email);
//echo "<br>";
//var_dump($phoneNumber);
//echo "<br>";
//var_dump($mailAddress);
//echo "<br>";
//var_dump($streetTwo);
//echo "<br>";
//var_dump($city);
//echo "<br>";
//var_dump($state);
//echo "<br>";
//var_dump($zip);
//echo "<br>";
//var_dump($amount);
//echo "<br>";
//var_dump($leg);
//echo "<br>";
//var_dump($organization);
//echo "<br>";
//var_dump($taxId);
//echo "<br>";
//var_dump($contact);
//echo "<br>";
//var_dump($phone);
//echo "<br>";
//var_dump($relative);
//echo "<br>";
//var_dump($description);
//echo "<br>";
//var_dump($files);
//echo "<br>";

//set relative status
/*
 * I have to set tehe status based on if there is anything put in to 
 * $relative if it is null or empty then status will be False.
 * If $relative has any value it will True.
 */
if ($relative !== '') {
    $relativeStatus = TRUE;
} else {
    $relativeStatus = FALSE;
}

//Set year and current date
$year = date("Y");
$date = date('Y-m-d H:i:s');

$servername = "localhost";
$username = "admin";
$password = "Pizza";
$dbname = "CCCDC";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//make id right id
$sqlYear = "SELECT * FROM Applications WHERE year = $year";
$result = mysqli_query($conn, $sqlYear);
$num = mysqli_num_rows($result);
echo $num;
$yearId = substr($year, -2);
$numId = $num + 1;
$id = $yearId . "-" . $numId;
// Desired folder structure
$structure = "/home/admin/cccdcfiles/$year/$id/";

// To create the nested structure, the $recursive parameter 
// to mkdir() must be specified.
mkdir($structure, 0777, true);
$path = $structure;

$sql = "INSERT INTO Applications (id, organization, first_name, last_name, amount_requested, status, date_requested, 
    year, legislator, file_path, email, phone_number, mail_address, street_two, city, state, zip_code, tax_id,
    contact_person, contact_phone, relative_info, relative_status, description)
 VALUES ('$id', '$organization', '$firstName', '$lastName', '$amount', 'new', '$date', 
    '$year', '$leg', '$path', '$email', '$phoneNumber', '$mailAddress', '$streetTwo', '$city', '$state', '$zip', '$taxId',
    '$contact', '$phone', '$relative', '$relativeStatus', '$description')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully" . "<br>";


    if (isset($_FILES['files'])) {
        $file_name = $_FILES['files']['name'];
        $file_size = $_FILES['files']['size'];
        $file_tmp = $_FILES['files']['tmp_name'];
        $file_type = $_FILES['files']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['files']['name'])));
        $errors = FALSE;

        $expensions = array("txt", "docx", "doc", "pdf", "jpg", "png", "zip", "pages");

        if (in_array($file_ext, $expensions) === false) {
            $_SESSION['error'] = $_SESSION['error'] . "<br>" . "extension not allowed, please choose one of the following: txt, docx, doc, pdf, jpg, png, zip, pages.";
            $errors = TRUE;
        }

        if ($file_size > 2097152) {
            $_SESSION['error'] = $_SESSION['error'] . "<br>" . 'File size must be under 2 MB';
            $errors = TRUE;
        }

        if ($errors === FALSE) {
            echo $path . $file_name . "<br>";
            move_uploaded_file($file_tmp, $path . $file_name);
            header("location: success.html");
        } else {
            header("location: index.php");
            die("File attachment error! Check session error");
        }
    }
} else {
    $_SESSION['error'] = $_SESSION['error'] . "<br>" . "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("location: index.php");
    die("SQL ERROR! Check Session Error");
}

mysqli_close($conn);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strtolower($data);
    return $data;
}

?>