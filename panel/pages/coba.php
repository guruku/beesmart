<script src="js/jquery.min.js"></script>
        <form action="anu.php">
            <p style="padding-bottom: 13px;"><em>Radio</em></p>
            
            <p><input type="radio" name="radio1" value="1" class="lcs_check lcs_tt2" autocomplete="off" /></p>
            
            <p><input type="radio" name="radio1" value="2" class="lcs_check lcs_tt2" disabled="disabled" autocomplete="off" /></p>
            
            <p><input type="radio" name="radio1" value="3" class="lcs_check lcs_tt2" checked="checked" autocomplete="off" /></p>
            <input type="submit">
        </form>
<script src="lc_switch.js" type="text/javascript"></script>
<link rel="stylesheet" href="lc_switch.css">
<script type="text/javascript">
$(document).ready(function(e) {
	$('input').lc_switch();

	// triggered each time a field changes status
	$('body').delegate('.lcs_check', 'lcs-statuschange', function() {
		var status = ($(this).is(':checked')) ? 'checked' : 'unchecked';
		console.log('field changed status: '+ status );
	});
	
	
	// triggered each time a field is checked
	$('body').delegate('.lcs_check', 'lcs-on', function() {
		console.log('field is checked');
	});
	
	
	// triggered each time a is unchecked
	$('body').delegate('.lcs_check', 'lcs-off', function() {
		console.log('field is unchecked');
	});
});
</script>