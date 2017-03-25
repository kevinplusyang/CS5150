<?php
/**
 * Created by PhpStorm.
 * User: mingyang
 * Date: 3/14/17
 * Time: 9:44 PM
 */

$link = mysql_connect('localhost', 'root', '')
or die('Could not connect: ' . mysql_error());
mysql_select_db('SoftwareEngineering') or die('Could not select database');
mysql_query("SET NAMES 'utf8'");
