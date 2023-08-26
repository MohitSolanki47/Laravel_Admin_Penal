<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PDF; // Import the PDF facade

class Receipts extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'Receipts_No' => ['required', 'string', 'max:255'],
    //         'Donor_Name' => ['required', 'string', 'max:255'],
    //         'Donor_Mobile' => ['required', 'string', 'min:10'],
    //         'Donor_Email' => ['required', 'string', 'email', 'max:255'],
    //         'Donor_Pan_No' => ['required', 'string', 'min:10'],
    //         'Donor_Address' => ['required', 'string', 'max:255'],
    //         'Amount' => ['required', 'string', 'max:255'],
    //         'Payment_Method' => ['required', 'string', 'max:255'],
    //     ]);
    // }

    public function index()
    {         
        $Receipt_data = DB::table('receipts')->get();

        echo view('header');
        echo view('receipts',['Receipt_data'=>$Receipt_data]);
        echo view('footer');
    }

    public function create(Request $request)
    {
        $data = $request->input();
        try{

            $Receipt = new Receipt;
            $Receipt->Receipt_No = $data['Receipts_No'];
            $Receipt->Donor_Name = $data['Donor_Name'];
            $Receipt->Donor_Mobile = $data['Donor_Mobile'];
            $Receipt->Donor_Pan_No = $data['Donor_Pan_No'];
            $Receipt->Amount = $data['Amount'];
            $Receipt->Donor_Email = $data['Donor_Email'];
            $Receipt->Donor_Address = $data['Donor_Address'];
            $Receipt->Payment_Method = $data['Payment_Method'];
            $Receipt->Extra = '';
            $Receipt->save();

            return redirect('Add_Receipts')->with('status',"Insert successfully");
        }
        catch(Exception $e)
        {
            return redirect('Add_Receipts')->with('failed',"operation failed");
        }
    }

    public function generateInvoice(Request $request)
    {
        // Fetch data from the database
        $id = $request->id;
		$invoices = Receipt::find($id);

        $invoices = json_encode($invoices);

        // Load the view and data into the PDF
        $pdf = PDF::loadView('invoice-pdf', compact('invoices'));

        // Generate PDF and display or save
        return $pdf->stream('invoice.pdf'); // To display in the browser
        // return $pdf->download($id.'.pdf');  // To download in the browser
    }

    public function delete(Request $request,$id) 
    {
		$id = $request->id;
		$Product_details = Receipt::find($id);
        
		Receipt::destroy($id);

        return redirect('Category');
	}
}
