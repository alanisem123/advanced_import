<?php
namespace Vanderbilt\AdvancedImport;

$page = new \HtmlPage();
$page->PrintHeaderExt();

include APP_PATH_VIEWS . 'HomeTabs.php';
$module_path = $module->getModulePath();
include($module_path.'header.php');

?>

<script src="<?=APP_PATH_JS?>vue.min.js"></script>
<script src="<?= $module->getUrl('./assets/js/advanced_import/dist/advanced_import.umd.js'); ?>"></script>
<link rel="stylesheet" href="<?= $module->getUrl('./assets/js/advanced_import/dist/advanced_import.css'); ?>">
<?php



?>

<div id="app">
  <advanced-import></advanced-import>
</div>

<script>
new Vue({
  components: {
    'advanced-import': advanced_import
  }
}).$mount('#app')
</script>

<style>

</style>
<?php 
//$page->PrintFooterExt();
?>

