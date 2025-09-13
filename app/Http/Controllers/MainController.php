<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use NumberFormatter;



class MainController extends Controller
{
    private function numberToWords($num)
    {
        $f = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        return $f->format($num);
    }

    public function clientData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ],
        [
            'name.required' => 'Client Name is required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        try {
            $client = new User();
            $client->name = $request->input('name');
            $client->phone = $request->input('mobile');
            $client->address = $request->input('address');
            $client->msg = $request->input('description', '');
            $client->save();

            Session::flash('success', 'Client registered successfully!');
            return Redirect::back();
        } catch (Exception $e) {
            Log::error('Error registering client: ' . $e->getMessage());
            Session::flash('error', 'There was an error registering the client. Please try again.');
            return Redirect::back()->withInput();
        }
    }

    public function clientList()
    {
        $clients = User::all();
        return view('admin_pages.client_list', compact('clients'));
    }
    public function clientEdit($id)
    {
        $client = User::find($id);
        if (!$client) {
            Session::flash('error', 'Client not found.');
            return Redirect::route('client.list');
        }
        return view('admin_pages.client_edit', compact('client'));
    }
    public function clientEditData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ],
        [
            'name.required' => 'Client Name is required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        try {
            $client = User::find($request->input('id'));
            if (!$client) {
                Session::flash('error', 'Client not found.');
                return Redirect::back()->withInput();
            }

            $client->name = $request->input('name');
            $client->phone = $request->input('mobile');
            $client->address = $request->input('address');
            $client->msg = $request->input('description', '');
            $client->save();

            return redirect()->route('client.list')
                     ->with('success', 'Client updated successfully!');
        } catch (Exception $e) {
            Log::error('Error updating client: ' . $e->getMessage());
            Session::flash('error', 'There was an error updating the client. Please try again.');
            return Redirect::back()->withInput();
        }
    }

    public function invoice()
    {
        $invoices=Invoice::with(['client', 'items'])->get();
        return view('admin_pages.invoice',compact('invoices'));
    }
    public function invoiceCreate()
    {
        $clients=User::all();
        return view('admin_pages.invoice_create',compact('clients'));
    }
    public function invoiceCreateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|exists:users,id',

        ],
        [
            'client_id.required' => 'Client selection is required',

        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        DB::beginTransaction();
        try {

            $orderNo='ORD-'.Str::upper(Str::random(8));
            $billNo='BIL-'.Str::upper(Str::random(8));
            // Create Invoice
            $invoice = new Invoice();
            $invoice->bill_no = $billNo;
            $invoice->bill_date = $request->input('bill_date');
            $invoice->order_no = $orderNo;
            $invoice->client_id = $request->input('client_id');
            $invoice->messers = $request->input('messers', '');
            $invoice->address = $request->input('address', '');


            // Calculate total
            $totalRs = 0;
            foreach ($request->input('particulars') as $index1 => $item) {
                $totalRs += ($request->qty[$index1] * $request->rate[$index1]);
            }
            $invoice->total_rs = $totalRs;
            // Convert total to words (simple implementation, can be improved)
            $invoice->total_in_words = ucfirst($this->numberToWords($totalRs)) . " only";
            $invoice->save();

            // Create Invoice Items
            foreach ($request->input('particulars') as $index => $itemData) {
                $item = new InvoiceItem();
                $item->invoice_id = $invoice->id;
                $item->sn = $index + 1;
                $item->particulars = $itemData;
                $item->qty = $request->qty[$index];
                $item->rate = $request->rate[$index];
                $item->amount = $request->qty[$index] * $request->rate[$index];
                $item->paise = "00"; // Assuming paise is always 00 for
                $item->save();
            }

            DB::commit();
            return redirect()->route('invoices')
                     ->with('success', 'Invoice created successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating invoice: ' . $e->getMessage());
            Session::flash('error', 'There was an error creating the invoice. Please try again.');
            return Redirect::back()->withInput();
        }
    }

    public function viewInvoice($id)
    {
        $invoice=Invoice::with(['client', 'items'])->find($id);
        if(!$invoice){
            Session::flash('error', 'Invoice not found.');
            return Redirect::route('invoices');
        }
        return view('admin_pages.invoice_view',compact('invoice'));
    }
}
