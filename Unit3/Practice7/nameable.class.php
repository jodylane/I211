<?php

/**
 * Author: Louie Zhu
 * Date: 2/25/2017
 * Name: nameable.class.php
 * Description: An interface for all nameable objects.
 */


interface Nameable  {
    //abstract methods
    public function getName();
    public function setName($name);
}
?>