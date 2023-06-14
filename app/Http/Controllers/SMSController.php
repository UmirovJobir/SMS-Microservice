<?php

namespace App\Http\Controllers;

use App\Models\SmsType;
use App\Traits\SMSTrait;
use App\Http\Requests\SmsRequest;

class SMSController extends Controller
{
    use SMSTrait;

    /**
     * @OA\Post  (
     *     path="/sms",
     *     summary="send sms api",
     *     tags={"Sms"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SmsSW")
     *    ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
     *         )
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Type not found in SmsType",
     *     )
     * )
     */
    public function __invoke(SmsRequest $request)
    {
        $validate_data = $request->validated();

        $text = SmsType::getText($request);

        if (count($validate_data['data'])==2) {
            $search = [
                '%xxxxxx%',
                '%yyyyyy%'
            ];
            $responeText = str_replace($search, $validate_data['data'], $text);
        } elseif (count($validate_data['data'])==1) {
            $search = [
                '%xxxxxx%',
            ];
            $responeText = str_replace($search, $validate_data['data'], $text);
        }

        return response()->json(['sent sms' =>  $responeText], 200);

//        return $this->sendSms($validate_data['phone'], $responeText);
    }

}
