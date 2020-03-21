<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dev;
use App\Tech;

class DevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Dev = Dev::with('techs')->get();
        return response()->json(['data'=>$Dev, 'status'=>true]);
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
    public function store(Request $request)
    {
        //
        $github_username = $request->all()['github_username'];
        //Pega os dados do GitHub usando o GuzzleHTTP, semelhante ao Axios usado na aula
        $github = new \GuzzleHttp\Client(['verify' => false]); //Bloqueia verificação de certificado
        $user = json_decode($github->request('GET', "https://api.github.com/users/${github_username}")->getBody());

        //Condição para name
        if(isset($user->name)){
          $name = $user->name;
        }else{
          $name = $user->login;
        }

        //Cria o Payload para cadastro(Infelizmente o PHP não tem um "spread like" para fazer isso)
        $payload = [
          "name" => $name,
          "github_username" => $user->login,
          "bio" => $user->bio,
          "avatar_url" => $user->avatar_url,
          "latitude" => $request->all()['latitude'],
          "longitude" => $request->all()['longitude']
        ];
        $Dev = Dev::create($payload); //Insere o DEV

        //Prepara as Techs do Dev e insere no mesmo
        $payload = [];
        //O Explode e o Map é similar ao split, map e trim usados no JS, só presentes no PHP 7.1+
        $payload = array_map(fn($tech) => (['name' => trim($tech, " ")]) ,explode(",", $request->all()['techs'])); //Arrow Functions também só no PHP 7.1+
        $Dev->techs()->createMany($payload);
        return $Dev->load('techs');
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
        $Dev = Dev::find($id);
        $Dev->delete();
        return response()->json(['data'=>$Dev, 'status'=>true]);
    }
}
