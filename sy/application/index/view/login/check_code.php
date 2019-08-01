<?php

  if( $_SESSION['vcode'] == strtolower($_POST['vcode']) ){

      $result=true;

  }else{
      $result=false;
  }

  echo json_encode($result);