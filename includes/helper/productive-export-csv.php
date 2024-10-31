<?php
/**
 *
 * @package productive-commerce
 */

if ( !defined('ABSPATH') ) {
	die();
}

if ( ! class_exists( 'Productive_Commerce_Export_CSV' ) ) {

    /**
     * Productive_Commerce_Export_CSV
     */
    class Productive_Commerce_Export_CSV {
        
        public function get_csv_header( $data = array() ) {
            
        }
        
        public function get_csv_column_headers() {
            
            $column_headers = array();
            $column_headers[] = 'Product';
            $column_headers[] = 'User';
            $column_headers[] = 'Date Added';
            
            return $column_headers;
        }
        
        public function write_a_row( $csv_file, $data_row ) {
            fputcsv($csv_file, $data_row);
            return $csv_file;
        }
        
        public function write_rows( $csv_file, $data_rows ) {
            foreach ($data_rows as $data_row) {
              fputcsv($csv_file, $data_row);
            }
            return $csv_file;
        }
        
        public function get_export_file( $file_name ) {
            
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="' . $file_name . '"');
            header('Pragma: no-cache');
            header('Expires: 0');
            
            ob_end_clean();
            
            $csv_file = fopen('php://output', 'w');
            
            return $csv_file;
        }
        
    }
    
}