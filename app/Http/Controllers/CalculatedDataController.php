<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CalculatedData;
use App\Http\Controllers\BaseController as BaseController;
use Exception;

class CalculatedDataController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calculatedData = $request->all();
        $validator = Validator::make($calculatedData, [
            'operation' => 'required',
            'result' => 'required | max:100',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        try {
            $calculation = CalculatedData::create($calculatedData);
            return $this->sendResponse($calculation, 'Calculated data saved successfully');
        } catch (Exception $e) {
            return $this->sendError('Error.', $e->getMessage());
        }
    }
}
