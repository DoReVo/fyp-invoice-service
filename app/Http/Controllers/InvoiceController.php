<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

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

    public function getOne($id, Request $request)
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

    public function markPaid($id, Request $request)
    {
        try {
            $invoice = Invoice::findOrFail($id);
        } catch (\Throwable $th) {
            $message = array(
                'message' => 'Invoice not found',
            );
            return response()->json($message, 404);
        }

        // set isPaid to true
        $invoice->isPaid = 1;
        // set payment_id
        $invoice->payment_id = $request->payment_id;

        $invoice->save();

        return response()->json($invoice, 200);
    }
}
