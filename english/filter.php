<?php
error_reporting(0);
$answer = $_GET['answer'];
$method = $_GET['method'];
$subjectArea = $_GET['subjectArea'];
$question = $_GET['question'];
$fun = $_GET['fun'];


if (isset($answer) and !empty($answer)) {
  $query ="SELECT * FROM crossWords WHERE `answer` = '$answer'";
}


if (isset($method) and !empty($method)) {
  $query ="SELECT * FROM crossWords WHERE `method` = '$method'";
  if (isset($answer) and !empty($answer)) {
    $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `method` = '$method'";
  }
}


if (isset($subjectArea) and !empty($subjectArea)) {
  $query ="SELECT * FROM crossWords WHERE `subjectArea` = '$subjectArea'";
  if (isset($answer) and !empty($answer)) {
    $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `subjectArea` = '$subjectArea'";
    if (isset($method) and !empty($method)) {
      $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `method` = '$method' AND `subjectArea` = '$subjectArea'";
    }
  }
}


if (isset($question) and !empty($question)) {
  $query ="SELECT * FROM crossWords WHERE `question` = '$question'";
  if (isset($answer) and !empty($answer)) {
    $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `question` = '$question'";
    if (isset($method) and !empty($method)) {
      $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `method` = '$method' AND `question` = '$question'";
      if (isset($subjectArea) and !empty($subjectArea)) {
        $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `method` = '$method' AND `subjectArea` = '$subjectArea' AND `question` = '$question'";
      }
    }
  }
}


if (isset($fun) and !empty($fun)) {
  $query ="SELECT * FROM crossWords WHERE `function` = '$fun'";
  if (isset($answer) and !empty($answer)) {
    $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `function` = '$fun'";
    if (isset($method) and !empty($method)) {
      $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `method` = '$method' AND `function` = '$fun'";
      if (isset($subjectArea) and !empty($subjectArea)) {
        $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `method` = '$method' AND `subjectArea` = '$subjectArea' AND `function` = '$fun'";
        if (isset($question) and !empty($question)) {
          $query ="SELECT * FROM crossWords WHERE `answer` = '$answer' AND `method` = '$method' AND `subjectArea` = '$subjectArea' AND `question` = '$question' AND `function` = '$fun'";
        }
      }
    }
  }
}

?>