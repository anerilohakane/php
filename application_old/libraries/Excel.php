<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
require_once APPPATH."/third_party/PHPExcel.php"; 
 
class Excel extends PHPExcel { 
    public function __construct() {  
        parent::__construct(); 
        $CI =& get_instance();
    }

    function print_transcation_report($transcation_data)
    {
    	$CI =& get_instance(); 
    	/*date_default_timezone_set('Asia/kolkata');*/
    	$CI->load->library('excel');
    	PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
		// Set document properties
		
		$CI->excel->getProperties()->setCreator("Shivbandhan LPP")
							 	   ->setLastModifiedBy("Shivbandhan LPP")
							 	   ->setTitle('Transcation Report')
							 	   ->setSubject('Transcation Report')
							 	   ->setDescription("System Generated File.")
							 	   ->setKeywords("office 2007")
							 	   ->setCategory("Confidential");

		$allborders = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN, ), ), );


		//activate worksheet number 1
		$CI->excel->setActiveSheetIndex(0);
		$CI->excel->getActiveSheet()->getStyle("A1:N3")->getAlignment()->setWrapText(true);
		$CI->excel->getActiveSheet()->setTitle('Transcation Report');
		$CI->excel->getActiveSheet()->mergeCells('A1:N1') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A1:N1')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$CI->excel->getActiveSheet()->setCellValue('A2', 'Transcation Report');
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setName('Bookman Old Style');
        $CI->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$CI->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
		$CI->excel->getActiveSheet()->mergeCells('A2:N2') ->getStyle() ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('EEEEEEEE');
		$CI->excel->getActiveSheet()->getStyle('A2:N3')->applyFromArray($allborders);	
		$CI->excel->getActiveSheet()->getStyle('A2:N3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
 		$CI->excel->getActiveSheet()->setCellValue('A3', 'Sr. No.');
		$CI->excel->getActiveSheet()->setCellValue('B3', 'Name');		
		$CI->excel->getActiveSheet()->setCellValue('C3', 'Phone No');
		$CI->excel->getActiveSheet()->setCellValue('D3', 'Email Id');
		$CI->excel->getActiveSheet()->setCellValue('E3', 'Gender');
		$CI->excel->getActiveSheet()->setCellValue('F3', 'Transcation Id');
		$CI->excel->getActiveSheet()->setCellValue('G3', 'Mode');
		$CI->excel->getActiveSheet()->setCellValue('H3', 'Date');
		$CI->excel->getActiveSheet()->setCellValue('I3', 'Amount');
		$CI->excel->getActiveSheet()->setCellValue('J3', 'Invoice No');
		$CI->excel->getActiveSheet()->setCellValue('K3', 'Profile Code');
		$CI->excel->getActiveSheet()->setCellValue('L3', 'Package Name');
		$CI->excel->getActiveSheet()->setCellValue('M3', 'Package Start Date');
		$CI->excel->getActiveSheet()->setCellValue('N3', 'Validity (in Days)');

		$CI->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(30);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(40);							
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(40);	
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(9)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(10)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(11)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(12)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(13)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(14)->setWidth(40);
		$CI->excel->getActiveSheet()->getColumnDimensionByColumn(15)->setWidth(40);
		$CI->excel->getActiveSheet()->getStyle('A3:N3')->getFont()->setName('Bookman Old Style');
		$CI->excel->getActiveSheet()->getStyle('A3:N3')->getFont()->setSize(10);
		$CI->excel->getActiveSheet()->getStyle('A2:N3')->getFont()->setBold(true);															
		$CI->excel->getActiveSheet()->getStyle('A3:N3')->getFont()->getColor()->setRGB('FFFFFFFF');
		$CI->excel->getActiveSheet()->getStyle('A3:N3') ->getFill() ->setFillType(PHPExcel_Style_Fill::FILL_SOLID) ->getStartColor()->setARGB('FF428bca');
		$CI->excel->getActiveSheet()->getStyle('A3:N3')->applyFromArray($allborders);
		$CI->excel->getActiveSheet()->getStyle('A3:N3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		if(isset($transcation_data) && !empty($transcation_data))
		{
			$i=3;			
			$sr=0;
			foreach ($transcation_data as $key ) 
			{
				$sr++;
				$i++;
				$CI->excel->getActiveSheet()->setCellValue('A'.$i, $sr);
				$CI->excel->getActiveSheet()->setCellValue('B'.$i, (isset($key->customer_name) && !empty($key->customer_name))?$key->customer_name:'');
				$CI->excel->getActiveSheet()->setCellValue('C'.$i, (isset($key->mobile) && !empty($key->mobile))?$key->mobile:'');
				$CI->excel->getActiveSheet()->setCellValue('D'.$i, (isset($key->email) && !empty($key->email))?$key->email:'');	
				$CI->excel->getActiveSheet()->setCellValue('E'.$i, (isset($key->gender) && !empty($key->gender))?$key->gender:'');
				$CI->excel->getActiveSheet()->setCellValue('F'.$i, (isset($key->transcation_id) && !empty($key->transcation_id))?$key->transcation_id:'');	
				$CI->excel->getActiveSheet()->setCellValue('G'.$i, (isset($key->payment_mode) && !empty($key->payment_mode))?$key->payment_mode:'');
				$CI->excel->getActiveSheet()->setCellValue('H'.$i, (isset($key->created_on) && !empty($key->created_on))?date('d-m-Y',strtotime($key->created_on.' ')):'');
				
				$CI->excel->getActiveSheet()->setCellValue('I'.$i, (isset($key->membership_amt) && !empty($key->membership_amt))?$key->membership_amt:'');
				$CI->excel->getActiveSheet()->setCellValue('J'.$i, (isset($key->payment_id) && !empty($key->payment_id))?'SHIVBN000'.$key->payment_id:'');
				$CI->excel->getActiveSheet()->setCellValue('K'.$i, (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:'');
				$CI->excel->getActiveSheet()->setCellValue('L'.$i, (isset($key->membership_plan) && !empty($key->membership_plan))?$key->membership_plan.' Package':'');
				$CI->excel->getActiveSheet()->setCellValue('M'.$i, (isset($key->created_on) && !empty($key->created_on))?date('d-m-Y',strtotime($key->created_on.' ')):'');
				$CI->excel->getActiveSheet()->setCellValue('N'.$i, (isset($key->membership_validity) && !empty($key->membership_validity))?$key->membership_validity.' Days':'');

				$CI->excel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($allborders);				
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->getFont()->setName('Bookman Old Style');
		        $CI->excel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->getFont()->setSize(10);
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->applyFromArray($allborders);							
				$CI->excel->getActiveSheet()->getStyle('A'.$i.':N'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER) ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER) ->setWrapText(true);
			}
		}

		//$filename='order_data.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="transcation_report.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache

		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		//$objWriter->save(str_replace(__FILE__,'./upload/report',__FILE__));
		$objWriter->save('php://output'); 
    }
}