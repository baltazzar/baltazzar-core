<?php
	/*
		Give a simple file name, without special characteres.

		Sources:
			http://wordpress.stackexchange.com/questions/82193/rename-image-uploads-with-width-in-filename
			http://stackoverflow.com/questions/9838994/replace-special-characters-before-the-file-is-uploaded-using-php
			http://www.randomsequence.com/articles/removing-accented-utf-8-characters-with-php/
			http://www.phpliveregex.com/
	*/
	add_filter( 'wp_handle_upload_prefilter', 'modify_uploaded_file_names', 20);
	function modify_uploaded_file_names( $file ) {

		$tmp = $file['name'];

		// Get the file original extension
		preg_match("/(.*)(\.[^\.]+$)/", $tmp, $matched);
		$tmp = $matched[1];
		$extension = $matched[2];

		// To lower case
		$tmp = mb_strtolower($tmp,'UTF-8');

		// Replace accented characteres
		$search = explode( ","," ,ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u");
		$replace = explode(",","-,c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u");
		$tmp = str_replace($search, $replace, $tmp);

		// Remove anything that is not a-z, A-Z or 0-9
		$tmp = preg_replace("/[^a-zA-Z0-9\-]/", "", $tmp);

		// Re-structure uploaded image name
		$file['name'] = $tmp . $extension;

		return $file;
	}
?>