<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use App\Models\ServiceCategory;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Récupérer les demandes de service de l'utilisateur connecté
        $serviceRequests = \App\Models\ServiceRequest::with(['serviceCategory', 'artisan'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);
            
        return view('service-requests.index', compact('serviceRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Récupérer l'artisan sélectionné s'il est passé en paramètre
        $selectedArtisan = null;
        if ($request->has('artisan_id')) {
            $selectedArtisan = Artisan::find($request->artisan_id);
        }
        
        // Récupérer tous les artisans et catégories de service
        $artisans = Artisan::all();
        $serviceCategories = ServiceCategory::all();
        
        return view('service-requests.create', compact('artisans', 'serviceCategories', 'selectedArtisan'));
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'service_category_id' => 'required|exists:service_categories,id',
            'artisan_id' => 'required|exists:artisans,id',
            'preferred_date' => 'nullable|date',
            'budget' => 'nullable|numeric|min:0',
            'address' => 'nullable|string|max:255',
        ]);
        
        // Créer la demande de service
        $serviceRequest = new \App\Models\ServiceRequest();
        $serviceRequest->title = $request->title;
        $serviceRequest->description = $request->description;
        $serviceRequest->service_category_id = $request->service_category_id;
        $serviceRequest->artisan_id = $request->artisan_id;
        $serviceRequest->preferred_date = $request->preferred_date;
        $serviceRequest->budget = $request->budget;
        $serviceRequest->address = $request->address;
        $serviceRequest->user_id = auth()->id(); // Associer à l'utilisateur connecté
        $serviceRequest->status = 'pending'; // Statut initial
        $serviceRequest->save();
        
        return redirect()->route('service-requests.index')
            ->with('success', 'Votre demande de service a été envoyée avec succès à l\'artisan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}