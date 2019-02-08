<?php
/**
 * @SWG\Swagger(
 *     basePath="/api",
 *     schemes={"http", "https"},
 *     host=L5_SWAGGER_CONST_HOST,
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Bank swagger API",
 *         description="Bank API description",
 *         @SWG\Contact(
 *             email="e.rexhepi2@gmail.com"
 *         ),
 *     )
 * )
 */

/**
 * //Authentication endpoints
 * @SWG\Post(
 *     path="/authenticate",
 *     tags={"Authentication"},
 *     summary="Authenticate",
 *     description="",
 *     @SWG\Parameter(
 *          name="RegisterRequest",
 *          in="body",
 *          description="Parameters",
 *          required=true,
 *          @SWG\Schema(
 *               type="object",
 *               ref="#/definitions/RegisterRequest"
 *          )
 *     ),
 *     @SWG\Response(
 *          response=200,
 *          description="Success",
 *          @SWG\Schema(
 *              ref="#/definitions/RegisterResponse"
 *          )
 *     ),
 *    @SWG\Response(response=400, description="Bad request"),
 *    @SWG\Response(response=404, description="Resource Not Found"),
 *    @SWG\Response(response=401, description="Unauthorized"),
 *    security={
 *        "oauth2_security_example": {"write:app", "read:app"}
 *    }
 * )

 * @SWG\Post(
 *     path="/login",
 *     tags={"Authentication"},
 *     summary="Authenticate",
 *     description="",
 *     @SWG\Parameter(
 *          name="LoginRequest",
 *          in="body",
 *          description="Parameters",
 *          required=true,
 *          @SWG\Schema(
 *               type="object",
 *               ref="#/definitions/LoginRequest"
 *          )
 *     ),
 *     @SWG\Response(
 *          response=200,
 *          description="Success",
 *          @SWG\Schema(
 *              ref="#/definitions/LoginResponse"
 *          )
 *     ),
 *    @SWG\Response(response=400, description="Bad request"),
 *    @SWG\Response(response=404, description="Resource Not Found"),
 *    @SWG\Response(response=401, description="Unauthorized"),
 *    security={
 *        "oauth2_security_example": {"write:app", "read:app"}
 *    }
 * )
 *
 * @SWG\Post(
 *     path="/transaction",
 *     tags={"Transactions"},
 *     summary="Transactions",
 *     description="Transaction endpoints",
 *     @SWG\Parameter(
 *          name="CreateTransactionRequest",
 *          in="body",
 *          description="Parameters",
 *          required=true,
 *          @SWG\Schema(
 *               type="object",
 *               ref="#/definitions/CreateTransactionRequest"
 *          )
 *     ),
 *     @SWG\Response(
 *          response=200,
 *          description="Success",
 *          @SWG\Schema(
 *              ref="#/definitions/CreateTransactionResponse"
 *          )
 *     ),
 *    @SWG\Response(response=400, description="Bad request"),
 *    @SWG\Response(response=404, description="Resource Not Found"),
 *    @SWG\Response(response=401, description="Unauthorized"),
 *    security={
 *        "oauth2_security_example": {"write:app", "read:app"}
 *    }
 * )
 *
 * @SWG\Get(
 *     path="/transaction/{uuid}",
 *     tags={"Transactions"},
 *     summary="Transactions",
 *     description="Transaction endpoints",
 *     @SWG\Parameter(
 *          name="Uuid",
 *          in="path",
 *          description="Transaction uuid",
 *          required=true,
 *          type="string"
 *     ),
 *     @SWG\Response(
 *          response=200,
 *          description="Success",
 *          @SWG\Schema(
 *              ref="#/definitions/Transaction"
 *          )
 *     ),
 *    @SWG\Response(response=400, description="Bad request"),
 *    @SWG\Response(response=404, description="Resource Not Found"),
 *    @SWG\Response(response=401, description="Unauthorized"),
 *    security={
 *        "oauth2_security_example": {"write:app", "read:app"}
 *    }
 * )
 *
 * @SWG\Definition(
 *     definition="RegisterRequest",
 *     type="object",
 *     @SWG\Property(property="name", type="string"),
 *     @SWG\Property(property="email", type="string"),
 *     @SWG\Property(property="password", type="string")
 * )
 *
 * @SWG\Definition(
 *     definition="RegisterResponse",
 *     type="object",
 *     @SWG\Property(property="success", type="boolean"),
 *     @SWG\Property(property="access_token", type="string")
 * )
 *
 * @SWG\Definition(
 *     definition="LoginRequest",
 *     type="object",
 *     @SWG\Property(property="email", type="string"),
 *     @SWG\Property(property="password", type="string")
 * )
 *
 * @SWG\Definition(
 *     definition="LoginResponse",
 *     type="object",
 *     @SWG\Property(property="success", type="boolean"),
 *     @SWG\Property(property="access_token", type="string")
 * )
 *
 * @SWG\Definition(
 *     definition="CreateTransactionRequest",
 *     type="object",
 *     @SWG\Property(property="uuid", type="string"),
 *     @SWG\Property(property="amount", type="integer"),
 *     @SWG\Property(property="booking_date", format="date-time", type="string"),
 *     @SWG\Property(property="parts", type="array",
 *          @SWG\Items(
 *              type="object",
 *              ref="#/definitions/TransactionPart"
 *          )
 *     ),
 * )
 *
 * @SWG\Definition(
 *     definition="CreateTransactionResponse",
 *     type="object",
 *     @SWG\Property(property="success", type="boolean"),
 * )
 *
 * @SWG\Definition(
 *     definition="Transaction",
 *     type="object",
 *     @SWG\Property(property="amount", type="integer"),
 *     @SWG\Property(property="booking_date", format="date-time", type="string"),
 *     @SWG\Property(property="parts", type="array",
 *          @SWG\Items(
 *              type="object",
 *              ref="#/definitions/TransactionPart"
 *          )
 *     ),
 * )
 *
 * @SWG\Definition(
 *     definition="TransactionPart",
 *     type="object",
 *     @SWG\Property(property="reason", type="string"),
 *     @SWG\Property(property="amount", type="integer"),
 * )
 */
?>