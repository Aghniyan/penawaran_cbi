<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages {

  public function template_message($color,$icon,$message)
  {
    return '<div class="alert '.$color.' alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon '.$icon.'"></i> '.$message.'</div>';
  }
  public function message_auth($status)
  {
    if ($status == 1) {
      $color  = "alert-success";
      $icon   = "fas fa-check";
      $message = "Congrats, you can using this application";
    } else if ($status == 2) {
      $color  = "alert-danger";
      $icon   = "fas fa-ban";
      $message = "Sorry, You Must Login First!";
    } else if ($status == 3) {
      $color  = "alert-info";
      $icon   = "fas fa-info";
      $message = "Thank you for using this application";
      $message = "Sorry, You Must Login First!";
    } else if ($status == 4) {
      $color  = "alert-danger";
      $icon   = "fas fa-ban";
      $message = "contact admin to activate your account";
    } else {
      $color  = "alert-danger";
      $icon   = "fas fa-ban";
      $message = "Sorry, Your Username or Password is wrong";
    }
    return $this->template_message($color,$icon,$message);
  }
  public function message_insert($status)
  {
    if ($status == 1) {
      $color  = "alert-success";
      $icon   = "fas fa-check";
      $message = "Congrats, Data Has been inserted into database";
    } else {
      $color  = "alert-danger";
      $icon   = "fas fa-ban";
      $message = "Sorry, failed to insert data into the database";
    }
    return $this->template_message($color,$icon,$message);
  }

  public function message_update($status)
  {
    if ($status == 1) {
      $color  = "alert-success";
      $icon   = "fas fa-check";
      $message = "Congrats, Data Has been updated into database";
    } else {
      $color  = "alert-danger";
      $icon   = "fas fa-ban";
      $message = "Sorry, failed to update data into the database";
    }
    return $this->template_message($color,$icon,$message);
  }

  public function message_delete($status)
  {
    if ($status == 1) {
      $color  = "alert-success";
      $icon   = "fas fa-check";
      $message = "Congrats, Data Has Been Deleted from database";
    } else {
      $color  = "alert-danger";
      $icon   = "fas fa-ban";
      $message = "Sorry, failed to delete data from the database";
    }
    return $this->template_message($color,$icon,$message);
  }
  
}