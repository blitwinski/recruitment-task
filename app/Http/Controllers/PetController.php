<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(['name' => 'required|min:3|max:20',
                            'photo' => 'required|min:3|max:125']);

        $response = Http::post('https://petstore.swagger.io/v2/pet/',
        [
            'name' => $request->input('name'),
            'status' => 'sold',
            'photoUrls' => [$request->input('photo')]

          ]);

        $pets = $response->json();

        if ($response->successful()) {
            return redirect()->route('pets.index')->with('success', 'Updated successfully')
            ->with(['pets' => $pets]);
        } else {
           return redirect()->route('pets.index')->with('error', 'Update failed');
           }

    }

    public function index(Request $request)
    {
        $response = Http::get('https://petstore.swagger.io/v2/pet/findByStatus?status=sold');
        $pets = $response->json();

        return view('pets.index', ['pets' => $pets]);
    }

    public function edit($id)
    {
        $response = Http::get('https://petstore.swagger.io/v2/pet/' . $id);
        $pets = $response->json();

        return view('pets.edit', ['pets' => $pets]);
    }

    public function update(Request $request, $id)
    {
         $response = Http::put('https://petstore.swagger.io/v2/pet/', [
            'id' => $id,
            'name' => $request->input('name'),
            'photoUrls' => [$request->input('photo')],
            'status' => 'sold',
        ]);

        $pets = $response->json();

        if ($response->successful()) {
           return redirect()->route('pets.index')->with('success', 'Updated successfully')
            ->with(['pets' => $pets]);
        } else {
           return redirect()->route('pets.index')->with('error', 'Update failed');
           }
    }

    public function destroy($id)
    {
        $response = Http::delete('https://petstore.swagger.io/v2/pet/' . $id);

        if ($response->successful()) {
            return redirect()->route('pets.index')->with('success', 'Entry deleted');
        } else {
            return redirect()->route('pets.index')->with('error', 'Delete failed');
        }
    }
}
