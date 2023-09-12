<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller']                        = 'backend';
$route['404_override']                              = 'backend/error_404';
$route['translate_uri_dashes']                      = FALSE;

// Auth Routes
// ---------------------------------------------------------
$route['administrator']                             = "auth/login";
$route['login']                                     = "auth/login";
$route['logout']                                    = "auth/logout";
$route['forgetpassword'] 							              = "auth/forgetpassword";
$route['forgetusername'] 							              = "auth/forgetusername";
$route['capt']                                      = "captcha";

// Page Routes
// ---------------------------------------------------------
$route['dashboard']                                 = "backend";
$route['profile']                                   = "backend/profile";
$route['profile/(:any)']                            = "backend/profile/$1";
$route['salesorder']                                = "backend/salesorder";
$route['salsenew']                                  = "backend/membernew";
$route['salsegeneration']                           = "backend/membergeneration";
$route['staff/new']                                 = "staff/formstaff";
$route['invoice/(:any)']                            = "backend/invoice/$1";
$route['faq']                                       = "backend/faq";

// Member Page Routes
// ---------------------------------------------------------
$route['member/new']                                = "backend/membernew";
$route['member/ro']                                	= "backend/memberro";
$route['member/lists']                              = "backend/memberlist";
$route['member/sponsorlists'] 						          = "backend/sponsorlist";
$route['member/tree']                         		  = "backend/membertree";
$route['member/tree/(:any)']                  		  = "backend/membertree/$1";
$route['member/generation']                         = "backend/membergeneration";
$route['member/generation/(:any)']                  = "backend/membergeneration/$1";
$route['member/omzet']                              = "backend/memberomzet";
$route['member/omzet/(:any)']                       = "backend/memberomzet/$1";
$route['member/loan']								                = "backend/memberloan";
$route['member/loan/(:any)']						            = "backend/memberloan/$1";

// Board Page Routes
// ---------------------------------------------------------
$route['board/boardlists'] 							            = "backend/boardlist";
$route['board/memberlist'] 							            = "backend/boardmemberlist";
$route['board/tree1'] 								              = "backend/boardtree/1";
$route['board/tree2'] 								              = "backend/boardtree/2";
$route['board/tree3'] 								              = "backend/boardtree/3";
$route['board/tree1/(:any)'] 						            = "backend/boardtree/1/$1";
$route['board/tree2/(:any)'] 						            = "backend/boardtree/2/$1";
$route['board/tree3/(:any)'] 						            = "backend/boardtree/3/$1";
$route['board/tree1/(:any)/(:any)'] 				        = "backend/boardtree/1/$1/$2";
$route['board/tree2/(:any)/(:any)'] 				        = "backend/boardtree/2/$1/$2";
$route['board/tree3/(:any)/(:any)'] 				        = "backend/boardtree/3/$1/$2";

// PIN Page Routes
// ---------------------------------------------------------
$route['pin/generate'] 								= "backend/pingenerate";
$route['pin/order'] 								= "backend/pinorder";
$route['pin/transfer'] 								= "backend/pintransfer";
$route['pin/datalists'] 							= "backend/pinlist";
$route['pin/datalists/(:any)']						= "backend/pinlist/$1";
$route['productdatalists'] 							= "backend/pinlist";
$route['productdatalists/(:any)']					= "backend/pinlist/$1";
$route['pin/orderlist'] 							= "backend/pinorderlist";
$route['pin/historylist'] 							= "backend/pinhistorylist";

// Shopping Page Routes
// ---------------------------------------------------------
$route['shoppingcart']								= "backend/registration";
$route['shopping/shoplist']							= "backend/shoppingshop";
$route['shopping/shophistorylist'] 					= "backend/shoppingshophistory";
$route['shopping/cart'] 							= "backend/shoppingcart";
$route['cart'] 										= "backend/shoppingcart";
$route['checkout'] 									= "backend/shoppingcheckout";
$route['find-agency'] 								= "backend/shoppingfindagent";

// Promo Code Page Routes
// ---------------------------------------------------------
$route['promocode/global']                          = "backend/promocodeglobal";
$route['promocode/spesific']                        = "backend/promocodespesific";
$route['promocode/promogloballistsdata']            = "setting/promocodelistdata";
$route['promocode/promogloballistsdata/(:any)']     = "setting/promocodelistdata/$1";
$route['promocode/savepromocode']                   = "setting/savepromocode";
$route['promocode/savepromocode/(:any)']            = "setting/savepromocode/$1";
$route['promocode/promocodestatus/(:any)']          = "setting/promocodestatus/$1";
$route['promocode/checkcode']                       = "setting/checkpromocode";

// Commission Page Routes
// ---------------------------------------------------------
$route['commission/bonus']                          = "backend/bonus";
$route['commission/bonus/(:any)']                   = "backend/bonus/$1";
$route['commission/deposite']                       = "backend/deposite";
$route['commission/deposite/(:any)']                = "backend/deposite/$1";
$route['commission/commission']						          = "backend/commission";
$route['commission/commission/(:any)']				      = "backend/commission/$1";
$route['commission/withdraw']                       = "backend/withdraw";

// Flip Page Routes
// ---------------------------------------------------------
$route['flip/fliptrx']								              = "backend/fliptrx";
$route['flip/fliptopup']							              = "backend/fliptopup";
$route['flip/flipinquiry']							            = "backend/flipinquiry";

// Faspay Page Routes
// ---------------------------------------------------------
$route['faspay/faspaytrx']							            = "backend/faspaytrx";
$route['faspay/faspayinquiry']						          = "backend/faspayinquiry";

// Report Page Routes
// ---------------------------------------------------------
$route['report/registration']                       = "backend/registration";
$route['report/historyro'] 							            = "backend/historyro";
$route['report/sales']                              = "backend/sales";
$route['report/salesstockist']                      = "backend/salesstockist";
$route['report/order']                              = "backend/sales";
$route['report/omzet']                              = "backend/omzet";
$route['report/omzetorder'] 						            = "backend/omzetorder";
$route['report/reward']                             = "backend/reward";
$route['report/qualification']                      = "backend/rankqualification";

// Setting
// ---------------------------------------------------------
$route['setting/staff']                             = "staff/index";
$route['switchlang']                                = "backend/switchlang";
$route['switchlang/(:any)']                         = "backend/switchlang/$1";

$route['setting/new']                               = "backend/membernew";
$route['setting/lists']                             = "backend/memberlist";

// BACKEND
// About Us Manage Page Routes
// ---------------------------------------------------------
$route['about/new']                                 = "aboutus/index";
$route['about/history']                             = "aboutus/history";
$route['about/historynew']                          = "aboutus/historynew";
$route['about/historylists']                        = "aboutus/historylist";
$route['about/historyedit/(:any)']                  = "aboutus/historyedit/$1";
$route['about/historystatus/(:any)']                = "aboutus/historystatus/$1";
$route['about/historydelete/(:any)']                = "aboutus/historydelete/$1";

// Product Manage Page Routes
// ---------------------------------------------------------
$route['productmanage/productnew']                  = "backend/productnew";
$route['productmanage/productedit/(:any)']          = "backend/productedit/$1";
$route['productmanage/productstocknew'] 			      = "backend/productstockform/new";
$route['productmanage/productstockedit/(:any)'] 	  = "backend/productstockform/edit/$1";
$route['productmanage/productlist']                 = "backend/productlist";
$route['productmanage/historystockin']				      = "backend/productinlist";
$route['productmanage/productstocklist'] 			      = "backend/productstocklist";
$route['productmanage/categorylist']                = "backend/categorylist";

// Services Manage Page Routes
// ---------------------------------------------------------
$route['services/serviceslists']                     = "services/index";
$route['services/servicesnew']                       = "services/servicesnew";
$route['services/servicesedit/(:any)']               = "services/servicesedit/$1";

// Home Manage Page Routes
// ---------------------------------------------------------
$route['home/new']                                  = "home/index";
$route['home/clientlist']                           = "home/clientlist";
$route['home/clientnew']                            = "home/clientnew";
$route['home/clientedit/(:any)']                    = "home/clientedit/$1";
$route['home/clientstatus/(:any)']                  = "home/clientstatus/$1";
$route['home/clientdelete/(:any)']                  = "home/clientdelete/$1";
