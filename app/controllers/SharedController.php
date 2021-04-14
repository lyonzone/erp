<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * ssr_pouchwt2_option_list Model Action
     * @return array
     */
	function ssr_pouchwt2_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT enter_prod AS value,enter_prod AS label FROM production";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * warehouse_production_option_list Model Action
     * @return array
     */
	function warehouse_production_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT enter_prod AS value,enter_prod AS label FROM production";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * warehouse_shift_option_list Model Action
     * @return array
     */
	function warehouse_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shifts";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * truck_no_of_wheel_option_list Model Action
     * @return array
     */
	function truck_no_of_wheel_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT no_of_wheels AS value,no_of_wheels AS label FROM wheel";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * truck_transporter_option_list Model Action
     * @return array
     */
	function truck_transporter_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT transporter_name AS value,transporter_name AS label FROM transporter";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * truck_truck_entry_option_list Model Action
     * @return array
     */
	function truck_truck_entry_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT truck AS value , truck AS label FROM inv ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * user_user_name_value_exist Model Action
     * @return array
     */
	function user_user_name_value_exist($val){
		$db = $this->GetModel();
		$db->where("user_name", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * pcro_production_option_list Model Action
     * @return array
     */
	function pcro_production_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT enter_prod AS value,enter_prod AS label FROM production";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * pcro_shift_option_list Model Action
     * @return array
     */
	function pcro_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shifts";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * bill_materials_material_name_option_list Model Action
     * @return array
     */
	function bill_materials_material_name_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT fg_material AS value,fg_material AS label FROM fg";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loading_wheels_option_list Model Action
     * @return array
     */
	function loading_wheels_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT no_of_wheels AS value,no_of_wheels AS label FROM wheel";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loading_transport_option_list Model Action
     * @return array
     */
	function loading_transport_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT transporter_name AS value,transporter_name AS label FROM transporter";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loading_depot_option_list Model Action
     * @return array
     */
	function loading_depot_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT depot AS value,depot AS label FROM depot";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loading_date_option_list Model Action
     * @return array
     */
	function loading_date_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT vehicle AS value , material_name AS label FROM bill_materials ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * loading_material_details_option_list Model Action
     * @return array
     */
	function loading_material_details_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT date AS value , material_name AS label FROM bill_materials ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * hold_shift_option_list Model Action
     * @return array
     */
	function hold_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shifts";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * crqs_shift_option_list Model Action
     * @return array
     */
	function crqs_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shifts";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * crqs_category_option_list Model Action
     * @return array
     */
	function crqs_category_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT date AS value , date AS label FROM defects ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * inv_verified_by_option_list Model Action
     * @return array
     */
	function inv_verified_by_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT signature AS value,signature AS label FROM user";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * unloading_materials_supplier_option_list Model Action
     * @return array
     */
	function unloading_materials_supplier_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT supplier_name AS value,supplier_name AS label FROM supplier";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * unloading_materials_material_name_option_list Model Action
     * @return array
     */
	function unloading_materials_material_name_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT material_name AS value,material_name AS label FROM material";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_w_product_option_list Model Action
     * @return array
     */
	function spotchk_w_product_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT enter_prod AS value,enter_prod AS label FROM production";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_w_shift_option_list Model Action
     * @return array
     */
	function spotchk_w_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shifts";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_w_addition_option_list Model Action
     * @return array
     */
	function spotchk_w_addition_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT date AS value , date AS label FROM spotchk_wh ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_w_remarks_option_list Model Action
     * @return array
     */
	function spotchk_w_remarks_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT date_time AS value , date_time AS label FROM spotchkwl_test ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_w_summary_option_list Model Action
     * @return array
     */
	function spotchk_w_summary_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT date AS value , date AS label FROM soptchk_remarks ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_w_acid_purity_option_list Model Action
     * @return array
     */
	function spotchk_w_acid_purity_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT datetime AS value , datetime AS label FROM acid_purity ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_w_acid_colour_option_list Model Action
     * @return array
     */
	function spotchk_w_acid_colour_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT datetime AS value , datetime AS label FROM acid_color ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_domex_product_option_list Model Action
     * @return array
     */
	function spotchk_domex_product_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT enter_prod AS value,enter_prod AS label FROM production";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_domex_shift_option_list Model Action
     * @return array
     */
	function spotchk_domex_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shifts";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_domex_addition_option_list Model Action
     * @return array
     */
	function spotchk_domex_addition_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT datetime AS value , datetime AS label FROM spotchk_domexad ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_domex_summary_option_list Model Action
     * @return array
     */
	function spotchk_domex_summary_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT datetime AS value , datetime AS label FROM spotchk_domexsum ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_ew_shift_option_list Model Action
     * @return array
     */
	function spotchk_ew_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shifts";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_ew_product_option_list Model Action
     * @return array
     */
	function spotchk_ew_product_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT enter_prod AS value,enter_prod AS label FROM production";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_ew_addition_option_list Model Action
     * @return array
     */
	function spotchk_ew_addition_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT datetime AS value , datetime AS label FROM spotchk_ewad ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * spotchk_ew_summary_option_list Model Action
     * @return array
     */
	function spotchk_ew_summary_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT datetime AS value , datetime AS label FROM spotchk_ewsum ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * pcro_register_shift_option_list Model Action
     * @return array
     */
	function pcro_register_shift_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT shift_name AS value,shift_name AS label FROM shifts";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * pcro_register_product_option_list Model Action
     * @return array
     */
	function pcro_register_product_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT enter_prod AS value,enter_prod AS label FROM production";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_etpwateranalysysregister Model Action
     * @return Value
     */
	function getcount_etpwateranalysysregister(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM etp";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_qualityincidentregister Model Action
     * @return Value
     */
	function getcount_qualityincidentregister(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM qir";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_acidcirculationregister Model Action
     * @return Value
     */
	function getcount_acidcirculationregister(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM acr";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_storagesamplerecord Model Action
     * @return Value
     */
	function getcount_storagesamplerecord(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM ssr";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_dailyanalysisregister Model Action
     * @return Value
     */
	function getcount_dailyanalysisregister(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM dar";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_pcroregister Model Action
     * @return Value
     */
	function getcount_pcroregister(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pcro";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_warehousecheckingregister Model Action
     * @return Value
     */
	function getcount_warehousecheckingregister(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM warehouse";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_holdlotinspection Model Action
     * @return Value
     */
	function getcount_holdlotinspection(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM hold";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_crqsregister Model Action
     * @return Value
     */
	function getcount_crqsregister(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM crqs";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_supplier Model Action
     * @return Value
     */
	function getcount_supplier(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM supplier";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_transporter Model Action
     * @return Value
     */
	function getcount_transporter(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM transporter";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_wheel Model Action
     * @return Value
     */
	function getcount_wheel(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM wheel";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_depot Model Action
     * @return Value
     */
	function getcount_depot(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM depot";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_materialfg Model Action
     * @return Value
     */
	function getcount_materialfg(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM fg";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_materialrmpm Model Action
     * @return Value
     */
	function getcount_materialrmpm(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM material";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_storagesamplerrecord Model Action
     * @return Value
     */
	function getcount_storagesamplerrecord(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM ssr";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_dailyanalysysregister Model Action
     * @return Value
     */
	function getcount_dailyanalysysregister(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM dar";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_pcroregister_2 Model Action
     * @return Value
     */
	function getcount_pcroregister_2(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pcro_register";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_spotcheckwheel Model Action
     * @return Value
     */
	function getcount_spotcheckwheel(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM spotchk_w";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_spotcheckdomex Model Action
     * @return Value
     */
	function getcount_spotcheckdomex(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM spotchk_domex";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_spotcheckeasywash Model Action
     * @return Value
     */
	function getcount_spotcheckeasywash(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM spotchk_ew";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_blutonc Model Action
     * @return Value
     */
	function getcount_blutonc(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM bluton_c";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_bluespeckle Model Action
     * @return Value
     */
	function getcount_bluespeckle(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM blue_speckle";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_colourantliquitintbluese Model Action
     * @return Value
     */
	function getcount_colourantliquitintbluese(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM colourant_liquitint_blue_se";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_emit2blend Model Action
     * @return Value
     */
	function getcount_emit2blend(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM emit_2_blend";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_drydispersedbluecolourant Model Action
     * @return Value
     */
	function getcount_drydispersedbluecolourant(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM dry_dispersed_blue_colourant";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_g1basepowderchina Model Action
     * @return Value
     */
	function getcount_g1basepowderchina(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM g1_base_powder_china";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_igniteperfume Model Action
     * @return Value
     */
	function getcount_igniteperfume(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM ignite_perfume";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_orangespeckle Model Action
     * @return Value
     */
	function getcount_orangespeckle(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM orange_speckle";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_perfumepele10 Model Action
     * @return Value
     */
	function getcount_perfumepele10(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM perfume_pele_10";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_pinkfeldspar Model Action
     * @return Value
     */
	function getcount_pinkfeldspar(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pink_feldspar";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_pinkpasneddles95percent Model Action
     * @return Value
     */
	function getcount_pinkpasneddles95percent(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pink_pas_neddles_95percent";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_pvdsalt Model Action
     * @return Value
     */
	function getcount_pvdsalt(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM pvd_salt";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_salamancaconcinde Model Action
     * @return Value
     */
	function getcount_salamancaconcinde(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM salamanca_concinde";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_sodaashdensespecklegrade Model Action
     * @return Value
     */
	function getcount_sodaashdensespecklegrade(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM soda_ash_dense_speckle_grade";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_sodaashlight Model Action
     * @return Value
     */
	function getcount_sodaashlight(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM soda_ash_light";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_sodaspeckleorangeviolet Model Action
     * @return Value
     */
	function getcount_sodaspeckleorangeviolet(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM soda_speckle_orange_violet";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_sodiumsolphite88percent Model Action
     * @return Value
     */
	function getcount_sodiumsolphite88percent(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM sodium_solphite_88percent";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_sodiumsulphate Model Action
     * @return Value
     */
	function getcount_sodiumsulphate(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM sodium_sulphate";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_sulphonicacid Model Action
     * @return Value
     */
	function getcount_sulphonicacid(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM sulphonic_acid";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_surfexceleasywashfg Model Action
     * @return Value
     */
	function getcount_surfexceleasywashfg(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM surf_excel_easy_wash_fg";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_tblendsavinasestainzymelipexmannaway Model Action
     * @return Value
     */
	function getcount_tblendsavinasestainzymelipexmannaway(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM t_blend_savinase_stainzyme_lipex_mannaway";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_tinopal Model Action
     * @return Value
     */
	function getcount_tinopal(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tinopal";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_whitepasneedles95percent Model Action
     * @return Value
     */
	function getcount_whitepasneedles95percent(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM white_pas_needles_95_percent";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_zeolite4aglobalstandarol Model Action
     * @return Value
     */
	function getcount_zeolite4aglobalstandarol(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM zeolite_4aglobal_standarol";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
