<?php
/**
* @title		joombig circle hover effects module
* @website		http://www.joombig.com
* @copyright	Copyright (C) 2014 joombig.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
    // no direct access
    defined('_JEXEC') or die('Restricted access');
	$mosConfig_absolute_path = JPATH_SITE;
	$mosConfig_live_site = JURI :: base();
	if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }

    $module_name             = basename(dirname(__FILE__));
    $module_dir              = dirname(__FILE__);
    $module_id               = $module->id;
    $document                = JFactory::getDocument();
    $style                   = $params->get('sp_style');

    if( empty($style) )
    {
        JFactory::getApplication()->enqueueMessage( 'Slider style no declared. Check joombig circle hover effects configuration and save again from admin panel' , 'error');
        return;
    }

    $layoutoverwritepath     = JURI::base(true) . '/templates/'.$document->template.'/html/'. $module_name. '/tmpl/'.$style;
    $document                = JFactory::getDocument();
    require_once $module_dir.'/helper.php';
    $helper = new mod_Circlehovereffects($params, $module_id);
    $data = (array) $helper->display();
	$width_module				= $params->get('width_module', "100%");
	$height_module				= $params->get('height_module', "350");
	$left_module				= $params->get('left_module', "0%");
	$width_item					= $params->get('width_item', "218");
	$border_circle				= $params->get('border_circle', "16");
	$border_color 				= $params->get('border_color', 0);
switch($border_color) {
	case 0	:	$border_color_real = "240,248,255";
	break; case 1	:	$border_color_real = "250,235,215";
	break; case 2	:	$border_color_real = "0,255,255";
	break; case 3	:	$border_color_real = "127,255,212";
	break; case 4	:	$border_color_real = "240,255,255";
	break; case 5	:	$border_color_real = "245,245,220";
	break; case 6	:	$border_color_real = "255,228,196";
	break; case 7	:	$border_color_real = "0,0,0";
	break; case 8	:	$border_color_real = "255,235,205";
	break; case 9	:	$border_color_real = "0,0,255";
	break; case 10	:	$border_color_real = "138,43,226";
	break; case 11	:	$border_color_real = "165,42,42";
	break; case 12	:	$border_color_real = "222,184,135";
	break; case 13	:	$border_color_real = "95,158,160";
	break; case 14	:	$border_color_real = "127,255,0";
	break; case 15	:	$border_color_real = "210,105,30";
	break; case 16	:	$border_color_real = "255,127,80";
	break; case 17	:	$border_color_real = "100,149,237";
	break; case 18	:	$border_color_real = "255,248,220";
	break; case 19	:	$border_color_real = "220,20,60";
	break; case 20	:	$border_color_real = "0,255,255";
	break; case 21	:	$border_color_real = "0,0,139";
	break; case 22	:	$border_color_real = "0,139,139";
	break; case 23	:	$border_color_real = "184,134,11";
	break; case 24	:	$border_color_real = "169,169,169";
	break; case 25	:	$border_color_real = "0,100,0";
	break; case 26	:	$border_color_real = "189,183,107";
	break; case 27	:	$border_color_real = "139,0,139";
	break; case 28	:	$border_color_real = "85,107,47";
	break; case 29	:	$border_color_real = "255,140,0";
	break; case 30	:	$border_color_real = "153,50,204";
	break; case 31	:	$border_color_real = "139,0,0";
	break; case 32	:	$border_color_real = "233,150,122";
	break; case 33	:	$border_color_real = "143,188,143";
	break; case 34	:	$border_color_real = "72,61,139";
	break; case 35	:	$border_color_real = "47,79,79";
	break; case 36	:	$border_color_real = "0,206,209";
	break; case 37	:	$border_color_real = "148,0,211";
	break; case 38	:	$border_color_real = "255,20,147";
	break; case 39	:	$border_color_real = "0,191,255";
	break; case 40	:	$border_color_real = "105,105,105";
	break; case 41	:	$border_color_real = "30,144,255";
	break; case 42	:	$border_color_real = "178,34,34";
	break; case 43	:	$border_color_real = "255,250,240";
	break; case 44	:	$border_color_real = "34,139,34";
	break; case 45	:	$border_color_real = "255,0,255";
	break; case 46	:	$border_color_real = "220,220,220";
	break; case 47	:	$border_color_real = "248,248,255";
	break; case 48	:	$border_color_real = "255,215,0";
	break; case 49	:	$border_color_real = "218,165,32";
	break; case 50	:	$border_color_real = "128,128,128";
	break; case 51	:	$border_color_real = "0,128,0";
	break; case 52	:	$border_color_real = "173,255,47";
	break; case 53	:	$border_color_real = "240,255,240";
	break; case 54	:	$border_color_real = "255,105,180";
	break; case 55	:	$border_color_real = "205,92,92";
	break; case 56	:	$border_color_real = "75,0,130";
	break; case 57	:	$border_color_real = "255,255,240";
	break; case 58	:	$border_color_real = "240,230,140";
	break; case 59	:	$border_color_real = "230,230,250";
	break; case 60	:	$border_color_real = "255,240,245";
	break; case 61	:	$border_color_real = "124,252,0";
	break; case 62	:	$border_color_real = "255,250,205";
	break; case 63	:	$border_color_real = "173,216,230";
	break; case 64	:	$border_color_real = "240,128,128";
	break; case 65	:	$border_color_real = "224,255,255";
	break; case 66	:	$border_color_real = "250,250,210";
	break; case 67	:	$border_color_real = "211,211,211";
	break; case 68	:	$border_color_real = "144,238,144";
	break; case 69	:	$border_color_real = "255,182,193";
	break; case 70	:	$border_color_real = "255,160,122";
	break; case 71	:	$border_color_real = "32,178,170";
	break; case 72	:	$border_color_real = "135,206,250";
	break; case 73	:	$border_color_real = "119,136,153";
	break; case 74	:	$border_color_real = "176,196,222";
	break; case 75	:	$border_color_real = "255,255,224";
	break; case 76	:	$border_color_real = "0,255,0";
	break; case 77	:	$border_color_real = "50,205,50";
	break; case 78	:	$border_color_real = "250,240,230";
	break; case 79	:	$border_color_real = "255,0,255";
	break; case 80	:	$border_color_real = "128,0,0";
	break; case 81	:	$border_color_real = "102,205,170";
	break; case 82	:	$border_color_real = "0,0,205";
	break; case 83	:	$border_color_real = "186,85,211";
	break; case 84	:	$border_color_real = "147,112,219";
	break; case 85	:	$border_color_real = "60,179,113";
	break; case 86	:	$border_color_real = "123,104,238";
	break; case 87	:	$border_color_real = "0,250,154";
	break; case 88	:	$border_color_real = "72,209,204";
	break; case 89	:	$border_color_real = "199,21,133";
	break; case 90	:	$border_color_real = "25,25,112";
	break; case 91	:	$border_color_real = "245,255,250";
	break; case 92	:	$border_color_real = "255,228,225";
	break; case 93	:	$border_color_real = "255,228,181";
	break; case 94	:	$border_color_real = "255,222,173";
	break; case 95	:	$border_color_real = "0,0,128";
	break; case 96	:	$border_color_real = "253,245,230";
	break; case 97	:	$border_color_real = "128,128,0";
	break; case 98	:	$border_color_real = "107,142,35";
	break; case 99	:	$border_color_real = "255,165,0";
	break; case 100	:	$border_color_real = "255,69,0";
	break; case 101	:	$border_color_real = "218,112,214";
	break; case 102	:	$border_color_real = "238,232,170";
	break; case 103	:	$border_color_real = "152,251,152";
	break; case 104	:	$border_color_real = "175,238,238";
	break; case 105	:	$border_color_real = "219,112,147";
	break; case 106	:	$border_color_real = "255,239,213";
	break; case 107	:	$border_color_real = "255,218,185";
	break; case 108	:	$border_color_real = "205,133,63";
	break; case 109	:	$border_color_real = "255,192,203";
	break; case 110	:	$border_color_real = "221,160,221";
	break; case 111	:	$border_color_real = "176,224,230";
	break; case 112	:	$border_color_real = "128,0,128";
	break; case 113	:	$border_color_real = "255,0,0";
	break; case 114	:	$border_color_real = "188,143,143";
	break; case 115	:	$border_color_real = "65,105,225";
	break; case 116	:	$border_color_real = "139,69,19";
	break; case 117	:	$border_color_real = "250,128,114";
	break; case 118	:	$border_color_real = "244,164,96";
	break; case 119	:	$border_color_real = "46,139,87";
	break; case 120	:	$border_color_real = "255,245,238";
	break; case 121	:	$border_color_real = "160,82,45";
	break; case 122	:	$border_color_real = "192,192,192";
	break; case 123	:	$border_color_real = "135,206,235";
	break; case 124	:	$border_color_real = "106,90,205";
	break; case 125	:	$border_color_real = "112,128,144";
	break; case 126	:	$border_color_real = "255,250,250";
	break; case 127	:	$border_color_real = "0,255,127";
	break; case 128	:	$border_color_real = "70,130,180";
	break; case 129	:	$border_color_real = "210,180,140";
	break; case 130	:	$border_color_real = "0,128,128";
	break; case 131	:	$border_color_real = "216,191,216";
	break; case 132	:	$border_color_real = "255,99,71";
	break; case 133	:	$border_color_real = "64,224,208";
	break; case 134	:	$border_color_real = "238,130,238";
	break; case 135	:	$border_color_real = "245,222,179";
	break; case 136	:	$border_color_real = "255,255,255";
	break; case 137	:	$border_color_real = "245,245,245";
	break; case 138	:	$border_color_real = "255,255,0";
	break; case 139	:	$border_color_real = "154,205,50";
	break; 
}
	
	$distance					= $params->get('distance', "10");
	$distance_bottom			= $params->get('distance_bottom', "0");
	$dis_background_hover 		= $params->get('dis_background_hover', 1);
	$background_hover 			= $params->get('background_hover', 0);
switch($background_hover) {
	case 0	:	$background_color_hover = "240,248,255";
	break; case 1	:	$background_color_hover = "250,235,215";
	break; case 2	:	$background_color_hover = "0,255,255";
	break; case 3	:	$background_color_hover = "127,255,212";
	break; case 4	:	$background_color_hover = "240,255,255";
	break; case 5	:	$background_color_hover = "245,245,220";
	break; case 6	:	$background_color_hover = "255,228,196";
	break; case 7	:	$background_color_hover = "0,0,0";
	break; case 8	:	$background_color_hover = "255,235,205";
	break; case 9	:	$background_color_hover = "0,0,255";
	break; case 10	:	$background_color_hover = "138,43,226";
	break; case 11	:	$background_color_hover = "165,42,42";
	break; case 12	:	$background_color_hover = "222,184,135";
	break; case 13	:	$background_color_hover = "95,158,160";
	break; case 14	:	$background_color_hover = "127,255,0";
	break; case 15	:	$background_color_hover = "210,105,30";
	break; case 16	:	$background_color_hover = "255,127,80";
	break; case 17	:	$background_color_hover = "100,149,237";
	break; case 18	:	$background_color_hover = "255,248,220";
	break; case 19	:	$background_color_hover = "220,20,60";
	break; case 20	:	$background_color_hover = "0,255,255";
	break; case 21	:	$background_color_hover = "0,0,139";
	break; case 22	:	$background_color_hover = "0,139,139";
	break; case 23	:	$background_color_hover = "184,134,11";
	break; case 24	:	$background_color_hover = "169,169,169";
	break; case 25	:	$background_color_hover = "0,100,0";
	break; case 26	:	$background_color_hover = "189,183,107";
	break; case 27	:	$background_color_hover = "139,0,139";
	break; case 28	:	$background_color_hover = "85,107,47";
	break; case 29	:	$background_color_hover = "255,140,0";
	break; case 30	:	$background_color_hover = "153,50,204";
	break; case 31	:	$background_color_hover = "139,0,0";
	break; case 32	:	$background_color_hover = "233,150,122";
	break; case 33	:	$background_color_hover = "143,188,143";
	break; case 34	:	$background_color_hover = "72,61,139";
	break; case 35	:	$background_color_hover = "47,79,79";
	break; case 36	:	$background_color_hover = "0,206,209";
	break; case 37	:	$background_color_hover = "148,0,211";
	break; case 38	:	$background_color_hover = "255,20,147";
	break; case 39	:	$background_color_hover = "0,191,255";
	break; case 40	:	$background_color_hover = "105,105,105";
	break; case 41	:	$background_color_hover = "30,144,255";
	break; case 42	:	$background_color_hover = "178,34,34";
	break; case 43	:	$background_color_hover = "255,250,240";
	break; case 44	:	$background_color_hover = "34,139,34";
	break; case 45	:	$background_color_hover = "255,0,255";
	break; case 46	:	$background_color_hover = "220,220,220";
	break; case 47	:	$background_color_hover = "248,248,255";
	break; case 48	:	$background_color_hover = "255,215,0";
	break; case 49	:	$background_color_hover = "218,165,32";
	break; case 50	:	$background_color_hover = "128,128,128";
	break; case 51	:	$background_color_hover = "0,128,0";
	break; case 52	:	$background_color_hover = "173,255,47";
	break; case 53	:	$background_color_hover = "240,255,240";
	break; case 54	:	$background_color_hover = "255,105,180";
	break; case 55	:	$background_color_hover = "205,92,92";
	break; case 56	:	$background_color_hover = "75,0,130";
	break; case 57	:	$background_color_hover = "255,255,240";
	break; case 58	:	$background_color_hover = "240,230,140";
	break; case 59	:	$background_color_hover = "230,230,250";
	break; case 60	:	$background_color_hover = "255,240,245";
	break; case 61	:	$background_color_hover = "124,252,0";
	break; case 62	:	$background_color_hover = "255,250,205";
	break; case 63	:	$background_color_hover = "173,216,230";
	break; case 64	:	$background_color_hover = "240,128,128";
	break; case 65	:	$background_color_hover = "224,255,255";
	break; case 66	:	$background_color_hover = "250,250,210";
	break; case 67	:	$background_color_hover = "211,211,211";
	break; case 68	:	$background_color_hover = "144,238,144";
	break; case 69	:	$background_color_hover = "255,182,193";
	break; case 70	:	$background_color_hover = "255,160,122";
	break; case 71	:	$background_color_hover = "32,178,170";
	break; case 72	:	$background_color_hover = "135,206,250";
	break; case 73	:	$background_color_hover = "119,136,153";
	break; case 74	:	$background_color_hover = "176,196,222";
	break; case 75	:	$background_color_hover = "255,255,224";
	break; case 76	:	$background_color_hover = "0,255,0";
	break; case 77	:	$background_color_hover = "50,205,50";
	break; case 78	:	$background_color_hover = "250,240,230";
	break; case 79	:	$background_color_hover = "255,0,255";
	break; case 80	:	$background_color_hover = "128,0,0";
	break; case 81	:	$background_color_hover = "102,205,170";
	break; case 82	:	$background_color_hover = "0,0,205";
	break; case 83	:	$background_color_hover = "186,85,211";
	break; case 84	:	$background_color_hover = "147,112,219";
	break; case 85	:	$background_color_hover = "60,179,113";
	break; case 86	:	$background_color_hover = "123,104,238";
	break; case 87	:	$background_color_hover = "0,250,154";
	break; case 88	:	$background_color_hover = "72,209,204";
	break; case 89	:	$background_color_hover = "199,21,133";
	break; case 90	:	$background_color_hover = "25,25,112";
	break; case 91	:	$background_color_hover = "245,255,250";
	break; case 92	:	$background_color_hover = "255,228,225";
	break; case 93	:	$background_color_hover = "255,228,181";
	break; case 94	:	$background_color_hover = "255,222,173";
	break; case 95	:	$background_color_hover = "0,0,128";
	break; case 96	:	$background_color_hover = "253,245,230";
	break; case 97	:	$background_color_hover = "128,128,0";
	break; case 98	:	$background_color_hover = "107,142,35";
	break; case 99	:	$background_color_hover = "255,165,0";
	break; case 100	:	$background_color_hover = "255,69,0";
	break; case 101	:	$background_color_hover = "218,112,214";
	break; case 102	:	$background_color_hover = "238,232,170";
	break; case 103	:	$background_color_hover = "152,251,152";
	break; case 104	:	$background_color_hover = "175,238,238";
	break; case 105	:	$background_color_hover = "219,112,147";
	break; case 106	:	$background_color_hover = "255,239,213";
	break; case 107	:	$background_color_hover = "255,218,185";
	break; case 108	:	$background_color_hover = "205,133,63";
	break; case 109	:	$background_color_hover = "255,192,203";
	break; case 110	:	$background_color_hover = "221,160,221";
	break; case 111	:	$background_color_hover = "176,224,230";
	break; case 112	:	$background_color_hover = "128,0,128";
	break; case 113	:	$background_color_hover = "255,0,0";
	break; case 114	:	$background_color_hover = "188,143,143";
	break; case 115	:	$background_color_hover = "65,105,225";
	break; case 116	:	$background_color_hover = "139,69,19";
	break; case 117	:	$background_color_hover = "250,128,114";
	break; case 118	:	$background_color_hover = "244,164,96";
	break; case 119	:	$background_color_hover = "46,139,87";
	break; case 120	:	$background_color_hover = "255,245,238";
	break; case 121	:	$background_color_hover = "160,82,45";
	break; case 122	:	$background_color_hover = "192,192,192";
	break; case 123	:	$background_color_hover = "135,206,235";
	break; case 124	:	$background_color_hover = "106,90,205";
	break; case 125	:	$background_color_hover = "112,128,144";
	break; case 126	:	$background_color_hover = "255,250,250";
	break; case 127	:	$background_color_hover = "0,255,127";
	break; case 128	:	$background_color_hover = "70,130,180";
	break; case 129	:	$background_color_hover = "210,180,140";
	break; case 130	:	$background_color_hover = "0,128,128";
	break; case 131	:	$background_color_hover = "216,191,216";
	break; case 132	:	$background_color_hover = "255,99,71";
	break; case 133	:	$background_color_hover = "64,224,208";
	break; case 134	:	$background_color_hover = "238,130,238";
	break; case 135	:	$background_color_hover = "245,222,179";
	break; case 136	:	$background_color_hover = "255,255,255";
	break; case 137	:	$background_color_hover = "245,245,245";
	break; case 138	:	$background_color_hover = "255,255,0";
	break; case 139	:	$background_color_hover = "154,205,50";
	break; 
}
	
	$show_title 				= $params->get('show_title', 1);
	$font_size_title 			= $params->get('font_size_title', "24");
	$color_title 				= $params->get('color_title', "#171717");
	$font_weight_title          = $params->get('font_weight_title', "20");
	
	$show_des 					= $params->get('show_des', 1);
	$font_size_des 				= $params->get('font_size_des', "14");
	$font_weight_des 			= $params->get('font_weight_des', "14");
	$color_des 					= $params->get('color_des', "#171717");
	
	$show_readmore 				= $params->get('show_readmore', 1);
	$readmore_text 				= $params->get('readmore_text', "more");
	
	$font_size_readmore			= $params->get('font_size_readmore', "12");
	$font_size_readmoreinfo		= $params->get('font_size_readmoreinfo', "10");
	$color_readmore 			= $params->get('color_readmore', 0);
switch($color_readmore) {
	case 0	:	$color_readmore_rgb = "240,248,255";
	break; case 1	:	$color_readmore_rgb = "250,235,215";
	break; case 2	:	$color_readmore_rgb = "0,255,255";
	break; case 3	:	$color_readmore_rgb = "127,255,212";
	break; case 4	:	$color_readmore_rgb = "240,255,255";
	break; case 5	:	$color_readmore_rgb = "245,245,220";
	break; case 6	:	$color_readmore_rgb = "255,228,196";
	break; case 7	:	$color_readmore_rgb = "0,0,0";
	break; case 8	:	$color_readmore_rgb = "255,235,205";
	break; case 9	:	$color_readmore_rgb = "0,0,255";
	break; case 10	:	$color_readmore_rgb = "138,43,226";
	break; case 11	:	$color_readmore_rgb = "165,42,42";
	break; case 12	:	$color_readmore_rgb = "222,184,135";
	break; case 13	:	$color_readmore_rgb = "95,158,160";
	break; case 14	:	$color_readmore_rgb = "127,255,0";
	break; case 15	:	$color_readmore_rgb = "210,105,30";
	break; case 16	:	$color_readmore_rgb = "255,127,80";
	break; case 17	:	$color_readmore_rgb = "100,149,237";
	break; case 18	:	$color_readmore_rgb = "255,248,220";
	break; case 19	:	$color_readmore_rgb = "220,20,60";
	break; case 20	:	$color_readmore_rgb = "0,255,255";
	break; case 21	:	$color_readmore_rgb = "0,0,139";
	break; case 22	:	$color_readmore_rgb = "0,139,139";
	break; case 23	:	$color_readmore_rgb = "184,134,11";
	break; case 24	:	$color_readmore_rgb = "169,169,169";
	break; case 25	:	$color_readmore_rgb = "0,100,0";
	break; case 26	:	$color_readmore_rgb = "189,183,107";
	break; case 27	:	$color_readmore_rgb = "139,0,139";
	break; case 28	:	$color_readmore_rgb = "85,107,47";
	break; case 29	:	$color_readmore_rgb = "255,140,0";
	break; case 30	:	$color_readmore_rgb = "153,50,204";
	break; case 31	:	$color_readmore_rgb = "139,0,0";
	break; case 32	:	$color_readmore_rgb = "233,150,122";
	break; case 33	:	$color_readmore_rgb = "143,188,143";
	break; case 34	:	$color_readmore_rgb = "72,61,139";
	break; case 35	:	$color_readmore_rgb = "47,79,79";
	break; case 36	:	$color_readmore_rgb = "0,206,209";
	break; case 37	:	$color_readmore_rgb = "148,0,211";
	break; case 38	:	$color_readmore_rgb = "255,20,147";
	break; case 39	:	$color_readmore_rgb = "0,191,255";
	break; case 40	:	$color_readmore_rgb = "105,105,105";
	break; case 41	:	$color_readmore_rgb = "30,144,255";
	break; case 42	:	$color_readmore_rgb = "178,34,34";
	break; case 43	:	$color_readmore_rgb = "255,250,240";
	break; case 44	:	$color_readmore_rgb = "34,139,34";
	break; case 45	:	$color_readmore_rgb = "255,0,255";
	break; case 46	:	$color_readmore_rgb = "220,220,220";
	break; case 47	:	$color_readmore_rgb = "248,248,255";
	break; case 48	:	$color_readmore_rgb = "255,215,0";
	break; case 49	:	$color_readmore_rgb = "218,165,32";
	break; case 50	:	$color_readmore_rgb = "128,128,128";
	break; case 51	:	$color_readmore_rgb = "0,128,0";
	break; case 52	:	$color_readmore_rgb = "173,255,47";
	break; case 53	:	$color_readmore_rgb = "240,255,240";
	break; case 54	:	$color_readmore_rgb = "255,105,180";
	break; case 55	:	$color_readmore_rgb = "205,92,92";
	break; case 56	:	$color_readmore_rgb = "75,0,130";
	break; case 57	:	$color_readmore_rgb = "255,255,240";
	break; case 58	:	$color_readmore_rgb = "240,230,140";
	break; case 59	:	$color_readmore_rgb = "230,230,250";
	break; case 60	:	$color_readmore_rgb = "255,240,245";
	break; case 61	:	$color_readmore_rgb = "124,252,0";
	break; case 62	:	$color_readmore_rgb = "255,250,205";
	break; case 63	:	$color_readmore_rgb = "173,216,230";
	break; case 64	:	$color_readmore_rgb = "240,128,128";
	break; case 65	:	$color_readmore_rgb = "224,255,255";
	break; case 66	:	$color_readmore_rgb = "250,250,210";
	break; case 67	:	$color_readmore_rgb = "211,211,211";
	break; case 68	:	$color_readmore_rgb = "144,238,144";
	break; case 69	:	$color_readmore_rgb = "255,182,193";
	break; case 70	:	$color_readmore_rgb = "255,160,122";
	break; case 71	:	$color_readmore_rgb = "32,178,170";
	break; case 72	:	$color_readmore_rgb = "135,206,250";
	break; case 73	:	$color_readmore_rgb = "119,136,153";
	break; case 74	:	$color_readmore_rgb = "176,196,222";
	break; case 75	:	$color_readmore_rgb = "255,255,224";
	break; case 76	:	$color_readmore_rgb = "0,255,0";
	break; case 77	:	$color_readmore_rgb = "50,205,50";
	break; case 78	:	$color_readmore_rgb = "250,240,230";
	break; case 79	:	$color_readmore_rgb = "255,0,255";
	break; case 80	:	$color_readmore_rgb = "128,0,0";
	break; case 81	:	$color_readmore_rgb = "102,205,170";
	break; case 82	:	$color_readmore_rgb = "0,0,205";
	break; case 83	:	$color_readmore_rgb = "186,85,211";
	break; case 84	:	$color_readmore_rgb = "147,112,219";
	break; case 85	:	$color_readmore_rgb = "60,179,113";
	break; case 86	:	$color_readmore_rgb = "123,104,238";
	break; case 87	:	$color_readmore_rgb = "0,250,154";
	break; case 88	:	$color_readmore_rgb = "72,209,204";
	break; case 89	:	$color_readmore_rgb = "199,21,133";
	break; case 90	:	$color_readmore_rgb = "25,25,112";
	break; case 91	:	$color_readmore_rgb = "245,255,250";
	break; case 92	:	$color_readmore_rgb = "255,228,225";
	break; case 93	:	$color_readmore_rgb = "255,228,181";
	break; case 94	:	$color_readmore_rgb = "255,222,173";
	break; case 95	:	$color_readmore_rgb = "0,0,128";
	break; case 96	:	$color_readmore_rgb = "253,245,230";
	break; case 97	:	$color_readmore_rgb = "128,128,0";
	break; case 98	:	$color_readmore_rgb = "107,142,35";
	break; case 99	:	$color_readmore_rgb = "255,165,0";
	break; case 100	:	$color_readmore_rgb = "255,69,0";
	break; case 101	:	$color_readmore_rgb = "218,112,214";
	break; case 102	:	$color_readmore_rgb = "238,232,170";
	break; case 103	:	$color_readmore_rgb = "152,251,152";
	break; case 104	:	$color_readmore_rgb = "175,238,238";
	break; case 105	:	$color_readmore_rgb = "219,112,147";
	break; case 106	:	$color_readmore_rgb = "255,239,213";
	break; case 107	:	$color_readmore_rgb = "255,218,185";
	break; case 108	:	$color_readmore_rgb = "205,133,63";
	break; case 109	:	$color_readmore_rgb = "255,192,203";
	break; case 110	:	$color_readmore_rgb = "221,160,221";
	break; case 111	:	$color_readmore_rgb = "176,224,230";
	break; case 112	:	$color_readmore_rgb = "128,0,128";
	break; case 113	:	$color_readmore_rgb = "255,0,0";
	break; case 114	:	$color_readmore_rgb = "188,143,143";
	break; case 115	:	$color_readmore_rgb = "65,105,225";
	break; case 116	:	$color_readmore_rgb = "139,69,19";
	break; case 117	:	$color_readmore_rgb = "250,128,114";
	break; case 118	:	$color_readmore_rgb = "244,164,96";
	break; case 119	:	$color_readmore_rgb = "46,139,87";
	break; case 120	:	$color_readmore_rgb = "255,245,238";
	break; case 121	:	$color_readmore_rgb = "160,82,45";
	break; case 122	:	$color_readmore_rgb = "192,192,192";
	break; case 123	:	$color_readmore_rgb = "135,206,235";
	break; case 124	:	$color_readmore_rgb = "106,90,205";
	break; case 125	:	$color_readmore_rgb = "112,128,144";
	break; case 126	:	$color_readmore_rgb = "255,250,250";
	break; case 127	:	$color_readmore_rgb = "0,255,127";
	break; case 128	:	$color_readmore_rgb = "70,130,180";
	break; case 129	:	$color_readmore_rgb = "210,180,140";
	break; case 130	:	$color_readmore_rgb = "0,128,128";
	break; case 131	:	$color_readmore_rgb = "216,191,216";
	break; case 132	:	$color_readmore_rgb = "255,99,71";
	break; case 133	:	$color_readmore_rgb = "64,224,208";
	break; case 134	:	$color_readmore_rgb = "238,130,238";
	break; case 135	:	$color_readmore_rgb = "245,222,179";
	break; case 136	:	$color_readmore_rgb = "255,255,255";
	break; case 137	:	$color_readmore_rgb = "245,245,245";
	break; case 138	:	$color_readmore_rgb = "255,255,0";
	break; case 139	:	$color_readmore_rgb = "154,205,50";
	break; 
}
	
	$bottom_item_res 			= $params->get('bottom_item_res', "155");
    //$option = (array) $params->get('animation')->$style;
    if(  is_array( $helper->error() )  )
    {
        JFactory::getApplication()->enqueueMessage( implode('<br /><br />', $helper->error()) , 'error');
    } else {
        if( file_exists($layoutoverwritepath.'/view.php') )
        {
            require(JModuleHelper::getLayoutPath($module_name, $layoutoverwritepath.'/view.php') );   
        } else {
            require(JModuleHelper::getLayoutPath($module_name, $style.'/view') );   
        }

        $helper->setAssets($document, $style);
}