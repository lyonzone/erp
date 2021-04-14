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
		$sqltext = "SELECT DISTINCT sku AS value , sku AS label FROM defects ORDER BY label ASC";
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
     * getcount_user Model Action
     * @return Value
     */
	function getcount_user(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM user";
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

}
