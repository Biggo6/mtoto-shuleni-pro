<?php


class PrintController extends BaseController{
	public function printResultSheet($data){
		

		$examlist_id = $data;
		$class_name = Input::get('class_name');

		$data = ["class_name"=>$class_name, "examlist_id"=>$examlist_id];

		$pdf = PDF::loadView('reports.resultsheet', $data);
		
		//$name = "result_sheet_" . time() . ".pdf";


		return $pdf->stream();;
		
	}
}