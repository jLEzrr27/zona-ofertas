<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("app.offer-zone.index");
    }

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
    public function store(Request $request) #Con este método, enviamos el correo por axios
    {   
        try {
            $friend_name = $request->friend_name ? $request->friend_name : NULL; 
            $your_name = $request->your_name ? $request->your_name : NULL;

            $var_view = [
                'friend_name' => $friend_name,
                'your_name' => $your_name,
                'date_send' => date("d/m/Y")
            ];
            $view = view('app.email_views.views.offer')->with($var_view);

            $data = [
                'subject' => "Tu amigo(a) ".$your_name." te ha compartido una oferta que no deberías perderte!",
                'view' => $view,
            ];

            if($request->friend_email){

                \Mail::to($request->friend_email)->send(new \App\Mail\SystemMail($data));

                if (count(\Mail::failures()) > 0) {
                    return response()->json([
                        'message' => 'Falló al enviar correo. Intenta de nuevo o contacta con soporte',
                        'data' => $data,
                        'status' => "danger",
                        'success' => false
                    ]);
                }
                else{
                    return response()->json([
                        'message' => 'Oferta compartida con éxito!',
                        'data' => $data,
                        'status' => "success",
                        'success' => true
                    ]);
                }
            }
            else{
                return response()->json([
                    'message' => 'Debes ingresar el correo de tu amigo!',
                    'status' => "danger",
                    'success' => false
                ]);               
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => "danger",
                'success' => false
            ]);
        }
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
