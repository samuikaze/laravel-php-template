<?php

namespace App\Http\Controllers;

use App\Http\Resources\DemoResponse;
use App\Services\IDemoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 範例 Controller
 *
 * @OA\Tag(
 *   name="Example v1",
 *   description="範例相關"
 * )
 */
class DemoTestController extends Controller
{
    /**
     * DemoService
     *
     * @var \App\Services\IDemoService
     */
    protected $demo_service;

    /**
     * Create a new controller instance.
     *
     * @param \App\Services\IDemoService $demo_service
     * @return void
     */
    public function __construct(IDemoService $demo_service)
    {
        $this->demo_service = $demo_service;
    }

    /**
     * 心跳
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @OA\Get(
     *   path="/api/v1/heartbeat",
     *   summary="心跳",
     *   tags={"Example v1"},
     *   @OA\Response(
     *     response="200",
     *     description="心跳回應",
     *     @OA\JsonContent(
     *       allOf={
     *         @OA\Schema(ref="#/components/schemas/BaseResponse"),
     *         @OA\Schema(
     *           @OA\Property(
     *             property="data",
     *             type="array",
     *             items=@OA\Items(ref="#/components/schemas/DemoResponse")
     *           )
     *         )
     *       }
     *     )
     *   )
     * )
     */
    public function heartbeat(): JsonResponse
    {
        $data = $this->demo_service->getDemoResponse();
        // 透過 Eloquent API Resources 對 JSON 結構整形
        $data = new DemoResponse($data);

        return $this->response(data: $data);
    }
}
