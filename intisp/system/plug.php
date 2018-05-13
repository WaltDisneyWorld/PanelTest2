
<?php 
require 'include/head.php';
require 'phphooks.inc.php';
onlyadmin();
$plugin_list = new phphooks();
$plugin_headers = $plugin_list->get_plugins_header();
?>
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
<h1 class="page-title">Plugins</h1>
<p>Copy plugins to /var/webister/interface/plugins.</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Plugin</th>
            <th scope="col" class="num">Version</th>
            <th scope="col">Description</th>
            
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th scope="col">Plugin</th>
            <th scope="col" class="num">Version</th>
            <th scope="col">Description</th>
            
        </tr>
    </tfoot>

    <tbody class="plugins">
<?php
foreach ( $plugin_headers as $plugin_header ) {
    $action = false;
    foreach ( $result_rows as $result_row ) {
        if ($plugin_header ['filename'] == $result_row ['filename'] && $result_row ['action'] == 1) {
            $action = true;
        }
    }
    ?>
        <tr <?php
        if ($action) {
            echo "class='active'";
        }
    ?>>
            <td class='name'><a
                href="<?php
                echo $plugin_header ['PluginURI'];
    ?>"
                title="<?php
                echo $plugin_header ['Title'];
    ?>"><?php
    echo $plugin_header ['Name'];
    ?></a></td>
            <td class='vers'><?php
            echo $plugin_header ['Version'];
    ?></td>
            <td class='desc'>
                <p class="nopadbot"><?php
                echo $plugin_header ['Description'];
    ?> by <a href="<?php
    echo $plugin_header ['AuthorURI'];
    ?>"
                        title="Visit author homepage"><?php
                        echo $plugin_header ['Author'];
    ?></a>.
                </p>
            </td>
        
        </tr>
<?php
}
?>
    </tbody>
</table>
 </div>
  </div>
  </div>
  </div>
<?php require 'include/footer.php'; ?>