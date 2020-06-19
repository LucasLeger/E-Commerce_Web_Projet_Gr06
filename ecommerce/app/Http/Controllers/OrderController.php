<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    public function orderPdf($id)
    {
        $order = ORDER::findOrFail($id);
        $pdf = PDF::loadView('order_pdf', compact('order'));
        $name = "commandeNo-".$order->id.".pdf";
        return $pdf->download($name);
    }
}



// $data['customer'] = $customer;
//  $data['corporation'] = require app_path('../config/corporation.php');
//  $data['document']['name'] = "Fiche client";
//  $data['document']['number'] = $customer->customer_code;
//  $pdf = \PDF::loadView('pdf.customer', $data);
//  return $pdf->stream();