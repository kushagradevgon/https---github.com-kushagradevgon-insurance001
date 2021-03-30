<?php
$fname = $_POST['fname'];
$contact_no = $_POST['contact_no'];
$email = $_POST['mail_address'];
$dob = $_POST['dob'];
$products = $_POST['products'];
$income = $_POST['income'];
$dependents = $_POST['dependents'];
$country = $_POST['country'];
$state = $_POST['state'];
$other_city = $_POST['other_city'];
$pincode = $_POST['pincode'];
$conn = new mysqli('localhost:3306','root','250800','data');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed :". $conn->connect_error);}
else{
    $stmt = $conn->prepare("insert into data values(fname, contact_no, email, dob, products, income, dependents, country, state, city, pincode) values(?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sisssiisssi", $fname, $contact_no, $email, $dob, $products, $income, $dependents, $country, $state, $other_city, $pincode);
    $execval =$stmt->execute();
    echo $execval;
    echo "Thanks! We will get back soon.......";
    $stmt->close;
    $conn->close;
}
?>