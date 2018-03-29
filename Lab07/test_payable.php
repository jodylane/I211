<?php
/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/1/2018
 * Time: 1:42 PM
 * Description: This file was created to test and display all created classes
 */
//convert a camel cased string to a underscored string
function camelCaseToUnderscore($str) {
    //store all characters in an array
    $characters = str_split($str);

    //covert the first character to a lowercase
    $characters[0] = strtolower($characters[0]);

    //exam all characters in the array
    //if a character is uppercase, replace it with a lowercase and prefix it with an underscore
    foreach ($characters as &$character) {
        if (ord($character) >= ord('A') && ord($character) <= ord('Z'))
            $character = '_' . strtolower($character);
    }

    //convert all elements in the array into a string and return the string
    return implode('', $characters);
}

//this function automatically loads class file when a new object is instantiated
function __autoload($class_name) {
    require_once camelCaseToUnderscore($class_name) . '.class.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 07</title>
</head>
<body>
<h1>Payroll System Programmed with OOP</h1>
<?php
// create invoice instances
$i1 = new Invoice("01234", "seat", 2, 375.00);
$i2 = new Invoice("56789", "tire", 4, 79.95);

// create employee instances of varying salary types
$e1 = new SalariedEmployee(new Person("John", "Smith"), "111-11-1111", 800.00);
$e2 = new HourlyEmployee(new Person("Karen", "Price"), "222-22-2222", 16.75, 40);
$e3 = new CommissionEmployee(new Person("Sue", "Jones"), "333-33-3333", 10000, 0.06);
$e4 = new BasePlusCommissionEmployee(new Person("Bob", "Lewis"), "444-44-4444", 5000, 0.04, 300.00);

// creates an array from our created invoice/employee instances
$emps = array($i1, $i2, $e1, $e2, $e3, $e4);

// loop through array of invoice/employee instances and displays them in the DOM
foreach ($emps as $emp) {
    displayClassObjects($emp);
}

// checks each object for the class_name and displays the appropriate title for the corresponding class_name
// and displays the information for that class
function displayClassObjects ($emp) {
    echo "***************************************************** <br>";
    if (get_class($emp) === "Invoice") {
        echo "<b>Invoice:</b><br>";
    } else if (get_class($emp) === "SalariedEmployee") {
        echo "<b>Salaried Employee:</b><br>";
    } else if (get_class($emp) === "HourlyEmployee") {
        echo "<b>Hourly Employee:</b><br>";
    } else if (get_class($emp) === "CommissionEmployee") {
        echo "<b>Commission Employee:</b><br>";
    } else if (get_class($emp) === "BasePlusCommissionEmployee") {
        echo "<b>Base Plus Commission Employee:</b><br>";
    }
    echo $emp->toString() . "<br><br>";

}

// add line break at the end of the loop and displays the number of invoices and employees
echo "***************************************************** <br><br>";
echo "Number of invoices: " . Invoice::getInvoiceCount() . "<br>";
echo "Number of employees: " . Employee::getEmployeeCount();

?>

</body>
</html>