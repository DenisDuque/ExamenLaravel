<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciutat;
use App\Models\Casal;
use Carbon\Carbon;
class CasalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $casals = Casal::all();
        return view('dashboard', [
            'casals' => $casals
        ]);
    }

    public function showCreate()
    {
        $ciutats = Ciutat::all();
        return view('create', [
            'ciutats' => $ciutats
        ]);
    }

    public function compareDates($request) {
        $data_inici = new Carbon($request->input('data_inici'));
        $data_final = new Carbon($request->input('data_final'));
        
        if ($data_inici->lt($data_final)) {
            return true;
        }
        return false;
    }

    public function createCasal() {
        request()->validate([
            'nom' => 'required|string',
            'data_inici' => 'required|date|after:tomorrow',
            'data_final' => 'required|date|after:tomorrow',
            'n_places' => 'required|numeric',
            'ciutat_id' => 'required'
        ]);

        if ($this->compareDates(request())) {
            
            Casal::create([
                'nom' => request('nom'),
                'data_inici' => request('data_inici'),
                'data_final' => request('data_final'),
                'n_places' => request('n_places'),
                'ciutat_id' => request('ciutat_id')
            ]);
            return redirect()->route('home')->with('success', 'Casal creat.');   
        } else {
            return redirect()->back()->with('error', 'Fechas incorrectas');
        }


    }

    public function showEdit($id)
    {
        $casal = Casal::find($id);
        $ciutats = Ciutat::all();
        return view('edit', [
            'casal' => $casal,
            'ciutats' => $ciutats
        ]);
    }
    public function updateCasal() {
        request()->validate([
            'casalId' => 'required'
        ]);
        $casal = Casal::find(request('casalId'));
        if ($casal) {
            request()->validate([
                'nom' => 'required|string',
                'data_inici' => 'required|date',
                'data_final' => 'required|date',
                'n_places' => 'required|numeric',
                'ciutat_id' => 'required'
            ]);
            if ($this->compareDates(request())) {
                $updatedValues = [
                    'nom' => request('nom'),
                    'data_inici' => request('data_inici'),
                    'data_final' => request('data_final'),
                    'n_places' => request('n_places'),
                    'ciutat_id' => request('ciutat_id')
                ];
    
                $casal->update($updatedValues);
                return redirect()->route('home')->with('success', 'Casal actualitzat.');    
            } else {
                return redirect()->back()->with('error', 'Fechas incorrectas');
            }
        }

    }

    public function deleteCasal($casalId) {
        Casal::find($casalId)->delete();
        return redirect()->route('home')->with('success', 'Casal remogut.');   
    }
}
