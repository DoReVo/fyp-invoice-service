<?php

namespace App\Http\Controllers;

use App\Invoice;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getOne($id)
    {
        try {
            $invoice = Invoice::findOrFail($id);
        } catch (\Throwable $th) {
            $message = array(
                'message' => 'Invoice not found',
            );
            return response()->json($message, 404);
        }
        return response()->json($invoice, 200);
    }

    public function handleRequest()
    {
        return response()->json(array('message' => 'Ok from invoice service'), 200);
    }
}
