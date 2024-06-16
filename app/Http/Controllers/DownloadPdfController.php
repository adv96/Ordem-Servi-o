<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\OS;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use Barryvdh\DomPDF\Facade\Pdf;
use LaravelDaily\Invoices\Classes\InvoiceItem;


class DownloadPdfController extends Controller
{
    public function download(OS $record)
    {
        /*
        $customer = new Buyer([
            'name'          => 'Angelo Dutra Vieira',
            'custom_fields' => [
                'email' => 'angelodutra55@gmail.com',
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();

        */


        $cliente = $record->cliente;
        $data = [
            'cliente' => $cliente->name,
            'endereco' => $cliente->endereco,
            'email' => $cliente->email,
            'cpf' => $cliente->cpf,
            'telefone' => $cliente->telefone,
            'servico' => $record->servico->name,
            'descricao' => $record->descricao,
            'preco' => $record->preco,
            'created_at' => $record->created_at,
            'updated_at' => $record->updated_at,
        ];

        $pdf = Pdf::loadView('ordem_servico', $data);

        return $pdf->stream('ordem_servico_' . $record->id . '.pdf');
        
    }

    
}
