<?php
session_start();
if (!isset($_SESSION['user'])) {
  die();
}
require("config.php");
/*
../ & ./ preventor

*/
if (!isset($_GET["p"])) {
    header("Location: ?p=%2F");
    die();
}
if (!file_exists($path . "/" . $_GET["p"])) {
  header("Location: ?p=%2F");
  die();
}



if (strpos($_GET["p"], '../') !== false) {
    die("../ & ./ Preventor Tripped");
}
if (strpos($_GET["p"], './') !== false) {
    die("../ & ./ Preventor Tripped");
}

if (isset($_GET["file"])) {
  $file_name = stripslashes($_GET["file"]);
  if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
    if (!file_exists($path . "/" . $_GET["p"] . "/" . $file_name)) {
    touch($path . "/" . $_GET["p"] . "/" . $file_name);
    }
  }
  header("Location: ?p=" . $_GET["p"]);
}
if (isset($_GET["folder"])) {
  $file_name = stripslashes($_GET["folder"]);
  if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
    if (!file_exists($path . "/" . $_GET["p"] . "/" . $file_name)) {
    mkdir($path . "/" . $_GET["p"] . "/" . $file_name);
    }
  }
  header("Location: ?p=" . $_GET["p"]);
}
if (isset($_GET["d_confirmed"])) {
  function recurseRmdir($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? recurseRmdir("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
  }
  $file_name = stripslashes($_GET["d_confirmed"]);
  if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
    if (is_dir($path . "/" . $_GET["p"] . "/" . $file_name)) {
      recurseRmdir($path . "/" . $_GET["p"] . "/" . $file_name);
    } else {
      unlink($path . "/" . $_GET["p"] . "/" . $file_name);
    }
    header("Location: ?p=" . $_GET["p"]);
  }
}


if (isset($_GET["prev"])) {
  $old = stripslashes($_GET["prev"]);
  $new = stripslashes($_GET["renamed"]);
  if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
    if (file_exists($path . "/" . $_GET["p"] . "/" . $old)) {
      if (!file_exists($path . "/" . $_GET["p"] . "/" . $new)) {
        rename($path . "/" . $_GET["p"] . "/" . $old,$path . "/" . $_GET["p"] . "/" . $new);

      }
    }
  }
  header("Location: ?p=" . $_GET["p"]);
}
if (isset($_GET["d_cut"])) {
  $new = stripslashes($_GET["d_cut"]);
  if (isset($_SESSION["d_copy"])) unset($_SESSION["d_copy"]);


  if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
    if (file_exists($path . "/" . $_GET["p"] . "/" . $new)) {
        $_SESSION["d_cut"] = $path . "/" . $_GET["p"] . "/" . $new;
    }}
    header("Location: ?p=" . $_GET["p"]);
}
if (isset($_GET["d_copy"])) {
  $new = stripslashes($_GET["d_copy"]);
  if (isset($_SESSION["d_cut"])) unset($_SESSION["d_cut"]);
  if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
    if (file_exists($path . "/" . $_GET["p"] . "/" . $new)) {
        $_SESSION["d_copy"] = $path . "/" . $_GET["p"] . "/" . $new;
    }}
    header("Location: ?p=" . $_GET["p"]);
}

if (isset($_GET["cancelcut"])) {
  if (isset($_SESSION["d_cut"])) unset($_SESSION["d_cut"]);
  if (isset($_SESSION["d_copy"])) unset($_SESSION["d_copy"]);
  header("Location: ?p=" . $_GET["p"]);
}



?>
<html>
  <head>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/jquery.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="public/css/all.css">
  </head>
  <body>
<?php
if (isset($_GET["d_confirm"])) {
  ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#delModal').modal('show');
    });
</script>
  <?php
}
if (isset($_GET["edit"])) {
  ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#editModal').modal('show');
    });
</script>
<?php
} if (isset($_GET["rename"])) {
  ?>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#renameModal').modal('show');
    });
</script>
  <?php
}
?>

    <div class="row admin-sub-header">
      <div class="col-md-8 col-sm-8 col-8 site-breadcrumb">
        <div id="wrap">
          
          <span id="breadcrumb-nav-links"> 
          <a href="?p=%2F">ROOT</a>
            
   <?php
$arr=explode("/",$_GET["p"]);
$c = -2;
$d = 0;
foreach ($arr as $ocur) {
    $c++;
    if ($c >= 0) {
        $d++;
    ?>
 <a href="?p=<?php
   for( $i= 0 ; $i <= $d ; $i++ ) {
       echo urlencode($arr[$i] . "/");
   }
 
 ?>"><?php echo $ocur; ?></a>
 <span class="separator"> / </span>
    <?php
}
}
?>
          </span>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-4 text-right">
     <?php if (isset($_SESSION["d_copy"]) || isset($_SESSION["d_cut"])) { ?>
      <?php if (isset($_SESSION["d_copy"])) { 
        echo basename($_SESSION["d_copy"]);
       } else {
        echo basename($_SESSION["d_cut"]);
      } ?>
      <button class="btn btn-light btn-sm pl-3 pr-3 ml-1"> <i class="fas fa-paste"></i></button>
      <a href="?p=<?php echo $_GET["p"]; ?>&cancelcut" class="btn btn-light btn-sm pl-3 pr-3 ml-1"><i class="fas fa-ban"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <?php } ?>
     
     <button class="btn btn-light btn-sm pl-3 pr-3 ml-1"> <i class="fas fa-upload"></i></button>
      <button class="btn btn-light btn-sm pl-3 pr-3 ml-1" data-toggle="modal" data-target="#newFile"> <i class="fas fa-file-medical"></i></button>
        <button class="btn btn-light btn-sm pl-3 pr-3 ml-1" data-toggle="modal" data-target="#newFold"> <i class="fas fa-folder-plus"></i></button>
        <button class="btn btn-light btn-sm pl-3 pr-3 ml-1"> Wordpress</button>
      </div>
    </div>
    
    <div class="row edrive-wrapper">
  
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 edrive-space">
        <div class="row edrive-table-head">
          <div class="col-lg-3 col-md-3 col-sm-3 col-12">Name</div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-12">Date Modified</div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-12">Type</div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-12">Size</div>
          <div class="col-lg-4 col-md-3 col-sm-3 col-12">Actions</div>
        </div>
<?php
$full_path = $path;
if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
    $full_path = $path . $_GET["p"];
}
$folders_files = scandir($full_path);
function filesize_formatted($path)
{
    $size = filesize($path);
    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}
foreach ($folders_files as $type) {
    if ($type == "." || $type == "..") {} else {
    if (is_dir($full_path . "/" . $type)) {
?>
  <div class="row edrive-table-data-row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-12 data-name"><i class="fas fa-folder edrive-file-icon"></i> <a href="?p=<?php 
          
          if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
            echo $_GET["p"] . "/" . $type;
          } else {
          echo $type;
          }
          
          
          ?>" title="<?php echo $type; ?>"><?php echo $type; ?></a></div>
          <div class="col-lg-2 col-md-3 col-sm-3 col-12 data-info"><?php echo date ("F d Y H:i:s.",filemtime($full_path . "/" . $type)); ?></div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-12 data-info">Folder</div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-12 data-info">-</div>
          <div class="col-lg-4 col-md-3 col-sm-3 col-12 data-info">
          <a href="?p=<?php echo $_GET["p"]; ?>&d_copy=<?php echo urlencode($type); ?>"><i class="fas fa-copy"></i></a>&nbsp;&nbsp;&nbsp;
          <a href="?p=<?php echo $_GET["p"]; ?>&d_cut=<?php echo urlencode($type); ?>"><i class="fas fa-cut"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="?p=<?php echo $_GET["p"]; ?>&rename=<?php echo urlencode($type); ?>"><i class="fas fa-i-cursor"></i></a> &nbsp;&nbsp;&nbsp;
          <a href="?p=<?php echo $_GET["p"]; ?>&d_confirm=<?php echo urlencode($type); ?>"><i class="fas fa-trash"></i></a>
      
          </div>
        </div>
<?php
    } else {
        ?>
        <div class="row edrive-table-data-row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-12 data-name"><i class="fas fa-file edrive-file-icon"></i> <a href="?e=<?php 
        
        if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
          echo $_GET["p"] . "/" . $type;
        } else {
        echo $type;
        }
        
        
        ?>" title="<?php echo $type; ?>"><?php echo $type; ?></a></div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-12 data-info"><?php echo date ("F d Y H:i:s.",filemtime($full_path . "/" . $type)); ?></div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-12 data-info">File</div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-12 data-info"><?php echo filesize_formatted($full_path . "/" . $type); ?></div>
        <div class="col-lg-4 col-md-3 col-sm-3 col-12 data-info">
        <a href="?p=<?php echo $_GET["p"]; ?>&d_copy=<?php echo urlencode($type); ?>"><i class="fas fa-copy"></i></a>&nbsp;&nbsp;&nbsp;
          <a href="?p=<?php echo $_GET["p"]; ?>&d_cut=<?php echo urlencode($type); ?>"><i class="fas fa-cut"></i></a>&nbsp;&nbsp;&nbsp;
        <a href="?p=<?php echo $_GET["p"]; ?>&edit=<?php echo urlencode($type); ?>"><i class="fas fa-edit"></i></a> &nbsp;&nbsp;&nbsp;
        <a href="?p=<?php echo $_GET["p"]; ?>&rename=<?php echo urlencode($type); ?>"><i class="fas fa-i-cursor"></i></a> &nbsp;&nbsp;&nbsp;
        <a href="?p=<?php echo $_GET["p"]; ?>&d_confirm=<?php echo urlencode($type); ?>"><i class="fas fa-trash"></i></a>
        
        </div>
        </div>
  <?php
    }
}
}
?>



      
      
      </div>
    </div>
    <div class="modal fade" id="newFile" tabindex="-1" role="dialog" aria-labelledby="newFileLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newFileLabel">Create a new File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="GET">
  <div class="form-group">
  <input type="hidden" name="p" value="<?php echo $_GET["p"]; ?>">
    <input type="text" class="form-control" name="file" required>
    <small id="emailHelp" class="form-text text-muted">Please enter the file name.</small>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Create" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="newFold" tabindex="-1" role="dialog" aria-labelledby="newFoldLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newFoldLabel">Create a new Folder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="GET">
  <div class="form-group">
  <input type="hidden" name="p" value="<?php echo $_GET["p"]; ?>">
    <input type="text" class="form-control" name="folder" required>
    <small id="emailHelp" class="form-text text-muted">Please enter the folder name.</small>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Create" class="btn btn-primary">
      </form>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_GET["d_confirm"])) {
  
  ?>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delModalLabel">Please Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Are you sure you want to delete <b><?php echo $_GET["d_confirm"]; ?></b>? Once deleted the file/folder will not be able to be recovered.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="?p=<?php echo $_GET["p"]; ?>&d_confirmed=<?php echo $_GET["d_confirm"]; ?>" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>

<?php
}

if (isset($_GET["edit"])) {
  if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
    $editing_file = stripslashes($_GET["edit"]);
    if (file_exists($path . "/" . $_GET["p"] . "/" . $editing_file) && !is_dir($path . "/" . $_GET["p"] . "/" . $editing_file)) {
    
  ?>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editing <?php echo $_GET["edit"]; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <style type="text/css">
#editor {
  position: relative;
  min-height: 500px;
  width: 50%px;
}
</style>
<form method="POST" action="?p=<?php echo $_GET["p"];?>&edit=<?php echo $_GET["edit"]; ?>&save">
<?php if (isset($_GET["save"])) { 
  file_put_contents($path . "/" . $_GET["p"] . "/" . $editing_file,$_POST["editor"]);
  ?>
  <div class="alert alert-success">The file has been saved.</div>
<?php }
?>
<textarea name="editor">
<?php echo htmlspecialchars(file_get_contents($path . "/" . $_GET["p"] . "/" . $editing_file)); ?>
</textarea>
<div id="editor">

</div>
<script src="public/ace/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    var textarea = $('textarea[name="editor"]').hide();
    editor.getSession().setValue(textarea.val());
editor.getSession().on('change', function(){
  textarea.val(editor.getSession().getValue());
});
    editor.setTheme("ace/theme/twilight");
</script>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Save" class="btn btn-primary">
</form>
      </div>
    </div>
  </div>
</div>

<?php
}}}
if (isset($_GET["rename"])) { 
  
  if (isset($_GET["p"]) && file_exists($path . "/" . $_GET["p"]) && is_dir($path . "/" . $_GET["p"])) {
$editing_file = stripslashes($_GET["rename"]);
    if (file_exists($path . "/" . $_GET["p"] . "/" . $editing_file)) {
  ?>

<div class="modal fade" id="renameModal" tabindex="-1" role="dialog" aria-labelledby="renameLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="renameLabel">Renaming <?php echo $_GET["rename"]; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="GET">
  <div class="form-group">
  <input type="hidden" name="p" value="<?php echo $_GET["p"]; ?>">
  <input type="hidden" name="prev" value="<?php echo $editing_file; ?>">
    <input type="text" class="form-control" name="renamed" value="<?php echo $_GET["rename"]; ?>" required>
    <small id="emailHelp" class="form-text text-muted">Please enter the new file/folder name.</small>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Rename" class="btn btn-primary">
      </form>
      </div>
    </div>
  </div>
</div>


<?php }} }?>

  </body>
</html>