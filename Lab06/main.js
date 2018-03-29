/* Author: Louie Zhu
 * Date: 2/08/2018
 * Name: main.js
 * Description: this javascript file sends ajax request and handles server's responses.
 */

var xmlHttp;  //XMLHttpRequest object

//when the browser finishes loading the web page, execute the following code
window.onload = function () {
    // create a XMLHttpRequest object compatible to most browsers
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    } else {
        alert("Error creating the XMLHttpRequest object.");
        xmlHttp = false;
    }
    return xmlHttp;
};

/*
 * this function sends AJAX request and handles server's responses.
 */
function calculate(e) {
    //add your code here
    // get reference to our input values
    var radius = document.getElementById('radius').value;
    var height = document.getElementById('height').value;

    // get reference to output divs
    var base = document.getElementById('base');
    var volume = document.getElementById('volume');
    var lateral = document.getElementById('lateral');
    var surface = document.getElementById('surface');

    // check to see if height and radius is greater than 0 and that their a number value otherwise one or both of these values are empty or NaN (not a number)
    if ((radius > 0 && height > 0) && (!isNaN(radius) && !isNaN(height))) {
        xmlHttp.open("GET", "cylinder.php?radius=" + radius + "&height=" + height, true);

        // call back function that handles server responses
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
                var resultJSON = JSON.parse(xmlHttp.responseText);

                // There is no chance that an error would be expected as the if statement that wraps this ajax request ensures
                // that there can be no errors when this fires.
                base.innerHTML = resultJSON.Base;
                volume.innerHTML = resultJSON.Volume;
                lateral.innerHTML = resultJSON.Lateral;
                surface.innerHTML = resultJSON.Surface;
            }
        };

        // make the request to the server
        xmlHttp.send(null);
    } else {
        // clear output values if invalid number or both inputs are not present
        base.innerHTML = '';
        volume.innerHTML = '';
        lateral.innerHTML = '';
        surface.innerHTML = '';
    }
}
