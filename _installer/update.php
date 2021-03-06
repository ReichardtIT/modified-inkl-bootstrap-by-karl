<?php
/* -----------------------------------------------------------------------------------------
   $Id: update.php 9274 2016-01-25 16:56:48Z Tomcraft $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   Stand 04.03.2012
   ---------------------------------------------------------------------------------------*/
error_reporting(0);
chdir('../');
include ('includes/application_top.php');

// set all files to be deleted
$unlink_file = array('_unterverzeichnis_.htaccess',
                     'admin/billsafe_orders_2hp.php',
                     'admin/includes/configure.org.php',
                     'admin/includes/javascript/jquery-ui.custom.css',
                     'admin/includes/javascript/images/ui-bg_diagonals-thick_75_f3d8d8_40x40.png',
                     'admin/includes/javascript/images/ui-bg_dots-small_65_a6a6a6_2x2.png',
                     'admin/includes/javascript/images/ui-bg_flat_0_333333_40x100.png',
                     'admin/includes/javascript/images/ui-bg_flat_65_d2d0d0_40x100.png',
                     'admin/includes/javascript/images/ui-bg_flat_75_cecdca_40x100.png',
                     'admin/includes/javascript/images/ui-bg_glass_55_fdf59b_1x400.png',
                     'admin/includes/javascript/images/ui-bg_highlight-hard_100_e1e1e0_1x100.png',
                     'admin/includes/javascript/images/ui-bg_highlight-hard_100_f6f6f6_1x100.png',
                     'admin/includes/javascript/images/ui-bg_highlight-soft_15_b40076_1x100.png',
                     'admin/includes/javascript/images/ui-icons_004276_256x240.png',
                     'admin/includes/javascript/images/ui-icons_b40076_256x240.png',
                     'admin/includes/javascript/images/ui-icons_cc0000_256x240.png',
                     'admin/includes/javascript/images/ui-icons_cecdca_256x240.png',
                     'admin/includes/javascript/ui/jquery.ui.core.min.js',
                     'admin/includes/javascript/ui/jquery.ui.datepicker-de.js',
                     'admin/includes/javascript/ui/jquery.ui.datepicker-en.js',
                     'admin/includes/javascript/ui/jquery.ui.datepicker.min.js',
                     'admin/includes/modules/carp/carp.php',
                     'admin/includes/modules/carp/carpconf.php',
                     'admin/includes/modules/carp/carpinc.php',
                     'admin/includes/modules/carp/carpsetupinc.php',
                     'admin/includes/modules/export/image_processing.php',
                     'admin/includes/modules/export/image_processing_new.php',
                     'admin/includes/modules/export/image_processing_new_step.php',
                     'admin/includes/modules/export/image_processing_new_step2.php',
                     'admin/includes/modules/fckeditor/editor/filemanager/browser/default/frmactualfolder.html',
                     'admin/includes/modules/fckeditor/editor/filemanager/browser/default/frmcreatefolder.html',
                     'admin/includes/modules/fckeditor/editor/filemanager/browser/default/frmfolders.html',
                     'admin/includes/modules/fckeditor/editor/filemanager/browser/default/frmresourceslist.html',
                     'admin/includes/modules/fckeditor/editor/filemanager/browser/default/frmresourcetype.html',
                     'admin/includes/modules/fckeditor/editor/filemanager/browser/default/frmupload.html',
                     'admin/includes/modules/magpierss/AUTHORS',
                     'admin/includes/modules/magpierss/ChangeLog',
                     'admin/includes/modules/magpierss/CHANGES',
                     'admin/includes/modules/magpierss/rss_cache.inc',
                     'admin/includes/modules/magpierss/rss_fetch.inc',
                     'admin/includes/modules/magpierss/rss_parse.inc',
                     'admin/includes/modules/magpierss/rss_utils.inc',
                     'admin/includes/modules/magpierss/extlib/Snoopy.class.inc',
                     'admin/rss/index.html',
                     'admin/rss/xt-news.cache',
                     'admin/rss/xtc.cache',
                     'callback/sofort/callback.php', // neu
                     'callback/sofort/helperFunctions.php', // neu
                     'callback/sofort/sofort.ini', // neu
                     'callback/sofort/sofort.php', // neu
                     'callback/sofort/sofortInstall.php', // neu
                     'copyright.php',
                     'includes/configure.org.php',
                     'includes/modules/order_total/ot_sofort.php', // neu
                     'includes/modules/payment/billsafe_2hp.php',
                     'includes/modules/payment/iclear.php',
                     'includes/modules/payment/pn_sofortueberweisung.php', // neu
                     'includes/modules/payment/sofort_lastschrift.php', // neu
                     'includes/modules/payment/sofort_sofortlastschrift.php', // neu
                     'includes/modules/payment/sofort_sofortrechnung.php', // neu
                     'includes/modules/payment/sofort_sofortueberweisung.php', // neu
                     'includes/modules/payment/sofort_sofortvorkasse.php', // neu
                     'includes/modules/sofort_vorkasse.php', // neu
                     'lang/english/modules/order_total/ot_sofort.php', // neu
                     'lang/english/modules/payment/billsafe_2hp.php',
                     'lang/english/modules/payment/iclear.php',
                     'lang/english/modules/payment/pn_sofortueberweisung.php', // neu
                     'lang/english/modules/payment/sofort_general.php', // neu
                     'lang/english/modules/payment/sofort_lastschrift.php', // neu
                     'lang/english/modules/payment/sofort_sofortlastschrift.php', // neu
                     'lang/english/modules/payment/sofort_sofortrechnung.php', // neu
                     'lang/english/modules/payment/sofort_sofortueberweisung.php', // neu
                     'lang/english/modules/payment/sofort_sofortvorkasse.php', // neu
                     'lang/german/modules/order_total/ot_sofort.php', // neu
                     'lang/german/modules/payment/billsafe_2hp.php',
                     'lang/german/modules/payment/iclear.php',
                     'lang/german/modules/payment/pn_sofortueberweisung.php', // neu
                     'lang/german/modules/payment/sofort_general.php', // neu
                     'lang/german/modules/payment/sofort_lastschrift.php', // neu
                     'lang/german/modules/payment/sofort_sofortlastschrift.php', // neu
                     'lang/german/modules/payment/sofort_sofortrechnung.php', // neu
                     'lang/german/modules/payment/sofort_sofortueberweisung.php', // neu
                     'lang/german/modules/payment/sofort_sofortvorkasse.php', // neu
                     'shopstat/.htaccess',
                     'templates/xtc5/css/no_javascript.css',
                     'templates/xtc5/mail/german/widerruf.txt',
                     'templates/xtc5/mail/german/widerruf.html',
                     'templates/xtc5/mail/english/widerruf.txt',
                     'templates/xtc5/mail/english/widerruf.html',
                     'templates/xtc5/module/sofort_vorkasse.html', // neu
                     'update_1.0.5.0_to_1.0.6.0.sql',
                     'wsdl_iclear_order.php',
                     'xtbcallback.php',
                     );

// set all directories to be deleted                     
$unlink_dir = array('admin/includes/javascript/images',
                    'admin/includes/javascript/ui',
                    'admin/includes/modules/carp',
                    'admin/includes/modules/magpierss',
                    'admin/includes/modules/magpierss/extlib',
                    'admin/rss',
                    'callback/pn_sofortueberweisung', // neu
                    'callback/sofort/library', // neu
                    'callback/sofort/ressources', // neu
                    'includes/classes/Smarty_2.6.22',
                    'includes/classes/Smarty_2.6.26',
                    'includes/iclear',
                    'includes/janolaw',
                    'shopstat');

// set all update sql files to be executed and deleted afterwards
$sql_update = array('_installer/update_1.0.6.2_to_1.0.6.3.sql');

$error='';
$success='';
if (isset($_POST['update']) && $_POST['update']==true) {

  foreach ($sql_update as $sql_update) {
  	sql_update($sql_update);
  }

  foreach ($unlink_file as $unlink) {
    if (file_exists(DIR_FS_DOCUMENT_ROOT.$unlink)) {    
      @unlink(DIR_FS_DOCUMENT_ROOT.$unlink) ? $success.=$unlink.'<br/>' : $error.=$unlink.'<br/>';
    }
  }
  foreach ($unlink_dir as $unlink) {
    if (is_dir(DIR_FS_DOCUMENT_ROOT.$unlink)) {  
      rrmdir(DIR_FS_DOCUMENT_ROOT.$unlink);
    }
  }    
  @unlink($_SERVER['SCRIPT_FILENAME']) ? $success.=$_SERVER['SCRIPT_FILENAME'].'<br/>' : $error.=$_SERVER['SCRIPT_FILENAME'].'<br/>';

  if (empty($error)) {
    $clean = true;
  }
}

function rrmdir($dir) {
  global $error, $success;
    foreach(glob($dir . '/*') as $file) {
        if(is_dir($file))
            rrmdir($file);
        else
            @unlink($file) ? $success.=$file.'<br/>' : $error.=$file.'<br/>';
    }
    @rmdir($dir) ? $success.=$dir.'<br/>' : $error.=$dir.'<br/>';
}

function remove_comments($sql, $remark) {
  $lines = explode("\n", $sql);
  $sql = '';
        
  $linecount = count($lines);
  $output = '';

  for ($i = 0; $i < $linecount; $i++)  {
    if (($i != ($linecount - 1)) || (strlen($lines[$i]) > 0)) {
      if ($lines[$i][0] != $remark) {
        $output .= $lines[$i] . "\n";
      } else {
        $output .= "\n";
      }
      $lines[$i] = '';
    }
  }      
  return $output;
}

function split_sql_file($sql, $delimiter) {

  //first remove comments
  $sql = remove_comments($sql, '#');
  
  // Split up our string into "possible" SQL statements.
  $tokens = explode($delimiter, $sql);

  $sql = '';
  $output = array();
  $matches = array();
  
  $token_count = count($tokens);
  for ($i = 0; $i < $token_count; $i++) {
  
    // Don't wanna add an empty string as the last thing in the array.
    if (($i != ($token_count - 1)) || (strlen($tokens[$i] > 0))) {
          
      // This is the total number of single quotes in the token.
      $total_quotes = preg_match_all("/'/", $tokens[$i], $matches);
      // Counts single quotes that are preceded by an odd number of backslashes, 
      // which means they're escaped quotes.
      $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$i], $matches);
       
      $unescaped_quotes = $total_quotes - $escaped_quotes;
      
      // If the number of unescaped quotes is even, then the delimiter did NOT occur inside a string literal.
      if (($unescaped_quotes % 2) == 0) {
        // It's a complete sql statement.
        $output[] = $tokens[$i];
        $tokens[$i] = '';
      } else {
        // incomplete sql statement. keep adding tokens until we have a complete one.
        // $temp will hold what we have so far.
        $temp = $tokens[$i] . $delimiter;
        $tokens[$i] = '';
        
        $complete_stmt = false;
        
        for ($j = $i + 1; (!$complete_stmt && ($j < $token_count)); $j++) {
          // This is the total number of single quotes in the token.
          $total_quotes = preg_match_all("/'/", $tokens[$j], $matches);
          // Counts single quotes that are preceded by an odd number of backslashes, 
          // which means they're escaped quotes.
          $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$j], $matches);
         
          $unescaped_quotes = $total_quotes - $escaped_quotes;
         
          if (($unescaped_quotes % 2) == 1) {
            // odd number of unescaped quotes. In combination with the previous incomplete
            // statement(s), we now have a complete statement. (2 odds always make an even)
            $output[] = $temp . $tokens[$j];
      
            $tokens[$j] = '';
            $temp = '';
            
            $complete_stmt = true;
            $i = $j;
          } else {
            // even number of unescaped quotes. We still don't have a complete statement. 
            // (1 odd and 1 even always make an odd)
            $temp .= $tokens[$j] . $delimiter;
            $tokens[$j] = '';
          }
        }
      }
    }
  }
  return $output;
}

function sql_update($file) {
  global $success;
  
  $sql_file = file_get_contents($file);
  $sql_array = (split_sql_file($sql_file, ';'));
  foreach ($sql_array as $sql) {
    $success .= $sql;
    $exists = false;
    if (preg_match("|[\z\s]?(?:ALTER TABLE?){1}[\z\s]+([^ ]*)[\z\s]+(?:ADD?){1}[\z\s]+([^ ]*)[\z\s]+([^ ]*)|", $sql, $matches)) {
      if ($matches[2] == strtoupper('INDEX')) {
        $check_query = xtc_db_query("SHOW KEYS FROM ".$matches[1]." WHERE Key_name='".$matches[3]."'");
        if (xtc_db_num_rows($check_query)>0) {
          xtc_db_query("ALTER TABLE ".$matches[1]." DROP INDEX ".$matches[3]);
        }
      } else {
        $check_query = xtc_db_query("SHOW COLUMNS FROM " . $matches[1]);
        while ($check = xtc_db_fetch_array($check_query)) {
          if ($check['Field']==$matches[2]) { 
            $exists = true;
          }
        }
      }
    }
    if (!$exists) {
      xtc_db_query($sql);
    }
    $success .= ' - <span style="color:red;">Success!</span><br/>';
  }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>modified eCommerce Shopsoftware Updater</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body { background: #eee; font-family: Arial, sans-serif; font-size: 12px;}
table,td,div { font-family: Arial, sans-serif; font-size: 12px;}
h1 { font-size: 18px; margin: 0; padding: 0; margin-bottom: 10px; }
</style>
</head>

<body>
<form name="update" method="post">
<table width="800" style="border:30px solid #fff;" border="0" align="center" cellpadding="20" cellspacing="0">
  <tr>
    <td height="95" colspan="2" align="center">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="http://www.modified-shop.org/forum/Themes/modified/images/logo.png" alt="modified eCommerce Shopsoftware" /></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr><td colspan="2" height="20px" style="border-top:1px solid #ccc; width:100%;"></td></tr>
  <tr>
    <td colspan="2">
      <table width="100%" border="0" cellpadding="10" cellspacing="0">
        <?php
        if (!empty($success)) {
        ?>
        <tr>
          <td valign="top">Erfolgreich gel&ouml;scht:</td>
          <td><?php echo $success; ?></td>
        </tr>
        <?php } elseif (!$clean) { ?>
        <tr>
          <td valign="top">Diese Dateien müssen gelöscht werden:</td>
          <td><?php echo implode('<br/>', $unlink_file); ?></td>
        </tr>
        <?php }
        if (!empty($error)) {
        ?>
        <tr>
          <td valign="top">Bitte diese Dateien und Verzeichnisse manuell l&ouml;schen:</td>
          <td><?php echo $error; ?></td>
        </tr>
        <?php } elseif (!$clean) { ?>
        <tr>
          <td valign="top">Diese Verzeichnisse müssen gelöscht werden:</td>
          <td><?php echo implode('<br/>', $unlink_dir); ?></td>
        </tr>
        <?php }  elseif ($clean) { ?>
        <tr>
          <td valign="top" colspan="2" align="center" style="border:1px solid green; width:100%;">Es wurden die Dateien und Verzeichnisse erfolgreich gelöscht.<br/>Bitte stellen Sie sicher, dass auch die Datei &quot;update.php&quot; vom Server entfernt wurde.</td>
        </tr>
        <?php } ?>        
      </table>
    </td>
  </tr>
  <?php if (!$clean) { ?>
  <tr>
    <td colspan="2"><input type="hidden" name="update" value="true" /><input type="submit" value="Ausf&uuml;hren" /></td>
  </tr>
  <?php } ?>
</table>
<br />
<div align="center" style="font-family:Arial, sans-serif; font-size:11px;"><?php echo '<a style="text-decoration:none;" href="http://www.modified-shop.org" target="_blank"><span style="color:#B0347E;">mod</span><span style="color:#6D6D6D;">ified eCommerce Shopsoftware</span></a><span style="color:#555555;">' . '&nbsp;' . '&copy;2009-' . date('Y') . '&nbsp;' . 'provides no warranty and is redistributable under the <a style="color:#555555;text-decoration:none;" href="http://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GNU General Public License (Version 2)</a><br />eCommerce Engine 2006 based on <a style="text-decoration:none; color:#555555;" href="http://www.xt-commerce.com/" rel="nofollow" target="_blank">xt:Commerce</a></span>'; ?></div>
</body>
</html>
