<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;

use App\Helpers\Mpesa\TransactionResponse;
use App\Helpers\Mpesa\Config;
use App\Helpers\Mpesa\ValidationHelper;

use App\Models\Payments;

class MpesaController extends Controller
{
    private $config;
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function processPayment(Request $request)
    {
        try {

           // dd(bin2hex(random_bytes(15))); // random value
            $amountValue = $request->amount;
            $amount = round($amountValue, 2);
            $transactionReference =  "T12344C";
            $thirdPartyReference = "BH8DV9";
            $thirdPartyConversationID = "1234567890123456789012345678901";
            $purchaseDesc = "Product Payment";


            $msisdn = ValidationHelper::normalizeMSISDN($request->phone_number);

            // Set payment request payload
            $request_payload = array(
                "input_TransactionReference" => $transactionReference,
                "input_Amount" => $amount,
                "input_ThirdPartyReference" => $thirdPartyReference,
                "input_CustomerMSISDN" => $msisdn,
                "input_ServiceProviderCode" => $this->config->getProviderCode(),
                "input_ThirdPartyConversationID" => $thirdPartyConversationID,
                "input_PurchasedItemsDesc" => $purchaseDesc,
            );

            // Generate security token
            $timestamp = date('YmdHis');
            $payload = json_encode($request_payload);

            // Set request headers
            $headers = array(
                "Content-Type: application/json",
                "Authorization: " . $this->config->getBearerToken(),
                'Content-Length: ' . strlen($payload),
                "Origin:" . $this->config->getOrigin(),
                "Timestamp:" . $timestamp,
            );

            // Initiate API request
            $ch = curl_init(
                'https://' . $this->config->getApiHost() . ':18352/ipg/v1x/c2bPayment/singleStage/'
            );

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request_payload));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // Parse API response
            $response_payload = json_decode($response, true);
            $message = $response_payload['output_ResponseDesc'];

            print_r($response_payload);

            if ($response_payload['output_ResponseCode'] == 'INS-0') {

                //dd($response_payload);

                $transactionID = $response_payload['output_TransactionID'];
                $conversationID = $response_payload['output_ConversationID'];

                $paymentData = array(
                    'number' => $msisdn,
                    'amount' => $amount,
                    'description' => $purchaseDesc,
                    'currence' => 'MZN',
                    'transactionID' => $transactionID,
                    'conversationID' => $conversationID,
                    'payment_method_id'=> 1,
                    'status' => true,
                );

                $this->storePayment($paymentData);
                return redirect()
                    ->back()
                    ->with('success', $message)
                    ->withInput();
            } else {
                return redirect()
                    ->back()
                    ->with('error', $message)
                    ->withInput();
            }
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    public function storePayment($paymentData) 
    {
        try{
            //dd($paymentData);
            $response = Payments::create($paymentData);  // Utiliza mass assignment pra cadastrar
            if ($response)
                    return redirect()
                    ->back()
                    ->with('success', "ao salvar transação !");
                return redirect()
                    ->back()
                    ->with('error', "ao salvar transação !")
                    ->withInput();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', $e)
                ->withInput();
        }
    }
}