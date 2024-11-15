<?php

namespace App\Services;

interface IDemoService
{
    /**
     * 取得範例回應
     *
     * @return object<string, string>
     */
    public function getDemoResponse(): object;
}
