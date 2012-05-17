<?
  class ExampleContext extends BackendContext {
  
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
  
    public function &execute(ScopeContext &$Scope, PageContext &$Page, RenderContext &$Render) {
      $App =& $this->getApplicationContext();

      $params = Array(
        "hello" => $this->getParam($Page, "hello", "")
      );

      $out =& $Render->getRenderOutput();
      $out->setCacheable(true);
      $out->getHDF()->set("hello", $params["hello"]);

      return $out;
    }
  }
?>