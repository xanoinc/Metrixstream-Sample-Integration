<?
  class AuthUser_updateLastLoginTimestampQuery extends ApiQuery {
    public function getInternalName() {
      return "authuser_updatelastlogintimestamp";
    }

    public function execute(ApiContext &$Api, ApiOutputFactory &$OutputFactory) {
      $App =& $this->getApplicationContext();
      $Auth =& $App->getAuthContext();

      if (!$Auth->hasUser()) {
        return $OutputFactory->error("This is an authenticated request.");
      }

      $User =& $Auth->getUser();
      $User->last_login = time();
      $ret = $User->updateParams(Array("last_login"), true);
      if (!$ret) {
        $OutputFactory->error("Unable to update user.");
      }

      return $OutputFactory->success();
    }
  }
?>