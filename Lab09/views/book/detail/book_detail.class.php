<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/9/2018
 * Time: 8:50 PM
 * Description: This file was created to view book details
 */
class BookDetail extends BookIndexView {
    public function display($book, $confirm = "") {
        //display page header
        parent::displayHeader("Book Details");

        //retrieve book details by calling get methods
        $title = $book->getTitle();
        $isbn = $book->getIsbn();
        $category = $book->getCategory();
        $publish_date = new \DateTime($book->getPublish_date());
        $publisher = $book->getPublisher();
        $image = $book->getImage();
        $description = $book->getDescription();


        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . BOOK_IMG . $image;
        }
        ?>

        <div id="main-header">Book Details</div>
        <hr>
        <!-- display book details in a table -->
        <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $title ?>" />
                </td>
                <td style="width: 130px;">
                    <p><strong>Title:</strong></p>
                    <p><strong>ISBN:</strong></p>
                    <p><strong>Category:</strong></p>
                    <p><strong>Publish Date:</strong></p>
                    <p><strong>Publisher:</strong></p>
                    <p><strong>Description:</strong></p>
                </td>
                <td>
                    <p><?= $title ?></p>
                    <p><?= $isbn ?></p>
                    <p><?= $category ?></p>
                    <p><?= $publish_date->format('m-d-Y') ?></p>
                    <p><?= $publisher ?></p>
                    <p class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>
        <a href="<?= BASE_URL ?>/book/index">Go to book list</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

}