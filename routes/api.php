<?php

use App\Models\Donation;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Mail\DonationReceipt;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('devtrans', 'PayController@devtrans')->name('devtrans');


// mobile api
Route::get('donateFromMobile', 'PayController@donateFromMobile');

Route::get('mobile/getAllDonation', 'MobileApiController@getAllDonation');
Route::get('mobile/getAllDonationType', 'MobileApiController@getAllDonationType');
Route::get('mobile/getAllDonationQuantity', 'MobileApiController@getAllDonationQuantity');
Route::get('mobile/getAllDonationTypeQuantity', 'MobileApiController@getAllDonationTypeQuantity');
Route::get('mobile/getAllStatistic', 'MobileApiController@getAllStatistic');
Route::get('mobile/getallmytransactionhistory', 'MobileApiController@getallmytransactionhistory');
Route::get('mobile/getlatesttransaction', 'MobileApiController@getlatesttransaction');
Route::get('mobile/gettransactionbymonth', 'MobileApiController@gettransactionbymonth');
Route::get('mobile/gettransactionbyyear', 'MobileApiController@gettransactionbyyear');
Route::get('mobile/donationnumberbyorganization', 'MobileApiController@donationnumberbyorganization');
Route::get('mobile/getdonationbycategory', 'MobileApiController@getdonationbycategory');

Route::post('mobile/login', 'MobileApiController@login');
Route::post('mobile/updateProfile', 'MobileApiController@updateProfile');

Route::get('/{id}', function($id){
    $donation = Donation::find($id);

    $a = new Organization();

    $organization = $a->getOrganizationByDonationId($donation->id);

    $a = new Transaction();

    $transaction = $a->getTransactionByName('Donation_STU113_20220719235126_80');

    // return new DonationReceipt($donation, $transaction, $organization);
    return view('receipt.indexlhdn', compact( 'donation', 'organization', 'transaction'));
});


//route for mobile order
Route::get('mobile/getfoodorg', 'OrganizationController@getAllOrgTypeFood');
Route::get('mobile/getdishbyorg/{id}', 'DishController@getDishByOrgId');
Route::get('mobile/getdatebydish/{id}', 'DishController@getDateByDishId');