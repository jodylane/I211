<?php

/**
 * Created by PhpStorm.
 * User: PeytonChester
 * Date: 3/29/18
 * Time: 4:19 PM
 * Description: The error page
 */
class GuestError {

    //Create a public method called display
    public function display($message) {
        ?>
        <!DOCTYPE HTML>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title>Guest Error</title>
                <link type="text/css" rel="stylesheet" href="../../www/css/styles.css" />
            </head>
            <body>
                <table width='500'>
                    <tr>
                        <td valign='center' align='center'>
                            <img src='www/img/kaboom.png' border='0'/>
                        </td>
                        <td valign='top' align='left'>
                            <h3> We're sorry, but an error has occurred.</h3>
                            <?php echo $message; ?>
                            <p><a href="index.php">HOME</a></p>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
<?php
    }
}