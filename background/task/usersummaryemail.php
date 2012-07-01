<?
  class BackgroundTask_UserSummaryEmail extends BackgroundTask {
    public function getServerOption() {
      return "usersummaryemail";
    }
  
    public function getTaskStartTime() {
      $start = strtotime("5 am");
  
      if ($start < time()) {
        $start += 24*60*60;
      }
  
      return $start;
    }
  
    public function getIdleTimeout() {
      return 24*60*60;
    }
  
    function run() {
      $task =& $this->getContext();
      $pRet =& $this->getPubSubResult();
  
      $DB =& $task->getDatabaseContext();
  
      $numUsers = $DB->getBackDB()->queryCount("SELECT COUNT(1) AS CNT FROM site_user WHERE 1", "CNT");
  
      $pRet->log("%d users detected", $numUsers);
  
      $mail = new htmlMimeMail();
      $mail->setHeadCharset("UTF-8");
      $mail->setFrom("no-reply@metrixstream.com");
      $mail->setSubject("# of users summary");
      $mail->setText(sprintf("There are %d users.", $numUsers);
      $mail->send(Array("test@test.com"));
  
      return $pRet->success();
    }
  }
?>