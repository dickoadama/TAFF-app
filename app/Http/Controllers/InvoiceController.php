<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Quote;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with(['user', 'artisan'])->latest()->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quotes = Quote::with(['serviceRequest', 'artisan'])->get();
        $products = Product::all();
        return view('invoices.create', compact('quotes', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quote_id' => 'nullable|exists:quotes,id',
            'artisan_id' => 'nullable|exists:artisans,id',
            'operation_type' => 'required|in:purchase,credit,refund',
            'credit_status' => 'nullable|required_if:operation_type,credit|in:issued,paid',
            'refund_status' => 'nullable|required_if:operation_type,refund|in:credit,withdrawal',
            'client_full_name' => 'required|string|max:255',
            'client_contact' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'due_date' => 'required|date|after:issued_date',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.tax_rate' => 'required|numeric|min:0|max:100',
            'items.*.discount_rate' => 'nullable|numeric|min:0|max:100',
        ]);

        $quote = null;
        $user_id = auth()->id(); // Utiliser l'utilisateur connecté par défaut
        $artisan_id = null;
        
        if ($request->quote_id) {
            $quote = Quote::findOrFail($request->quote_id);
            $user_id = $quote->serviceRequest->user_id;
            $artisan_id = $quote->artisan_id;
        }
        
        // Si aucun devis n'est sélectionné mais qu'un artisan est spécifié, on peut l'utiliser
        if (!$request->quote_id && $request->artisan_id) {
            $artisan_id = $request->artisan_id;
        }
        
        // Générer automatiquement le numéro de facture
        $invoiceNumber = $this->generateInvoiceNumber($request->client_full_name, $request->client_contact, $request->issued_date);
        
        // Calculer le montant total de la facture
        $totalAmount = 0;
        foreach ($request->items as $itemData) {
            $quantity = $itemData['quantity'];
            $unitPrice = $itemData['unit_price'];
            $taxRate = $itemData['tax_rate'];
            $discountRate = $itemData['discount_rate'] ?? 0;
            
            // Calculer le sous-total
            $subtotal = $quantity * $unitPrice;
            
            // Appliquer la remise
            $discountAmount = $subtotal * ($discountRate / 100);
            $subtotalAfterDiscount = $subtotal - $discountAmount;
            
            // Appliquer la TVA
            $taxAmount = $subtotalAfterDiscount * ($taxRate / 100);
            
            // Calculer le total pour cet article
            $itemTotal = $subtotalAfterDiscount + $taxAmount;
            
            // Ajouter au total général
            $totalAmount += $itemTotal;
        }
        
        $invoice = Invoice::create([
            'quote_id' => $request->quote_id ?: null, // S'assurer que null est explicitement défini
            'user_id' => $user_id,
            'artisan_id' => $artisan_id,
            'operation_type' => $request->operation_type,
            'credit_status' => $request->operation_type === 'credit' ? $request->credit_status : null,
            'refund_status' => $request->operation_type === 'refund' ? $request->refund_status : null,
            'client_full_name' => $request->client_full_name,
            'client_contact' => $request->client_contact,
            'invoice_number' => $invoiceNumber,
            'issued_date' => $request->issued_date,
            'due_date' => $request->due_date,
            'amount' => $totalAmount, // Inclure le montant calculé
            'status' => 'pending',
        ]);

        // Créer les lignes de facture
        foreach ($request->items as $itemData) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'product_id' => $itemData['product_id'],
                'quantity' => $itemData['quantity'],
                'unit_price' => $itemData['unit_price'],
                'tax_rate' => $itemData['tax_rate'],
                'discount_rate' => $itemData['discount_rate'] ?? 0,
            ]);
        }

        return redirect()->route('invoices.show', $invoice)->with('success', 'Facture créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('items.product');
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $quotes = Quote::with(['serviceRequest', 'artisan'])->get();
        $products = Product::all();
        $invoice->load('items.product');
        return view('invoices.edit', compact('invoice', 'quotes', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quote_id' => 'nullable|exists:quotes,id',
            'artisan_id' => 'nullable|exists:artisans,id',
            'operation_type' => 'required|in:purchase,credit,refund',
            'credit_status' => 'nullable|required_if:operation_type,credit|in:issued,paid',
            'refund_status' => 'nullable|required_if:operation_type,refund|in:credit,withdrawal',
            'client_full_name' => 'required|string|max:255',
            'client_contact' => 'required|string|max:255',
            'invoice_number' => 'required|unique:invoices,invoice_number,'.$id,
            'issued_date' => 'required|date',
            'due_date' => 'required|date|after:issued_date',
            'status' => 'required|in:pending,paid,overdue,cancelled',
        ]);

        $invoice = Invoice::findOrFail($id);
        
        $quote = null;
        $user_id = $invoice->user_id; // Conserver l'utilisateur existant par défaut
        $artisan_id = $invoice->artisan_id; // Conserver l'artisan existant par défaut
        
        if ($request->quote_id) {
            $quote = Quote::findOrFail($request->quote_id);
            $user_id = $quote->serviceRequest->user_id;
            $artisan_id = $quote->artisan_id;
        }
        
        // Si aucun devis n'est sélectionné mais qu'un artisan est spécifié, on peut l'utiliser
        if (!$request->quote_id && $request->artisan_id) {
            $artisan_id = $request->artisan_id;
        }
        
        // Calculer le montant total de la facture
        $totalAmount = 0;
        if (isset($request->items)) {
            foreach ($request->items as $itemData) {
                $quantity = $itemData['quantity'];
                $unitPrice = $itemData['unit_price'];
                $taxRate = $itemData['tax_rate'];
                $discountRate = $itemData['discount_rate'] ?? 0;
                
                // Calculer le sous-total
                $subtotal = $quantity * $unitPrice;
                
                // Appliquer la remise
                $discountAmount = $subtotal * ($discountRate / 100);
                $subtotalAfterDiscount = $subtotal - $discountAmount;
                
                // Appliquer la TVA
                $taxAmount = $subtotalAfterDiscount * ($taxRate / 100);
                
                // Calculer le total pour cet article
                $itemTotal = $subtotalAfterDiscount + $taxAmount;
                
                // Ajouter au total général
                $totalAmount += $itemTotal;
            }
        }
        
        $invoice->update([
            'quote_id' => $request->quote_id ?: null, // S'assurer que null est explicitement défini
            'user_id' => $user_id,
            'artisan_id' => $artisan_id,
            'operation_type' => $request->operation_type,
            'credit_status' => $request->operation_type === 'credit' ? $request->credit_status : null,
            'refund_status' => $request->operation_type === 'refund' ? $request->refund_status : null,
            'client_full_name' => $request->client_full_name,
            'client_contact' => $request->client_contact,
            'invoice_number' => $request->invoice_number,
            'issued_date' => $request->issued_date,
            'due_date' => $request->due_date,
            'amount' => $totalAmount, // Inclure le montant calculé
            'status' => $request->status,
        ]);

        return redirect()->route('invoices.show', $invoice)->with('success', 'Facture mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Facture supprimée avec succès.');
    }
    
    /**
     * Générer un numéro de facture automatique basé sur le nom, le contact et la date
     *
     * @param string $fullName
     * @param string $contact
     * @param string $date
     * @return string
     */
    private function generateInvoiceNumber($fullName, $contact, $date)
    {
        // Formater la date (YYYYMMDD)
        $formattedDate = date('Ymd', strtotime($date));
        
        // Extraire les premières lettres du nom complet
        $nameInitials = '';
        $nameParts = explode(' ', $fullName);
        foreach ($nameParts as $part) {
            $nameInitials .= strtoupper(substr($part, 0, 1));
        }
        
        // Extraire les chiffres du contact (numéro de téléphone ou email)
        $contactNumbers = preg_replace('/[^0-9]/', '', $contact);
        $contactCode = substr($contactNumbers, -4); // Prendre les 4 derniers chiffres
        
        // Combiner tous les éléments
        $baseNumber = $formattedDate . '-' . $nameInitials . '-' . $contactCode;
        
        // Vérifier s'il existe déjà une facture avec ce numéro et ajouter un suffixe si nécessaire
        $invoiceNumber = $baseNumber;
        $counter = 1;
        
        while (Invoice::where('invoice_number', $invoiceNumber)->exists()) {
            $invoiceNumber = $baseNumber . '-' . $counter;
            $counter++;
        }
        
        return $invoiceNumber;
    }
}