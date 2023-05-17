<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
            ->myHotels()
            ->create([
                    'nome' => $request->nome,
                       'endereco' => $request->endereco,
                    'num_de_quarto' => $request->num_de_quarto,
                    'classificacao' => $request->classificacao,
                    'cafe_da_manha' => $request->cafe_da_manha,
            ]);

            return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //Hotel $hotel
    {
                $hotel = Hotel::findOrFail($id);    
                $hotel->update([

                      'nome' => $request -> nome,
                      'endereco' => $request -> endereco,
                      'num_de_quarto' => $request -> num_de_quarto,
                      'classificacao' => $request -> classificacao,
                      'cafe_da_manha' => $request -> cafe_da_manha,
                    
                ]);

                      return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect(route('dashboard'));
    }
}
