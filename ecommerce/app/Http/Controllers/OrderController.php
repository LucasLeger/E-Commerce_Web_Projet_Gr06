<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Order;

class OrderController extends Controller
{
    public function orderPdf($id)
    {
        $order= ORDER::findOrFail($id);
        $pdf = PDF::loadView('order_pdf', compact('order'));
        $name = "commandeNo-".$order->id.".pdf";
        return $pdf->download($name);
    }
}