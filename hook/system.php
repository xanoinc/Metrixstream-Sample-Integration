<?
  class SystemHook extends iSystemHook {
    function updateDatabase(DatabaseContext &$DB) {
      $SQL =& $DB->getBackDB();

      $q = "CREATE TABLE IF NOT EXISTS `example` (  `id` int(11) NOT NULL auto_increment,  `created` int(11) NOT NULL,  `name` varchar(64) NOT NULL,  PRIMARY KEY  (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1";

      $SQL->queryOrDie($q);
    }
  }
?>