<?php

namespace App\Virtual\Responses;

/**
 * 範例回應格式
 *
 * @OA\Schema(
 *   title="範例回應",
 *   description="請求回傳的範例回應格式",
 *   type="object"
 * )
 */
class DemoResponse
{
    /**
     * 回應文字
     *
     * @var string
     *
     * @OA\Property(
     *   description="回應文字",
     *   example="Ok."
     * )
     */
    public $responseText;

    /**
     * 回應狀態碼
     *
     * @var int
     *
     * @OA\Property(
     *   description="回應狀態碼",
     *   example=200
     * )
     */
    public $statusCode;
}
