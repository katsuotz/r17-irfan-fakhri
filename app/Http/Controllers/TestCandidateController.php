<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestCandidateRequest;
use App\Models\TestCandidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $candidates = new TestCandidate();

        if ($search)
            $candidates = $candidates->where('nama', 'like', '%' . $search . '%');

        return view('home', [
            'candidates' => $candidates->get(),
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestCandidateRequest $request)
    {
        try {
            TestCandidate::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
            ]);

            return redirect('/')->with('success', 'Data has been created!');
        } catch (\Exception $exception) {
            return redirect('/')->with('error', 'Oops! Something went wrong. Please try again later');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TestCandidate $testCandidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestCandidate $testCandidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestCandidateRequest $request, TestCandidate $testCandidate)
    {
        try {
            $testCandidate->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
            ]);

            return redirect('/')->with('success', 'Data has been updated!');
        } catch (\Exception $exception) {
            return redirect('/')->with('error', 'Oops! Something went wrong. Please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestCandidate $testCandidate)
    {
        try {
            $testCandidate->delete();

            return redirect('/')->with('success', 'Data has been deleted!');
        } catch (\Exception $exception) {
            return redirect('/')->with('error', 'Oops! Something went wrong. Please try again later');
        }
    }

    /**
     * Import data from json.
     */
    public function import(Request $request)
    {
        try {
            $response = Http::get($request->url);
            $data = array_map(function ($item) {
                unset($item['id']);
                return $item;
            }, $response->json());
            TestCandidate::insert($data);

            return redirect('/')->with('success', 'Data import successful!');
        } catch (\Exception $exception) {
            return redirect('/')->with('error', 'Oops! Something went wrong. Please try again later');
        }
    }
}
