<?php

namespace App\Services;

class DemoService implements IDemoService
{
    /**
     * 取得範例回應
     *
     * @return object<string, string>
     */
    public function getDemoResponse(): object
    {
        return (object) [
            'response_text' => 'Ok.',
            'status_code' => 200,
        ];
    }
}
