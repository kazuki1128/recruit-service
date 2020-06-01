<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Campany; //追加

class CampaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $campanies = $user->campanies()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'campanies' => $campanies,
            ];
        }
        
        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campany = new Campany;
        
        return view('campanies.create', [
            'campany' => $campany,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
       $request->user()->campanies()->create([
            'content' => $request->content,
          ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campany = \App\Campany::find($id);
          
          if(\Auth::id() === $campany->user_id){
            
            return view('campanies.show', [
                'campany' => $campany,
            ]);
          }else{
              return redirect('/');
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campany = \App\Campany::find($id);
          
          if(\Auth::id() === $campany->user_id){
            
            return view('campanies.edit', [
                'campany' => $campany,
            ]);
          }else{
              return redirect('/');
          }
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
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $campany = Campany::find($id);
        $campany->content = $request->content;
        $campany->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campany = \App\Campany::find($id);
       
       if(\Auth::id() === $campany->user_id){
           $campany->delete();
       }
        
        return redirect('/');
    }
}
