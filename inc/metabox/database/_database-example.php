<?php
if ( ! class_exists( 'MB_Custom_Table_API' ) ) {
    return;
}
global $prefix;

    /*
    	PARAMETER 	DESCRIPTION
    	------------------------------
		table_name 	The custom table name. Required.
		columns 	Array of table columns, where key is the meta ID and value is the column definition (similar in SQL). Required.
		keys 		Array of key column IDs. Optional.

		@Table ex. MB_Custom_Table_API::create( $table_name, $columns, $keys = array() );
		@SQL ref: https://www.w3schools.com/sql/sql_datatypes.asp
		@Metabox ref: https://docs.metabox.io/extensions/mb-custom-table/
     */


MB_Custom_Table_API::create( "{$db_prefix}table_id", array(
	"field_id"	=> 'TEXT NOT NULL',
));