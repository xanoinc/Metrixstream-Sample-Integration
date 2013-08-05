<?

class BackendQuery_Example extends BackendQuery {
  public function getDisplayName() {
    return "My Example Context";
  }

  public function isDependentOnScope($scopeKey) {
    return false;
  }

  public function getParamFilters() {
    return Array(
      "hello" => TextInputFilter::create()->min(0)->max(48),
    );
  }

  public function isCacheable() {
    return true;
  }

  public function execute(BackendContext &$Backend, ScopeContext &$Scope) {
    $App =& $this->getApplicationContext();

    $params = Array(
      "hello" => $this->getParam($Page, "hello", "")
    );

    // normally we would do some database request here, but for making this example simple we are skipping that

    $result->hello = $params["hello"];
    return $result;
  }

  public function processResult(BackendContext &$Backend, BackendOutputFactory &$OutputFactory, $result) {
    $Output =& $OutputFactory->create();
    $Output->set("hello", $result->hello);
    return $Output;
  }
}

?>
