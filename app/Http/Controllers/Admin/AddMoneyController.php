<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Stripe\{Stripe, Charge, Customer};
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
use App\sponsor_payment;
use App\RejectSponsorhip;
use App\Yelp_address;

class AddMoneyController extends Controller
{
	public function __construct() {
        //Stripe::setApiKey(env('STRIPE_SECRET'));
    }

 public function payWithStripe($id, $sponsor_id=null)
 {
	 

  return view('test_stripe');

 }
public function postPaymentWithStripe(Request $request, $id, $sponsor_id=null)
 {
 // print_r($_POST);
	 // die(); 
		$amount=$request->get('amount'); 
		$email=$request->get('email'); 
		$business_name=$request->get('business_name'); 
		if($request->get('stripeToken')) {
			Stripe::setApiKey('sk_test_gbYbyBeuvU9wtWVWjIhzF6k1007VmXYcKq');
			$customer = Customer::create([
				'email' => $email,
				'source' => $request->get('stripeToken')
			]);		
			       
			$create_stripe = Charge::create([
				'customer' => $customer->id,
				'amount' => $amount,
				'currency' => 'usd',
				'description' => "Amount has been added for the sponsorship"
			]);
			
									//echo"<pre>"; print_r($create_stripe); die;				

			if($create_stripe->outcome->seller_message == 'Payment complete.'){
				$sponsor_payment=new sponsor_payment;
				$sponsor_payment->business_name = $business_name;
				//$sponsor_payment->card_number =  $create_stripe->source->id;
				$sponsor_payment->card_number='xxxxxxxxxxx';
				$sponsor_payment->cvv = 'xxxx';
				$sponsor_payment->email = $email;
				$sponsor_payment->stripe_id = $create_stripe->id;
				$sponsor_payment->stripe_customer = $create_stripe->customer;
				$sponsor_payment->card_id = $create_stripe->source->id;
				$sponsor_payment->balance_transaction = $create_stripe->balance_transaction;
				$sponsor_payment->card_brand = $create_stripe->source->brand;
				$sponsor_payment->expiry_month =$create_stripe->source->exp_month;;
				$sponsor_payment->expiry_year =$create_stripe->source->exp_year;
				$sponsor_payment->card_last_four =$create_stripe->source->last4;
				$sponsor_payment->amount =$amount;
				$sponsor_payment->team_id =$id;
				$sponsor_payment->save();
				 return redirect()->route('thank_you.sponsor', ['id'=>$id]);
			}
			
			
			
			
				//		echo"<pre>"; print_r($create_stripe); die;				
			//echo"<pre>"; print_r($create_stripe); die;				
		}
 }
 
 public function payWithStripeDonation($id, $sponsor_id)
 { 
 	$team_id = $id;
	$reject_sponsorhip = RejectSponsorhip::where('team_id', '=', $id)->where('sponsor_id', '=', $sponsor_id)->first();
	if($reject_sponsorhip)
	{
		$reject_sponsorhip = RejectSponsorhip::where('team_id', '=', $id)->where('sponsor_id', '=', $sponsor_id)->delete();

	}
	$reject_sponsorhip = new RejectSponsorhip;
	$reject_sponsorhip->team_id=$team_id;
	$reject_sponsorhip->sponsor_id=$sponsor_id;
	$reject_sponsorhip->save(); 
   return view('paywithstripe')->with('team_id', $team_id );
 //return view('test_stripe')->with('team_id', $team_id );
 
 }
 
 
 
}