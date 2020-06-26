<?php
    // function execute select statement
  function query($sql)
  {
      $con = mysqli_connect('localhost', 'root', '', 'awesome_shop');
      $result = mysqli_query($con, $sql);
      mysqli_close($con);
      return $result;
  }

?>