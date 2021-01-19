<?php
defined('BASEPATH' OR exit('No direct script access allowed'));

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
/**admin panel api */
$route['default_controller'] = 'LoginController';
$route['check-login'] = 'LoginController/checkLogin';
$route['admin/dashboard'] = 'DashboardController/adminDashboard';
$route['excel'] = 'Export/generateXls';
$route['logout'] = 'LoginController/logout';
$route['admin/store-manager'] = 'StoreController/storeManager';
$route['admin/store/get-store-manager-griddata'] = 'StoreController/getStoreManagerGridData';
$route['admin/dashboard/get-dashboard-caldata'] = 'DashboardController/dashboardCal';
$route['admin/store/add-store-manager']= 'StoreController/addStoreManager';
$route['admin/store/store-manager-deactive'] = 'StoreController/DeactivateStoremanager';
$route['admin/store/store-manager-active'] = 'StoreController/ActiveStoremanager';
$route['admin/store/store-manager-delete'] = 'StoreController/HarddeleteStoremanager';
$route['admin/store/store-manager-get-view'] = 'StoreController/getViewStoremanager';
$route['admin/store/store-manager-get-view-edit'] = 'StoreController/getViewStoremanagerForEdit';
$route['admin/store/store-manager-reset-password'] = 'StoreController/resetPassword';
$route['admin/store/edit-store-manager'] = 'StoreController/editstoreManager';
$route['admin/store/get-set-target-griddata'] = 'StoreController/storeSetTargetGridData';
$route['admin/agents/get-agents-for-admin'] = 'AgentController/getAdminsAgentGridData';
$route['admin/agents/add-agent'] = 'AgentController/addAdminAgent';
$route['admin/agents/agent-active'] = 'AgentController/AdminAgentActive';
$route['admin/agents/agent-deactive'] = 'AgentController/AdminAgentDeactive';
$route['admin/agents/agent-delete'] = 'AgentController/AdminAgentDelete';
$route['admin/agents/agent-get-view-data'] = 'AgentController/getAgentViewdData';
$route['admin/category/category-mappping-add'] = 'CategoryController/setTargetcatMappingApp';
$route['admin/category/get-target-setting-category'] = 'CategoryController/getSetTargetcatMappingData';
$route['admin/category/target-setting-category-delete'] = 'CategoryController/SetTargetcatMappingDelete';
$route['admin/store-target-setting']= 'StoreController/storeTargetSetting';
$route['admin/store/store-manager-set-target-setting'] = 'StoreController/storeSetTargetSetting';
$route['admin/featured-category'] = 'FeaturedController';
$route['admin/feature-category/get-feature-category-griddata'] = 'FeaturedController/getFeatureCatGridData';
$route['admin/category/get-subcategory'] = 'CategoryController/getSubcategoryByCatID';
$route['admin/products/get-productline'] = 'ProductsController/getProductlines';
$route['admin/feature-category/add'] = 'FeaturedController/addFeatureCat';
$route['admin/feature-category/get-feature-category'] = 'FeaturedController/getFeatureCatId';
$route['admin/feature-category/update'] = 'FeaturedController/updateFeatureCat';
$route['admin/feature-category/delete-feature-category'] = 'FeaturedController/deleteFeatureCat';
$route['admin/customers'] = 'CustomerController';
$route['admin/customer/get-customer-griddata']  = 'CustomerController/getCustomerData';
$route['admin/customer/getcustomer']  = 'CustomerController/getCustomerByID';
$route['admin/customer/get-order-asper-customer']  = 'CustomerController/getOrderDetailsAsPerCustomer';
$route['admin/sales'] = 'SalesController';
$route['admin/sales/get-sale-order-griddata'] = 'SalesController/getAllOrderDetails';
$route['admin/sales/net-sale'] = 'SalesController/netSale';
$route['admin/sales/get-sale-net-sale-caldata'] = 'SalesController/netSaleCalData';    
$route['admin/home-banner'] = 'BannersController/homeBanner';
$route['admin/feature-category/get-home-banner'] = 'BannersController/getHomeBannGridData';
$route['admin/feature-category/add-home-banner'] = 'BannersController/addBannerImage';
$route['admin/home-banner/update'] = 'BannersController/updateHomeBanner';
$route['admin/home-banner/status-active'] = 'BannersController/homeBannerActive';
$route['admin/home-banner/status-deactive'] = 'BannersController/homeBannerdeactive';
$route['admin/home-banner/delete'] = 'BannersController/deleteHomeBannerByID';
$route['admin/feedback'] = 'FeedbackController';
$route['admin/feedback/get-feedback-grid-data'] = 'FeedbackController/getFeedbackGridData';
$route['admin/feedback/get-feedback-details-byid'] = 'FeedbackController/getFeedbackDetailsByID';
$route['admin/reports/get-reports-order-griddata'] = 'ReportsController/getAllOrderDetails';
$route['admin/reports'] = 'ReportsController';
$route['superadmin/profile/get_profile'] = 'SuperAdminController/getProfile';
$route['superadmin/profile/update-profile'] = 'SuperAdminController/updateProfile';
$route['superadmin/password/reset-password'] = 'SuperAdminController/resetPassword';
$route['admin/inventory'] = 'InventoryController';
$route['admin/catalogue-upload'] = 'ProductsController/catalogueUpload';
$route['admin/category'] = 'CategoryController/category';
$route['admin/sub-category'] = 'CategoryController/subCategory';
$route['admin/product-line'] = 'ProductsController/productLine';
$route['admin/products'] = 'ProductsController/products';
$route['admin/products/update-mrp'] = 'ProductsController/updateMRP';
$route['admin/users/agent-session'] = 'AgentController/adminAgentSession';
$route['admin/store-history/get-history-griddata'] = 'StoreController/getHistoryGridData';
$route['admin/export-store-manager'] = 'StoreController/exportCSV';
$route['admin/export-featured-category'] = 'FeaturedController/FeaturedexportCSV';
$route['admin/export-customer'] = 'CustomerController/CustomerexportCSV';
$route['admin/export-sales'] = 'SalesController/SalesexportCSV';
$route['admin/export-homebanner'] = 'FeaturedController/HomeBannerexportCSV';
$route['admin/export-feedback'] = 'FeedbackController/FeedbackexportCSV';
$route['admin/export-reports'] = 'ReportsController/ReportsexportCSV';
$route['admin/store-upload'] = 'StoreController/importStore';

/**store manager panel api */
$route['sm/check-login'] = 'LoginController/checkLogin';
$route['sm/login'] = 'LoginController/SMLogin';
$route['sm/dashboard'] = 'DashboardController';
$route['sm/logout'] = 'LoginController/smLogout';
$route['sm/dashboard/get-dashboard-caldata'] = 'DashboardController/smDashboardCal';   
$route['sm/agents'] = 'AgentController';
$route['admin/agents/get-agents-for-sm'] = 'AgentController/getSmAgentGridData';
$route['sm/agents/add-agent'] = 'AgentController/addAgent';
$route['sm/agents/agent-session'] = 'AgentController/agentSession';
$route['sm/store-target'] = 'StoreController';
$route['sm/agent/get-set-target-griddata'] = 'AgentController/agentSetTargetGridData';
$route['sm/agent/agent-set-target-setting'] = 'AgentController/agentSetTargetSetting';
$route['sm/category/category-mappping-add'] = 'CategoryController/setAgentTargetcatMappingApp';
$route['sm/category/get-target-setting-category'] = 'CategoryController/getAgentSetTargetcatMappingData';
$route['sm/category/target-setting-category-delete'] = 'CategoryController/agentSetTargetcatMappingDelete';
$route['sm/sales'] = 'SalesController/smSales';
$route['admin/sales/get-sale-order-griddata'] = 'SalesController/getAllOrderDetails';
$route['sm/feedback'] = 'FeedbackController/smFeedback';
$route['admin/sales/get-sale-order-griddata'] = 'SalesController/getAllOrderDetails';
$route['sm/reports'] = 'ReportsController/smReports';
$route['sm/reports/get-reports-order-griddata'] = 'ReportsController/getAllOrderDetails';
$route['sm/export-store-agent'] = 'AgentController/agentExportToExcel';
$route['sm/export-sale'] = 'SalesController/smSaleExportToExcel';
$route['sm/export-report'] = 'ReportsController/smReportExportToExcel';
$route['sm/export-feedback'] = 'FeedbackController/smFeedbackExportToExcel';

$route['translate_uri_dashes'] = FALSE;
