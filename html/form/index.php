<?php session_start();
$error = $_session["error"];
$_session["error"] = "";

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

$sql = "SELECT name FROM Legislators";
$result = mysqli_query($conn, $sql);


echo <<<HTMLTOP
<html lang="en" >
<body>

  <head>
  <meta charset="UTF-8">
  <title>Application Form</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="container">
    <form action="form.php" method="post" enctype="multipart/form-data">
      <h3>Colbert County Community Development Commission Grant Application</h3>
      <h5>Each recipient must be a governmental entity or agency thereof, or a public organization receiving public funds, or a tax-exempt entity for federal or state income tax purposes.</h5>
      <div class="i">Although members of the Legislature may make a recommendation regarding funding, the Colbert County Community Development Commission has absolute discretion to award or reject any grant.</div>
      <h4>THIS FORM MUST BE COMPLETED IN ITS ENTIRETY AND MUST BE ACCOMPANIED BY THE FOLLOWING:</h4>
      <div class="ol">
        <li>A W-9 Form, completed and signed by the agency to which the grant check is to be written.</li>
        <li>Purpose Statement including itemized price list, quote, or estimate of project funds being requested.</li>
      </div>
      <br>
      <div class="validMess">
        <h9>Your information can only be submitted if every box is shaded green.</h9>
      </div>
      <br>
      <div class="invalidMess">
		<h9>If your information is shaded red, it cannot be submitted.</h9>
      </div>
	  
	  <p id= "Err" >$error</p>
	  
      <div class="row">
        <h4>Contact Information</h4>
        <div class="input-group input-group-icon">
          <input type="text" class="firstName" name="firstName" placeholder="First Name" required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" class="lastName" name="lastName" placeholder="Last Name" required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" class="email" name="email" placeholder="E-Mail" required/>
          <div class="input-icon"><i class="fa fa-envelope-square"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="tel" class="phoneNumb" name="phoneNumber" placeholder="Phone Number" required/>
          <div class="input-icon"><i class="fa fa-phone">  </i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="address" class="streetAdd" name="mailAddress" placeholder="Street Address" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>

        <div class="input-group input-group-icon">
          <input type="address" class="streetTwo" name="streetTwo" placeholder="Address Line 2 (Optional)" />
          <div class="input-icon"><i class="fa fa-envelope-o"></i></div>
        </div>

        <div class="input-group input-group-icon">
          <input type="address" class="city" name="city" placeholder="City" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>

        <div class="input-group input-group-icon">
          <input type="address" class="state" name="state" placeholder="State" required/>
          <div class="input-icon"><i class="fa fa-envelope-o"></i></div>
        </div>

        <div class="input-group input-group-icon">
          <input type="address" class="zip" name="zip" placeholder="Zip Code" required/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
      </div>
      <div class="row">
        <h4>Amount Requested</h4>
        <div class="input-group input-group-icon">
          <input type="number" class="amount" name="amount" placeholder="Amount" required/>
          <div class="input-icon"><i class="fa fa-dollar"></i></div>
        </div>
	<div class="col-half">
		<h4>Choose your Legislator(s) </h4>
HTMLTOP;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	
	$count = 1;
    while($row = mysqli_fetch_assoc($result)) {
		$name = $row["name"];
	
        echo "<input type=\"checkbox\" name=\"leg[]\" id=\"leg$count\" value=\"$name\" checked/><label for=\"leg$count\">$name</label>";
		
		$count = $count + 1;

    }

}


mysqli_close($conn);


		
echo <<<HTMLBOT
		</div>
        <div class="row">
  
          <h6>Name of organization to whom the grant check is to be written:</h6>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" class="grantName" name="organization" placeholder="Organization Name" required/>
          <div class="input-icon"><i class="fa fa-bank"></i></div>
        </div>
        <h5>Note: Local or regional groups normally funded through an appropriation to an umbrella agency or governmental agency should identify the check recipient as that agency, rather than the local branch or group itself. For example, grants for local
          sickle cell groups should designate the Sickle Cell Commission as the check recipient and identify the local group in the Project Description.</h5>

        <div class="row">
          <div class="input-group input-group-icon">
            <input type="text" class="taxId" name="taxId" placeholder="Federal Tax ID#" required/>
            <div class="input-icon"><i class="fa fa-info"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="text" class="contact" name="contact" placeholder="Contact Person (Representative of the Grant Applicant)" required/>
            <div class="input-icon"><i class="fa fa-user"></i></div>
          </div>
          <div class="input-group input-group-icon">
            <input type="tel" class="contNo" name="phone" placeholder="Phone Number" required/>
            <div class="input-icon"><i class="fa fa-phone-square"></i></div>
          </div>
          <h5>Do you know of a relative of a legislator or a relative of a member of the Colbert County Community Development Commission associated with this grant recipient?</h5>
          <div class="input-group">
            <select>
            <option>[choose]</option>
            <option>Yes</option>
            <option>No</option>
          </select>
          </div>
          <div class="input-group">
            <input type="text" name="relative" placeholder="If yes, indentify here:" />
          </div>
        </div>
      </div>
      <div class="row">
        <h4>Description of Project</h4>
        <h5>Follow application requirements (use any attachments necessary) State the purpose promoted by the project, specifically what the grant will purchase, specific service(s) to be provided, and who will receive the services. If the grant is for scholarships,
          state the number to be given, criteria for receiving, and how and by whom recipients will be selected. If the grant is for incentives or awards, state the specific nature and purpose of the incentive or award. Although members of the Legislature
          may make a recommendation regarding funding, the Colbert County Community Development Commission has absolute discretion to award or reject any grant. ALL applicants must include an invoice, quote, or proof of cost with the application.</h5>
        <div class="input">
          <input type="text" name="description" placeholder="Type Description Here"></input>
        </div>
        <div class="form"> </div>

        <h4>If submitting multiple files please zip and submit the zip file.</h4>
	<h5>We accept the following file types: .doc .docx .txt .zip .pages .jpeg & .pdf </h5>
        <input type="file" name="files"/>
        <h5>If you are completely finished filling out your application, please click the "submit" button below.</h5>
        <input class="btn" type="submit" />

        <h4>Note:</h4>
        <h5>In accordance with Act No. 2008-75 enacted by the Legislature of Alabama, grants may be awarded only for the following purposes:</h5>
        <ol>
          <li> To promote economic development, education, recreation, conservation, and fire protection.
            <li>To enhance the education of the citizenry through activities, expenditures for capital improvements or equipment, to promote literacy, learning, arts appreciation, public health, and mental health.
              <li>To promote activities that provide human and social services which reduce the hardships of old age, poor health, or poverty.
                <li>To promote the marketability, yield or quality of Alabama-produced agricultural commodities.
                  <li>To promote the preservation, restoration, development and propagation of Alabama's natural resources, recreational facilities, environment, history, culture, transportation lanes, tourism, public safety, and historic landmarks and buildings.
        </ol>
        <h4>Please note that the CCCDC adopted new rules on January 28, 2015 that all field trip requests will be limited to $750.00. </h4>
      </div>
    </form>
  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
  
  

    <script  src="js/index.js"></script>




</body>

</html>
HTMLBOT;
?>
