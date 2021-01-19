<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['test_method'] = 'welcome/test_method';
$route['login'] = 'welcome/login';
$route['dashboard'] = 'welcome/dashboard';
$route['logout'] = 'welcome/logout';
$route['mdp_plan'] = 'welcome/mdp_plan';
$route['cmdi_list'] = 'welcome/cmdi_list';
$route['404_override'] = '';
$route['create_plan'] = 'welcome/create_plan';
$route['getwss'] = 'welcome/getwss';

$route['getmeetingtypedata'] = 'welcome/getmeetingtypedata';
$route['getendusers'] = 'welcome/getendusers';
$route['getbrandfocus'] = 'welcome/getbrandfocus';
$route['getCMDIWSS'] = 'welcome/getCMDIWSS';
$route['getCMDITSI'] = 'welcome/getCMDITSI';
$route['getCMDITOWN'] = 'welcome/getCMDITOWN';
$route['getVenueTSI'] = 'welcome/getVenueTSI';
$route['getVenueTown'] = 'welcome/getVenueTown';
$route['getMeetingType'] = 'welcome/getMeetingType';
$route['getSelectedTown'] = 'welcome/getSelectedTown';
$route['getBudget'] = 'welcome/getBudget';
$route['getActiveBudget'] = 'welcome/getActiveBudget';
$route['saveMDPPlan'] = 'welcome/saveMDPPlan';
$route['saveDraft'] = 'welcome/saveDraft';
$route['deleteDraft'] = 'welcome/deleteDraft';
$route['deductbudget'] = 'welcome/deductbudget';
$route['testing'] = 'welcome/testing';

$route['mdp_history'] = 'welcome/mdp_history';
$route['tempSave'] = 'welcome/tempSave';
/**
 * Added by Priyanka Chimkar
*/
$route['getGrid'] = 'welcome/getGrid';
$route['UpdateMDPPlan'] = 'welcome/UpdateMDPPlan';
$route['getDetailPage'] = 'welcome/getDetailPage';
$route['getCMDIBDI'] = 'welcome/getCMDIBDI';
$route['import'] = 'welcome/import';
$route['deleteMDPPlan']  ='welcome/deleteMDPPlan';

$route['importview'] = 'welcome/importview';


$route['translate_uri_dashes'] = FALSE;
