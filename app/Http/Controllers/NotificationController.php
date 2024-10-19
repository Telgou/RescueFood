<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\EvenementCollecte;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Lister toutes les notifications
    public function index()
    {
        $notifications = Notification::with('evenementCollecte')->get();
        return view('Notification.index', compact('notifications'));
    }

    // Afficher une notification spécifique
    public function show($id)
    {
        $notification = Notification::with('evenementCollecte')->findOrFail($id);
        return response()->json($notification);
    }

    // Affiche le formulaire de création
    public function create()
    {
        $evenements = EvenementCollecte::all(); // Récupérer tous les événements de collecte
        return view('Notification.create', compact('evenements'));
    }

    // Créer une nouvelle notification
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'date_heure' => 'required|date',
            'statut' => 'required|string|min:3|max:50', // Longueur minimale et maximale
            'message' => 'required|string|min:5|max:500', // Longueur minimale et maximale
            'evenement_collecte_id' => 'required|exists:evenement_collectes,id',
        ]);

        Notification::create($request->all());

        return redirect()->route('notification.index')->with('success', 'Notification créée avec succès !');
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        $evenements = EvenementCollecte::all(); // Récupérer tous les événements de collecte
        return view('Notification.edit', compact('notification', 'evenements'));
    }

    // Mettre à jour une notification existante
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'date_heure' => 'required|date',
            'statut' => 'required|string|min:3|max:50', // Longueur minimale et maximale
            'message' => 'required|string|min:5|max:500', // Longueur minimale et maximale
            'evenement_collecte_id' => 'required|exists:evenement_collectes,id',
        ]);

        $notification = Notification::findOrFail($id);
        $notification->update($request->all());

        return redirect()->route('notification.index')->with('success', 'Notification mise à jour avec succès !');
    }

    // Supprimer une notification
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notification.index')->with('success', 'Notification supprimée avec succès !');
    }
}
