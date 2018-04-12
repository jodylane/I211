<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/9/2018
 * Time: 8:50 PM
 * Description: This file was created to show errors when they occur.
 */
class BookError extends BookIndexView {
    public function display($message) {

        //display page header
        parent::displayHeader("Error");
        ?>

        <div id="main-header">Error</div>
        <hr>
        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='<?= BASE_URL ?>/www/img/error.jpg' style="width: 80px; border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3> Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?= urldecode($message) ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br><hr>
        <a href="<?= BASE_URL ?>/book/index">Back to book list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

}