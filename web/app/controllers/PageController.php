<?php

namespace App\Controllers;

use App\Models\EmailModel;
use Core\DBConnection;

//require '../core/helpers.php';

class PageController
{
  public function index()
  {
    //dd('Index Controller Class is Running');
    $form_error = false;
    echo "<h1>Home Page From Controller!</h1>";
    $EmailModel = new EmailModel(DBConnection::start());
    // dd($EmailModel->totalEmails());
    view("index", [
      "name" => "Joe",
      "totalEmails" => $EmailModel->totalEmails(),
      "form_error" => $form_error
    ]);
  }

  public function store()
  {
    $EmailModel = new EmailModel(DBConnection::start());
    if ($_POST['email'] != "") {
      // dd($EmailModel->totalEmails());
      if ($EmailModel->insert($_POST['email'])) {
        redirect('https://laraveldocker.test/thank-you');
      } else {
        view("index", [
          "name" => "James",
          "totalEmails" => $EmailModel->totalEmails(),
          "form_error" => true,
          "form_error_message" => "There was a problem saving the data!"
        ]);
      }
    } else {
      view("index", [
        "name" => "Joe",
        "totalEmails" => $EmailModel->totalEmails(),
        "form_error" => true,
        "form_error_message" => "Please make sure you add a valid email form can't be empty!"
      ]);
    }
  }

  public function thankyou()
  {
    view("thank-you");
  }
}
