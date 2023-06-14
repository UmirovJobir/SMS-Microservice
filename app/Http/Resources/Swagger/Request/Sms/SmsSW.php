<?php

namespace App\Http\Resources\Swagger\Request\Sms;

/**
 * @OA\Schema(
 *      title="Send SMS by type with data",
 * )
 */

class SmsSW
{
    /**
     * @OA\Property(
     *     title="phone",
     *     example=99890444204
     * )
     *  @var integer
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="type",
     *      example="code_and_price_for_send_monay",
     *      description=
     *     "Types required 2 params: {
     *      code_and_price_for_send_monay,
     *      code_and_price_for_send_monay_with_title_Agrozamin,
     *      cabinet_login_password_web,
     *      cabinet_login_password_telegram,
     *      cabinet_login_password_with_title_AgroZamin
     *     },
     *     Types required 1 param: {
     *      register_code,
     *      new_password,
     *      restore_password,
     *      success_added_card,
     *      success_added_card_Agrozamin,
     *      confirm_code_to_add_card,
     *      confirm_code_to_add_card_with_title_Agrozamin
     *      }",
     * )
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="data",
     *      example={"card": 86003349000000,"price": 1200000.00},
     *      description="Two params: {login: user, password: 123456},{card: 86003349000000,price: 1200000.00}, One param: {code: 123215}, {card:86003349000000}"
     * )
     * @var jsonb
     */
    public $data;
}
