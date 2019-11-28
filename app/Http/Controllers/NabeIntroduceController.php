<?php

namespace App\Http\Controllers;

use App\NabeIntroduce;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NabeIntroduceController extends Controller
{
    public function index()
    {
        $introduces = \App\NabeIntroduce::all();
        return view('introduce.index', compact('introduces'));
    }

    public function create()
    {
        return view('introduce.create');
    }

    public function store(Request $request)
    {
        #file에 사진이 있는지 확인하고 없으면 에러
        if(!$request->file('photo')) {
            return redirect()->back()->withErrors([
                'error' => "사진을 업로드 하세요"
            ]);
        }
        
        #Store
        $path = $request->file('photo')->store('public');

        #사진넣기
        NabeIntroduce::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'url' => Storage::url($path),
            'hashname' => $request->file('photo')->hashName(),
            'originalname' => $request->file('photo')->getClientOriginalName()
        ]);

        #사진 처리 완료되면 실행됨
        return redirect(route('introduces.index'));
    }

    public function show(NabeIntroduce $introduce)
    {
        $introduces = \APP\NabeIntroduce::get();
        return view('introduce.show', compact('introduce', 'introduces'));   
    }

    public function edit(NabeIntroduce $introduce)
    {
        return view('introduce.edit', compact('introduce'));
    }

    public function update(Request $request, NabeIntroduce $introduce)
    {
        #edit에서 수정파일의 경로를 다시 지정
        $path = $request->file('url')->store('public');
        $data = [
            'name' => $request->name,
            'comment' => $request->comment,
            'url' => Storage::url($path),
        ];
        $introduce->update($data);
    
        return redirect(route('introduces.index', $introduce->id));
    }

    public function destroy(NabeIntroduce $introduce)
    {
        $introduce->delete();
        return response()->json([],204);
    }
}
