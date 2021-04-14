<?php
/**
 * Page Access Control
 * @category  RBAC Helper
 */
defined('ROOT') or exit('No direct script access allowed');
class ACL
{
	

	/**
	 * Array of user roles and page access 
	 * Use "*" to grant all access right to particular user role
	 * @var array
	 */
	public static $role_pages = array(
			'administrator' =>
						array(
							'acr' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'blue_speckle' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'bluton_c' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'colourant_liquitint_blue_se' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'dar' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'dry_dispersed_blue_colourant' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'emit_2_blend' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'etp' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'forcal_u' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'g1_base_powder_china' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ignite_perfume' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'material' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'orange_speckle' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'perfume_pele_10' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'pink_feldspar' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'pink_pas_neddles_95percent' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'pvd_salt' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'qir' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'salamanca_concinde' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'soda_ash_dense_speckle_grade' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'soda_ash_light' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'soda_speckle_orange_violet' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'sodium_solphite_88percent' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'sodium_sulphate' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'ssr' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'sulphonic_acid' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'surf_excel_easy_wash_fg' => array('list','view','add','edit', 'editfield','delete','import_data'),
							't_blend_savinase_stainzyme_lipex_mannaway' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'tinopal' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'warehouse' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'white_pas_needles_95_percent' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'zeolite_4aglobal_standarol' => array('list','view','add','edit', 'editfield','delete','import_data'),
							'supplier' => array('list','view','add','edit', 'editfield','delete'),
							'transporter' => array('list','view','add','edit', 'editfield','delete'),
							'truck' => array('list','view','add','edit', 'editfield','delete','loading_exit'),
							'user' => array('list','view','add','edit', 'editfield','delete','userregister','accountedit','accountview'),
							'wheel' => array('list','view','add','edit', 'editfield','delete'),
							'production' => array('list','view','add','edit', 'editfield','delete'),
							'shifts' => array('list','view','add','edit', 'editfield','delete'),
							'lab' => array('list','view','add','edit', 'editfield','delete'),
							'pcro' => array('list','view','add','edit', 'editfield','delete','list','view','add','edit', 'editfield','delete','list','view','add','edit', 'editfield','delete'),
							'lorry' => array('list','view','add','edit', 'editfield','delete'),
							'bill_materials' => array('list','view','add','edit', 'editfield','delete'),
							'depot' => array('list','view','add','edit', 'editfield','delete'),
							'fg' => array('list','view','add','edit', 'editfield','delete'),
							'loading' => array('list','view','add','edit', 'editfield','delete','loading_exit'),
							'hold' => array('list','view','add','edit', 'editfield','delete'),
							'crqs' => array('list','view','add','edit', 'editfield','delete'),
							'defects' => array('list','view','add','edit', 'editfield','delete'),
							'inv' => array('list','view','add','edit', 'editfield','delete','lab','approval'),
							'unloading_materials' => array('list','view','add','edit', 'editfield','delete'),
							'spotchk_w' => array('list','view','add','edit', 'editfield','delete'),
							'spotchk_wh' => array('list','view','add','edit', 'editfield','delete'),
							'spotchkwl_test' => array('list','view','add','edit', 'editfield','delete'),
							'soptchk_remarks' => array('list','view','add','edit', 'editfield','delete'),
							'acid_color' => array('list','view','add','edit', 'editfield','delete'),
							'acid_purity' => array('list','view','add','edit', 'editfield','delete'),
							'spotchk_domex' => array('list','view','add','edit', 'editfield','delete'),
							'spotchk_domexad' => array('list','view','add','edit', 'editfield','delete'),
							'spotchk_domexsum' => array('list','view','add','edit', 'editfield','delete'),
							'spotchk_ew' => array('list','view','add','edit', 'editfield','delete'),
							'spotchk_ewad' => array('list','view','add','edit', 'editfield','delete'),
							'spotchk_ewsum' => array('list','view','add','edit', 'editfield','delete'),
							'pcro_register' => array('list','view','add','edit', 'editfield','delete'),
							'pcro_wt' => array('list','view','add','edit', 'editfield','delete','pcro')
						),
		
			'user' =>
						array(
							'truck' => array('loading_exit'),
							'user' => array('userregister','accountedit','accountview'),
							'loading' => array('loading_exit'),
							'inv' => array('lab','approval')
						),
		
			'security' =>
						array(
							'material' => array('list','view','add'),
							'supplier' => array('list','view','add'),
							'transporter' => array('list','view','add'),
							'truck' => array('list','view','add','edit', 'editfield','loading_exit'),
							'wheel' => array('list','view','add'),
							'shifts' => array('list','view','add'),
							'lorry' => array('list','view','add'),
							'bill_materials' => array('list','view','add'),
							'depot' => array('list','view','add'),
							'fg' => array('list','view','add'),
							'loading' => array('list','view','add','edit', 'editfield','loading_exit'),
							'inv' => array('list','view','add'),
							'unloading_materials' => array('list','view','add')
						),
		
			'loading' =>
						array(
							'truck' => array('list','view','loading_exit'),
							'lorry' => array('list','view','add'),
							'bill_materials' => array('list','view'),
							'loading' => array('list','view','loading_exit'),
							'unloading_materials' => array('list','view')
						),
		
			'lab' =>
						array(
							'acr' => array('list','view','add'),
							'blue_speckle' => array('list','view','add'),
							'bluton_c' => array('list','view','add'),
							'colourant_liquitint_blue_se' => array('list','view','add'),
							'dar' => array('list','view','add'),
							'dry_dispersed_blue_colourant' => array('list','view','add'),
							'emit_2_blend' => array('list','view','add'),
							'etp' => array('list','view','add'),
							'forcal_u' => array('list','view','add'),
							'g1_base_powder_china' => array('list','view','add'),
							'ignite_perfume' => array('list','view','add'),
							'material' => array('list','view'),
							'orange_speckle' => array('list','view','add'),
							'perfume_pele_10' => array('list','view','add'),
							'pink_feldspar' => array('list','view','add'),
							'pink_pas_neddles_95percent' => array('list','view','add'),
							'pvd_salt' => array('list','view','add'),
							'qir' => array('list','view','add'),
							'salamanca_concinde' => array('list','view','add'),
							'soda_ash_dense_speckle_grade' => array('list','view','add'),
							'soda_ash_light' => array('list','view','add'),
							'soda_speckle_orange_violet' => array('list','view','add'),
							'sodium_solphite_88percent' => array('list','view','add'),
							'sodium_sulphate' => array('list','view','add'),
							'ssr' => array('list','view','add'),
							'sulphonic_acid' => array('list','view','add'),
							'surf_excel_easy_wash_fg' => array('list','view','add'),
							't_blend_savinase_stainzyme_lipex_mannaway' => array('list','view','add'),
							'tinopal' => array('list','view','add'),
							'warehouse' => array('list','view','add'),
							'white_pas_needles_95_percent' => array('list','view','add'),
							'zeolite_4aglobal_standarol' => array('list','view','add'),
							'supplier' => array('list','view'),
							'transporter' => array('list','view'),
							'truck' => array('list','loading_exit'),
							'wheel' => array('list','view'),
							'production' => array('list','view'),
							'shifts' => array('list','view'),
							'lab' => array('list','view'),
							'pcro' => array('list','view','add'),
							'lorry' => array('list','view'),
							'bill_materials' => array('list','view'),
							'depot' => array('list','view'),
							'fg' => array('list','view'),
							'loading' => array('list','view','loading_exit'),
							'hold' => array('list','view','add'),
							'crqs' => array('list','view','add'),
							'defects' => array('list','view','add'),
							'inv' => array('list','view','lab'),
							'unloading_materials' => array('list','view'),
							'spotchk_w' => array('list','view','add'),
							'spotchk_wh' => array('list','view','add'),
							'spotchkwl_test' => array('list','view','add'),
							'soptchk_remarks' => array('list','view','add'),
							'acid_color' => array('list','view','add'),
							'acid_purity' => array('list','view','add'),
							'spotchk_domex' => array('list','view','add'),
							'spotchk_domexad' => array('list','view','add'),
							'spotchk_domexsum' => array('list','view','add'),
							'spotchk_ew' => array('list','view','add'),
							'spotchk_ewad' => array('list','view','add'),
							'spotchk_ewsum' => array('list','view','add'),
							'pcro_register' => array('list','view','add'),
							'pcro_wt' => array('list','view','add','pcro')
						),
		
			'inventory' =>
						array(
							'acr' => array('list','view'),
							'blue_speckle' => array('list','view'),
							'bluton_c' => array('list','view'),
							'colourant_liquitint_blue_se' => array('list','view'),
							'dar' => array('list','view'),
							'dry_dispersed_blue_colourant' => array('list','view'),
							'emit_2_blend' => array('list','view'),
							'etp' => array('list','view'),
							'forcal_u' => array('list','view'),
							'g1_base_powder_china' => array('list','view'),
							'ignite_perfume' => array('list','view'),
							'material' => array('list','view'),
							'orange_speckle' => array('list','view'),
							'perfume_pele_10' => array('list','view'),
							'pink_feldspar' => array('list','view'),
							'pink_pas_neddles_95percent' => array('list','view'),
							'pvd_salt' => array('list','view'),
							'qir' => array('list'),
							'salamanca_concinde' => array('list','view'),
							'soda_ash_dense_speckle_grade' => array('list','view'),
							'soda_ash_light' => array('list','view'),
							'soda_speckle_orange_violet' => array('list','view'),
							'sodium_solphite_88percent' => array('list','view'),
							'sodium_sulphate' => array('list','view'),
							'ssr' => array('list','view'),
							'sulphonic_acid' => array('list','view'),
							'surf_excel_easy_wash_fg' => array('list','view'),
							't_blend_savinase_stainzyme_lipex_mannaway' => array('list','view'),
							'tinopal' => array('list','view'),
							'warehouse' => array('list','view'),
							'white_pas_needles_95_percent' => array('list','view'),
							'zeolite_4aglobal_standarol' => array('list','view'),
							'supplier' => array('list','view'),
							'transporter' => array('list','view'),
							'truck' => array('list','view'),
							'wheel' => array('list','view'),
							'production' => array('list','view'),
							'shifts' => array('list','view'),
							'lab' => array('list','view'),
							'pcro' => array('list','view'),
							'lorry' => array('list','view'),
							'bill_materials' => array('list','view'),
							'depot' => array('list','view'),
							'fg' => array('list','view'),
							'loading' => array('list','view'),
							'hold' => array('list','view'),
							'crqs' => array('list','view'),
							'defects' => array('list','view'),
							'inv' => array('list','view','add'),
							'unloading_materials' => array('list','view'),
							'spotchk_w' => array('list','view'),
							'spotchk_wh' => array('list','view'),
							'spotchkwl_test' => array('list','view'),
							'soptchk_remarks' => array('list','view'),
							'acid_color' => array('list','view'),
							'acid_purity' => array('list','view'),
							'spotchk_domex' => array('list','view'),
							'spotchk_domexad' => array('list','view'),
							'spotchk_domexsum' => array('list','view'),
							'spotchk_ew' => array('list','view'),
							'spotchk_ewad' => array('list','view'),
							'spotchk_ewsum' => array('list','view'),
							'pcro_register' => array('list','view'),
							'pcro_wt' => array('list','view','pcro')
						),
		
			'commercial' =>
						array(
							'acr' => array('list','view'),
							'blue_speckle' => array('list','view'),
							'bluton_c' => array('list','view'),
							'colourant_liquitint_blue_se' => array('list','view'),
							'dar' => array('list','view'),
							'dry_dispersed_blue_colourant' => array('list','view'),
							'emit_2_blend' => array('list','view'),
							'etp' => array('list','view'),
							'forcal_u' => array('list','view'),
							'g1_base_powder_china' => array('list','view'),
							'ignite_perfume' => array('list','view'),
							'material' => array('list','view'),
							'orange_speckle' => array('list','view'),
							'perfume_pele_10' => array('list','view'),
							'pink_feldspar' => array('list','view'),
							'pink_pas_neddles_95percent' => array('list','view'),
							'pvd_salt' => array('list','view'),
							'qir' => array('list','view'),
							'salamanca_concinde' => array('list','view'),
							'soda_ash_dense_speckle_grade' => array('list','view'),
							'soda_ash_light' => array('list','view'),
							'soda_speckle_orange_violet' => array('list','view'),
							'sodium_solphite_88percent' => array('list','view'),
							'sodium_sulphate' => array('list','view'),
							'ssr' => array('list','view'),
							'sulphonic_acid' => array('list','view'),
							'surf_excel_easy_wash_fg' => array('list','view'),
							't_blend_savinase_stainzyme_lipex_mannaway' => array('list','view'),
							'tinopal' => array('list','view'),
							'warehouse' => array('list','view'),
							'white_pas_needles_95_percent' => array('list','view'),
							'zeolite_4aglobal_standarol' => array('list','view'),
							'supplier' => array('list','view'),
							'transporter' => array('list','view'),
							'truck' => array('list','view','loading_exit'),
							'wheel' => array('list','view'),
							'production' => array('list','view'),
							'shifts' => array('list','view'),
							'lab' => array('list','view'),
							'pcro' => array('list','view'),
							'lorry' => array('list','view'),
							'bill_materials' => array('list','view'),
							'depot' => array('list','view'),
							'fg' => array('list','view'),
							'loading' => array('list','view','loading_exit'),
							'hold' => array('list','view'),
							'crqs' => array('list','view'),
							'defects' => array('list','view'),
							'inv' => array('list','edit', 'editfield','approval'),
							'unloading_materials' => array('list','view'),
							'spotchk_w' => array('list','view'),
							'spotchk_wh' => array('list','view'),
							'spotchkwl_test' => array('list','view'),
							'soptchk_remarks' => array('list','view'),
							'acid_color' => array('list','view'),
							'acid_purity' => array('list','view'),
							'spotchk_domex' => array('list','view'),
							'spotchk_domexad' => array('list','view'),
							'spotchk_domexsum' => array('list','view'),
							'spotchk_ew' => array('list','view'),
							'spotchk_ewad' => array('list','view'),
							'spotchk_ewsum' => array('list','view'),
							'pcro_register' => array('list','view'),
							'pcro_wt' => array('list','view','pcro')
						)
		);

	/**
	 * Current user role name
	 * @var string
	 */
	public static $user_role = null;

	/**
	 * pages to Exclude From Access Validation Check
	 * @var array
	 */
	public static $exclude_page_check = array("", "index", "home", "account", "info", "masterdetail");

	/**
	 * Init page properties
	 */
	public function __construct()
	{	
		if(!empty(USER_ROLE)){
			self::$user_role = USER_ROLE;
		}
	}

	/**
	 * Check page path against user role permissions
	 * if user has access return AUTHORIZED
	 * if user has NO access return UNAUTHORIZED
	 * if user has NO role return NO_ROLE
	 * @return string
	 */
	public static function GetPageAccess($path)
	{
		$rp = self::$role_pages;
		if ($rp == "*") {
			return AUTHORIZED; // Grant access to any user
		} else {
			$path = strtolower(trim($path, '/'));

			$arr_path = explode("/", $path);
			$page = strtolower($arr_path[0]);

			//If user is accessing excluded access contrl pages
			if (in_array($page, self::$exclude_page_check)) {
				return AUTHORIZED;
			}

			$user_role = strtolower(USER_ROLE); // Get user defined role from session value
			if (array_key_exists($user_role, $rp)) {
				$action = (!empty($arr_path[1]) ? $arr_path[1] : "list");
				if ($action == "index") {
					$action = "list";
				}
				//Check if user have access to all pages or user have access to all page actions
				if ($rp[$user_role] == "*" || (!empty($rp[$user_role][$page]) && $rp[$user_role][$page] == "*")) {
					return AUTHORIZED;
				} else {
					if (!empty($rp[$user_role][$page]) && in_array($action, $rp[$user_role][$page])) {
						return AUTHORIZED;
					}
				}
				return FORBIDDEN;
			} else {
				//User does not have any role.
				return NOROLE;
			}
		}
	}

	/**
	 * Check if user role has access to a page
	 * @return Bool
	 */
	public static function is_allowed($path)
	{
		return (self::GetPageAccess($path) == AUTHORIZED);
	}

}
