<script type="text/javascript" src="<?php echo _PATH_SCRIPT; ?>basicScript.js"></script>
<script type="text/javascript" src="<?php echo _PATH_SCRIPT; ?>jquery-2.0.2.min.js"></script>

<script src="<?php echo _PATH_BOOTSTRAP; ?>js/bootstrap.js"></script>  
<script src="<?php echo _PATH_BOOTSTRAP; ?>js/jquery.dataTables.min.js"></script>  
<script src="<?php echo _PATH_BOOTSTRAP; ?>js/dataTables.bootstrap.js"></script>  

<script type="text/javascript" src="<?php echo _PATH_SCRIPT; ?>bootstrap-select.js"></script>

<!--<script type='text/javascript' src='<?php echo _PATH_SCRIPT; ?>DataTables/js/jquery.dataTables.min.js'></script>-->
<!--<link rel='stylesheet' href='<?php echo _PATH_SCRIPT; ?>DataTables/css/jquery.dataTables.css' type='text/css' />-->
<script type="text/javascript">
  //Default class for odd and even rows
  $.fn.dataTableExt.oStdClasses.sStripeOdd = '';
  $.fn.dataTableExt.oStdClasses.sStripeEven = '';
  $.extend( $.fn.dataTable.defaults, {
    columnDefs: [
      { targets: 'no-sort', orderable: false }
    ],
    'iDisplayLength' : 25,
    'bAutoWidth' : false,
    'order': [1,'asc']
  });
</script>

<!--<script type='text/javascript' src='<?php echo _PATH_SCRIPT; ?>jquery-ui-1.8.21.custom/js/jquery-ui-1.8.21.custom.min.js'></script>-->
<!--<link rel='stylesheet' href='<?php echo _PATH_SCRIPT; ?>jquery-ui-1.8.21.custom/css/ui-lightness/jquery-ui-1.8.21.custom.css' type='text/css' />-->
<script type='text/javascript' src='<?php echo _PATH_SCRIPT; ?>jquery-ui-1.11.4/jquery-ui.js'></script>
<link rel='stylesheet' href='<?php echo _PATH_SCRIPT; ?>jquery-ui-1.11.4/jquery-ui.css' type='text/css' />
<script type="text/javascript">
  $.datepicker.setDefaults({
    //USA setting
    dateFormat:'yy-mm-dd',
    monthNames: ['January','February','March','April','May','June','July','August','September','October','November','December'],
    monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    dayNames: ['Sunday','monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
    dayNamesShort: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
    dayNamesMin: ['Sn','Mn','Tu','Wd','Th','Fr','St'],
    weekHeader: 'Wk',

    changeMonth:true,
    changeYear:true,
    showOtherMonths:true,
    selectOtherMonths: true
    });
</script>

<!--
<script type="text/javascript" src="<?php echo _PATH_SCRIPT; ?>tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
  tinyMCE.init({
    mode : "textareas",
    theme : "simple",
    editor_selector : "tinyMCE"
  });
</script>
-->

<script type="text/javascript" src="<?php echo _PATH_SCRIPT; ?>script.js"></script>
<script type="text/javascript" src="<?php echo _PATH_SCRIPT; ?>script_master.js"></script>

<script type="text/javascript">
  console.log("_script.php loaded");
</script>
