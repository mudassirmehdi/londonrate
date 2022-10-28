<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 include_once APPPATH.'/third_party/mpdf/mpdf.php';

class M_pdf {

    public $param;
    public $pdf;
	//$param = '"utf-8","A4","0","amiri",0,0,0,0,0,0'
    public function __construct()
    {
        #$this->param =$param;
		$mpdfConfig = array(
				'mode' => 'utf-8',
				'format' => 'A4',
				'default_font_size' => 0,
				'default_font' => 'amiri',
				'margin_left' => 1,
				'margin_right' => 1,
				'margin_top' => 1,
				'margin_bottom' => 1,
				'margin_header' => 1,
				'margin_footer' => 1,
				'orientation' => 'P',
			);
		#echo "<pre>";print_r($mpdfConfig);exit;	
        $this->pdf = new mPDF($mpdfConfig);
		#$this->pdf = new mPDF('utf-8', 'A4', 0, 'amiri', 1, 1, 1, 1, 8, 8);
    }
}
