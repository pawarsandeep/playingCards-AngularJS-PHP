<?php

/**
 * Created by PhpStorm.
 * User: Sandeep
 * Date: 11/27/2017
 * Time: 11:36 AM
 */
class Database
{
  // Variable declarations
  private static $host = "localhost";
  private static $port = "33067";
  private static $dbName = "playing_cards";
  private static $userName = "root";
  private static $password = "";
  public static $connection;

  // Get database connection.
  public static function getConnection(){
    self::$connection = null;
    try{
      self::$connection = new PDO("mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbName, self::$userName, self::$password);
      self::$connection->exec("set names utf8");
    }
    catch (PDOException $exception){
      echo "Connection error" . $exception->getMessage();
    }
  }
}