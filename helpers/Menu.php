<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbartopleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'unloading_materials', 
			'label' => 'Inventory', 
			'icon' => '<i class="fa fa-clipboard "></i>'
		),
		
		array(
			'path' => 'inv/lab', 
			'label' => 'Lab', 
			'icon' => '<i class="fa fa-youtube-play "></i>'
		),
		
		array(
			'path' => 'loading', 
			'label' => 'Loading', 
			'icon' => '<i class="fa fa-flag-o "></i>'
		),
		
		array(
			'path' => 'truck', 
			'label' => 'Unloading', 
			'icon' => '<i class="fa fa-flag-checkered "></i>'
		),
		
		array(
			'path' => 'inv/commercial', 
			'label' => 'Commercial', 
			'icon' => '<i class="fa fa-eye-slash "></i>'
		),
		
		array(
			'path' => 'inv/Approval', 
			'label' => 'Approval', 
			'icon' => ''
		)
	);
		
	
	
			public static $red8 = array(
		array(
			"value" => "satisfactory", 
			"label" => "Satisfactory", 
		),
		array(
			"value" => "not satisfactory", 
			"label" => "Not Satisfactory", 
		),);
		
			public static $scatch = array(
		array(
			"value" => "passed", 
			"label" => "Passed", 
		),
		array(
			"value" => "failed", 
			"label" => "Failed", 
		),);
		
			public static $truck_exit = array(
		array(
			"value" => "exit", 
			"label" => "Exit", 
		),
		array(
			"value" => "not exit", 
			"label" => "Not Exit", 
		),);
		
			public static $user_role = array(
		array(
			"value" => "Administrator", 
			"label" => "Administrator", 
		),
		array(
			"value" => "User", 
			"label" => "User", 
		),
		array(
			"value" => "security", 
			"label" => "security", 
		),
		array(
			"value" => "loading", 
			"label" => "loading", 
		),
		array(
			"value" => "lab", 
			"label" => "lab", 
		),
		array(
			"value" => "inventory", 
			"label" => "inventory", 
		),
		array(
			"value" => "commercial", 
			"label" => "commercial", 
		),);
		
			public static $account_status = array(
		array(
			"value" => "Active", 
			"label" => "Active", 
		),
		array(
			"value" => "Pending", 
			"label" => "Pending", 
		),
		array(
			"value" => "Blocked", 
			"label" => "Blocked", 
		),);
		
			public static $vtype = array(
		array(
			"value" => "EICHER", 
			"label" => "Eicher", 
		),
		array(
			"value" => "TRUCK", 
			"label" => "Truck", 
		),
		array(
			"value" => "TATA 407", 
			"label" => "Tata 407", 
		),
		array(
			"value" => "TEMPO", 
			"label" => "Tempo", 
		),
		array(
			"value" => "TRAILER", 
			"label" => "Trailer", 
		),
		array(
			"value" => "TANKER", 
			"label" => "Tanker", 
		),);
		
			public static $defect_hr = array(
		array(
			"value" => "1st Hour Defects", 
			"label" => "1St Hour Defects", 
		),
		array(
			"value" => "2nd Hour Defects", 
			"label" => "2Nd Hour Defects", 
		),
		array(
			"value" => "3rd Hour Defects", 
			"label" => "3Rd Hour Defects", 
		),
		array(
			"value" => "4th Hour Defects", 
			"label" => "4Th Hour Defects", 
		),
		array(
			"value" => "5th Hour Defects", 
			"label" => "5Th Hour Defects", 
		),
		array(
			"value" => "6th Hour Defects", 
			"label" => "6Th Hour Defects", 
		),
		array(
			"value" => "7th Hour Defects", 
			"label" => "7Th Hour Defects", 
		),
		array(
			"value" => "8th Hour Defects", 
			"label" => "8Th Hour Defects", 
		),);
		
			public static $status = array(
		array(
			"value" => "accepted", 
			"label" => "Accepted", 
		),
		array(
			"value" => "rejected", 
			"label" => "Rejected", 
		),);
		
			public static $brand = array(
		array(
			"value" => "surf excel easy wash", 
			"label" => "Surf Excel Easy Wash", 
		),
		array(
			"value" => "wheel pink", 
			"label" => "Wheel Pink", 
		),
		array(
			"value" => "wheel blue", 
			"label" => "Wheel Blue", 
		),
		array(
			"value" => "domex", 
			"label" => "Domex", 
		),);
		
			public static $quality = array(
		array(
			"value" => "print-colour", 
			"label" => "Print-Colour", 
		),
		array(
			"value" => "print-text", 
			"label" => "Print-Text", 
		),
		array(
			"value" => "print-wrapper cut", 
			"label" => "Print-Wrapper Cut", 
		),
		array(
			"value" => "clean-dust", 
			"label" => "Clean-Dust", 
		),
		array(
			"value" => "clean-soil", 
			"label" => "Clean-Soil", 
		),
		array(
			"value" => "deviantion weight", 
			"label" => "Deviantion Weight", 
		),
		array(
			"value" => "internal leakage", 
			"label" => "Internal Leakage", 
		),
		array(
			"value" => "foreign bodies", 
			"label" => "Foreign Bodies", 
		),
		array(
			"value" => "sachet string precut", 
			"label" => "Sachet String Precut", 
		),
		array(
			"value" => "delamination", 
			"label" => "Delamination", 
		),
		array(
			"value" => "seal align", 
			"label" => "Seal Align", 
		),
		array(
			"value" => "seal-burn", 
			"label" => "Seal-Burn", 
		),
		array(
			"value" => "seal-damage", 
			"label" => "Seal-Damage", 
		),
		array(
			"value" => "seal join", 
			"label" => "Seal Join", 
		),
		array(
			"value" => "damage-crush", 
			"label" => "Damage-Crush", 
		),
		array(
			"value" => "damage-dent", 
			"label" => "Damage- Dent", 
		),
		array(
			"value" => "damage- crease", 
			"label" => "Damage-Crease", 
		),
		array(
			"value" => "damage-puncture", 
			"label" => "Damage-Puncture", 
		),
		array(
			"value" => "code-missing", 
			"label" => "Code-Missing", 
		),
		array(
			"value" => "code- illegible", 
			"label" => "Code-Illegible", 
		),
		array(
			"value" => "code- position", 
			"label" => "Code-Position", 
		),
		array(
			"value" => "foreigh matter", 
			"label" => "Foreigh Matter", 
		),
		array(
			"value" => "surface visual", 
			"label" => "Surface Visual", 
		),
		array(
			"value" => "color/efflorescence", 
			"label" => "Color/Efflorescence", 
		),
		array(
			"value" => "particle size", 
			"label" => "Particle Size", 
		),
		array(
			"value" => "lump formation", 
			"label" => "Lump Formation", 
		),
		array(
			"value" => "missing ingredient-specles", 
			"label" => "Missing IngredientSpecles", 
		),
		array(
			"value" => "perfume/flavour", 
			"label" => "Perfume/Flavour", 
		),
		array(
			"value" => "mismatch", 
			"label" => "Mismatch", 
		),
		array(
			"value" => "damages-scratches", 
			"label" => "Damages-Scratches", 
		),
		array(
			"value" => "scruffing / puncture", 
			"label" => "Scruffing / Puncture", 
		),
		array(
			"value" => "code-missing", 
			"label" => "Code-Missing", 
		),
		array(
			"value" => "code- illegible coding", 
			"label" => "Code-Illegible Coding", 
		),
		array(
			"value" => "code-not standard coding", 
			"label" => "Code-Not Standard Coding", 
		),
		array(
			"value" => "legal text", 
			"label" => "Legal Text", 
		),
		array(
			"value" => "nil", 
			"label" => "Nil", 
		),);
		
			public static $hour = array(
		array(
			"value" => "1 -2 hours", 
			"label" => "1 -2 Hours", 
		),
		array(
			"value" => "3-4 hours", 
			"label" => "3-4 Hours", 
		),
		array(
			"value" => "5-6 hours", 
			"label" => "5-6 Hours", 
		),
		array(
			"value" => "7-8 hours", 
			"label" => "7-8 Hours", 
		),);
		
			public static $defect_case = array(
		array(
			"value" => "on pack-defects", 
			"label" => "On Pack-Defects", 
		),
		array(
			"value" => "in pack-defects", 
			"label" => "In Pack-Defects", 
		),
		array(
			"value" => "out case-defects", 
			"label" => "Out Case-Defects", 
		),
		array(
			"value" => "nil", 
			"label" => "Nil", 
		),);
		
			public static $property = array(
		array(
			"value" => "print", 
			"label" => "Print", 
		),
		array(
			"value" => "cleanliness", 
			"label" => "Cleanliness", 
		),
		array(
			"value" => "product", 
			"label" => "Product", 
		),
		array(
			"value" => "assembly", 
			"label" => "Assembly", 
		),
		array(
			"value" => "closure", 
			"label" => "Closure", 
		),
		array(
			"value" => "damage", 
			"label" => "Damage", 
		),
		array(
			"value" => "code", 
			"label" => "Code", 
		),
		array(
			"value" => "aesthetic", 
			"label" => "Aesthetic", 
		),
		array(
			"value" => "nil", 
			"label" => "Nil", 
		),);
		
			public static $defect_type = array(
		array(
			"value" => "red", 
			"label" => "Red", 
		),
		array(
			"value" => "amber", 
			"label" => "Amber", 
		),
		array(
			"value" => "green", 
			"label" => "Green", 
		),
		array(
			"value" => "nil", 
			"label" => "Nil", 
		),);
		
			public static $verification = array(
		array(
			"value" => "ok", 
			"label" => "Ok", 
		),
		array(
			"value" => "not ok", 
			"label" => "Not Ok", 
		),);
		
			public static $commercial_approval = array(
		array(
			"value" => "approved", 
			"label" => "Approved", 
		),
		array(
			"value" => "not approved", 
			"label" => "Not Approved", 
		),);
		
			public static $material_type = array(
		array(
			"value" => "lab", 
			"label" => "Lab", 
		),
		array(
			"value" => "bill_materials", 
			"label" => "Bill_Materials", 
		),
		array(
			"value" => "blue_speckle", 
			"label" => "Blue_Speckle", 
		),
		array(
			"value" => "bluton_c", 
			"label" => "Bluton_C", 
		),
		array(
			"value" => "colourant_liquitint_blue_se", 
			"label" => "Colourant_Liquitint_Blue_Se", 
		),
		array(
			"value" => "dry_dispersed_blue_colourant", 
			"label" => "Dry_Dispersed_Blue_Colourant", 
		),
		array(
			"value" => "emit_2_blend", 
			"label" => "Emit_2_Blend", 
		),
		array(
			"value" => "forcal_u__pcc", 
			"label" => "Forcal_U__Pcc", 
		),
		array(
			"value" => "g1_base_powder_china", 
			"label" => "G1_Base_Powder_China", 
		),
		array(
			"value" => "ignite_perfume", 
			"label" => "Ignite_Perfume", 
		),
		array(
			"value" => "orange_speckle", 
			"label" => "Orange_Speckle", 
		),
		array(
			"value" => "perfume_pele_10", 
			"label" => "Perfume_Pele_10", 
		),
		array(
			"value" => "pink_feldspar", 
			"label" => "Pink_Feldspar", 
		),
		array(
			"value" => "pink_pas_neddles_95percent", 
			"label" => "Pink_Pas_Neddles_95Percent", 
		),
		array(
			"value" => "pvd_salt", 
			"label" => "Pvd_Salt", 
		),
		array(
			"value" => "salamanca_concinde", 
			"label" => "Salamanca_Concinde", 
		),
		array(
			"value" => "soda_ash_dense_speckle_grade", 
			"label" => "Soda_Ash_Dense_Speckle_Grade", 
		),
		array(
			"value" => "soda_ash_light", 
			"label" => "Soda_Ash_Light", 
		),
		array(
			"value" => "soda_speckle_orange_violet", 
			"label" => "Soda_Speckle_Orange_Violet", 
		),
		array(
			"value" => "sodium_solphite_88percent", 
			"label" => "Sodium_Solphite_88Percent", 
		),
		array(
			"value" => "sodium_sulphate", 
			"label" => "Sodium_Sulphate", 
		),
		array(
			"value" => "sulphonic_acid", 
			"label" => "Sulphonic_Acid", 
		),
		array(
			"value" => "surf_excel_easy_wash_fg", 
			"label" => "Surf_Excel_Easy_Wash_Fg", 
		),
		array(
			"value" => "tinopal", 
			"label" => "Tinopal", 
		),
		array(
			"value" => "t_blend_savinase_stainzyme_lipex_mannaway", 
			"label" => "T_Blend_Savinase_Stainzyme_Lipex_Mannaway", 
		),
		array(
			"value" => "white_pas_needles_95_percent", 
			"label" => "White_Pas_Needles_95_Percent", 
		),
		array(
			"value" => "zeolite_4aglobal_standarol", 
			"label" => "Zeolite_4Aglobal_Standarol", 
		),);
		
			public static $bags = array(
		array(
			"value" => "Bag", 
			"label" => "Bag", 
		),
		array(
			"value" => "Pc", 
			"label" => "Pc", 
		),
		array(
			"value" => "Kg", 
			"label" => "Kg", 
		),
		array(
			"value" => "Mt", 
			"label" => "Mt", 
		),);
		
			public static $coa = array(
		array(
			"value" => "available", 
			"label" => "Available", 
		),
		array(
			"value" => "not available", 
			"label" => "Not Available", 
		),);
		
			public static $addition = array(
		array(
			"value" => "Standard", 
			"label" => "Standard", 
		),
		array(
			"value" => "Actual", 
			"label" => "Actual", 
		),);
		
			public static $perfume = array(
		array(
			"value" => "Satisfactory", 
			"label" => "Satisfactory", 
		),
		array(
			"value" => "Not Satisfactory", 
			"label" => "Not Satisfactory", 
		),);
		
			public static $colour = array(
		array(
			"value" => "Light", 
			"label" => "Light", 
		),
		array(
			"value" => "Std", 
			"label" => "Std", 
		),
		array(
			"value" => "Dark", 
			"label" => "Dark", 
		),);
		
			public static $magnet_condn = array(
		array(
			"value" => "Ok", 
			"label" => "Ok", 
		),
		array(
			"value" => "Not Ok", 
			"label" => "Not Ok", 
		),);
		
			public static $addition2 = array(
		array(
			"value" => "Standard in Kg", 
			"label" => "Standard In Kg", 
		),
		array(
			"value" => "Actual in Kg", 
			"label" => "Actual In Kg", 
		),);
		
			public static $colour2 = array(
		array(
			"value" => "Light", 
			"label" => "Light", 
		),
		array(
			"value" => "Standard", 
			"label" => "Standard", 
		),
		array(
			"value" => "Dark", 
			"label" => "Dark", 
		),);
		
			public static $appearance = array(
		array(
			"value" => "Matches Standard", 
			"label" => "Matches Standard", 
		),
		array(
			"value" => "Not Matches Standard", 
			"label" => "Not Matches Standard", 
		),);
		
}