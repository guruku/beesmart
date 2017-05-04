<!-- TinyMCE 4.x -->
 
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
 
tinymce.init({
  selector: "textarea",
  
  // ===========================================
  // INCLUDE THE PLUGIN
  // ===========================================
	
  plugins: [
    "advlist lists charmap anchor",
    "code fullscreen",
    "table contextmenu paste"
  ],
	
  // ===========================================
  // PUT PLUGIN'S BUTTON on the toolbar
  // ===========================================
	
  toolbar: "insertfile undo redo | table  lists charmap | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
	
  // ===========================================
  // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
  // ===========================================
	
  relative_urls: false,
 forced_root_block : "", 
    force_br_newlines : true,
    force_p_newlines : false,
});
 
</script>
<!-- /TinyMCE -->
 <textarea name="soal<?php echo $i?>"></textarea>
   