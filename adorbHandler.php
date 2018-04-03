<?php
  session_start();
  require_once './Dao.php';
  $dao = new Dao();

  #echo "<pre>" . print_r($_FILES, 1) . "</pre>";
  #exit;
  $rating = $_POST["adorbval"];
  $petID = $_POST['photo'];


  $_SESSION['presets'] = array($_POST);

  $valid = true;
  $messages = array();
  if (empty($rating)|| !is_numeric($rating) ||$rating>5 || $rating <1) {
    $messages[]="MUST ENTER A NUMBER BETWEEN 1 and 5!";
    $_SESSION['messages']=$messages;

    header("Location:votingPage.php");
    exit;
  }else{

  $total = $dao->getAdorbVal($petID);

  $numVotes = $dao->getNumVotesAdorb($petID);
  $totalMult= $total*$numVotes;
  $totalMultNew=$totalMult+$rating;
  $totalNew=$totalMultNew/($numVotes+1);
  $numVotes=$numVotes+1;
  $dao->updateVoteAdorb($petID, $totalNew);
  $dao->updateNumVotesAdorb($petID, $numVotes);
  header("Location: votingPage.php");
  exit;
}
?>