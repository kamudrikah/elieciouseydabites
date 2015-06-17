<?php
session_start();
if(session_destroy())
{
 ?>
    <script language="javascript">
   alert('You Are Logout');
   //window.navigate('<a href="../utama(pelajar).php">Untitled Document</a>');
   window.location.href="../index.php";
</script>

    <?php
}
?>