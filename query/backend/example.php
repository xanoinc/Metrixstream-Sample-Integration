<?
  class ExampleQuery extends BackendQuery {
    public function getInternalName() {
      return "example";
    }
  
    public function getDisplayName() {
      return "My Example Context";
    }
  
    public function isDependentOnScope($scopeKey) {
      return false;
    }
  
    public function getConsumableParams() {
      return Array("hello");
    }
  
    public function filterParam($paramName, $paramValue, $whitelist = Array()) {
      switch($paramName) {
        case "hello": return $paramValue;
      }
      return null;
    }

    public function isCacheable() {
      return true;
    }

    public function execute(BackendContext $Backend, ScopeContext &$Scope, BackendOutputFactory $OutputFactory) {
      $App =& $this->getApplicationContext();

      $params = Array(
        "hello" => $this->getParam($Page, "hello", "")
      );

      $Output =& $OutputFactory->create();
      $Output->set("hello", $params["hello"]);
      return $Output;
    }
  }
?>