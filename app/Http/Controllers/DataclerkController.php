<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataclerkRequest;
use App\Http\Requests\UpdateDataclerkRequest;
use App\Repositories\DataclerkRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Dataclerk;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
use File;
class DataclerkController extends AppBaseController
{
    /** @var  DataclerkRepository */
    private $dataclerkRepository;

    public function __construct(DataclerkRepository $dataclerkRepo)
    {
        $this->dataclerkRepository = $dataclerkRepo;
    }

    /**
     * Display a listing of the Dataclerk.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $dataclerks = $this->dataclerkRepository->all();

        return view('dataclerks.index')
            ->with('dataclerks', $dataclerks);
    }

    /**
     * Show the form for creating a new Dataclerk.
     *
     * @return Response
     */
    public function create()
    {
        return view('dataclerks.create');
    }

    /**
     * Store a newly created Dataclerk in storage.
     *
     * @param CreateDataclerkRequest $request
     *
     * @return Response
     */
    public function store(CreateDataclerkRequest $request)
    {
        try{
   
        $input = $request->all();
        //NAP ADD NAN USER TABLE LA AVANN
        $user = new User;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->username = $request->username;
        $user->role = 1;
        $user->email = $request->email;
        $password = 'qwerty123';//nou ka genere yon ran si nou vle
        $user->password = Hash::make( $password);
        $save =$user->save();
        $user_id =DB::getPdo()->lastInsertId();
        
        //AND NAP ADD TEACHER A AK ID USER A AS user_id
        if($save){

            //GESTION DE L'IMAGE
            $image = $request->file('image');
            $image_name = "";
            if($image==null){
                $image_name = "defaultAvatar.png";
            }
            else{
                $genarate_name = uniqid()."_".time().date("Ymd")."_IMG";
                $image_name = $genarate_name.'.'.$image->getClientOriginalExtension();
                
            }
            if($image ==null){

            }else{
                $image->move(public_path('user_images'), $image_name);
            }

            $dataclerk = new Dataclerk;
            $dataclerk->nom = $request->nom;
            $dataclerk->prenom = $request->prenom;
            $dataclerk->username = $request->username;
            $dataclerk->sexe = $request->sexe;
            $dataclerk->email = $request->email;
            $dataclerk->user_id = $user_id;
            $dataclerk->image = $image_name;
            //   dd($dataclerk->user_id);
            $dataclerk->save();
        }
            

        // $dataclerk = $this->dataclerkRepository->create($input);

        Flash::success('Dataclerk enregistré avec succès.');

        return redirect(route('dataclerks.index'));
    }catch(\Illuminate\Database\QueryException $e){
        //if email  exist before in db redirect with error messages
        Flash::error('Email ou username existant');
        return redirect(route('dataclerks.index'));
       }

    }

    /**
     * Display the specified Dataclerk.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataclerk = $this->dataclerkRepository->find($id);

        if (empty($dataclerk)) {
            Flash::error('Dataclerk not found');

            return redirect(route('dataclerks.index'));
        }

        return view('dataclerks.show')->with('dataclerk', $dataclerk);
    }

    /**
     * Show the form for editing the specified Dataclerk.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataclerk = $this->dataclerkRepository->find($id);

        if (empty($dataclerk)) {
            Flash::error('Dataclerk not found');

            return redirect(route('dataclerks.index'));
        }

        return view('dataclerks.edit')->with('dataclerk', $dataclerk);
    }

    /**
     * Update the specified Dataclerk in storage.
     *
     * @param int $id
     * @param UpdateDataclerkRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataclerkRequest $request)
    {
        try{
        $dataclerk = $this->dataclerkRepository->find($id);

        //NAP SAVE USER A AVAN POU SI EMAIL LA TA DUPLIKE POU LI GENTAN EXIT
        $user = array(
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email, 
            'username' => $request->username      
            
        );
        User::findOrFail($dataclerk->user_id)->update($user);

        if (empty($dataclerk)) {
            Flash::error('Dataclerk introuvable');

            return redirect(route('dataclerks.index'));
        }
            //CHECK IF THE IMAGE HAS CHANGED
        if($request->image != $dataclerk->image){
            //DELETE OLD IMAGE
            if( $dataclerk->image !='defaultAvatar.png' 
          && $request->image != null ){
                  File::delete(public_path().'/user_images/'.$dataclerk->image);
      
            }
        }
        $image = $request->file('image');
        
        if($image ==null){
            $image_name = $dataclerk->image;
          
        }else{
            $image_name = uniqid()."_".time().date("Ymd")."_IMG".'.'.$image->getClientOriginalExtension();
            $image->move(public_path('user_images'), $image_name);

        }
        $dataclerk->fill($request->except(['token','image']));
        // $dataclerk = $this->dataclerkRepository->update($request->all(), $id);
        $dataclerk->image= $image_name ;
        $dataclerk->save();
        Flash::success('Dataclerk modifié avec succès.');

        return redirect(route('dataclerks.index'));
    }catch(\Illuminate\Database\QueryException $e){
        //if email  exist before in db redirect with error messages
        Flash::error('Email ou username existant');
        return redirect(route('dataclerks.index'));
       }
    }

    /**
     * Remove the specified Dataclerk from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataclerk = $this->dataclerkRepository->find($id);
        //on supprime l'utilisateur
        User::findOrFail($dataclerk->user_id)->forcedelete();

        if (empty($dataclerk)) {
            Flash::error('Dataclerk introuvable');

            return redirect(route('dataclerks.index'));
        }
        //REMOVE THE IMAGE FROM THE teacher_images FOLDER
        if( $dataclerk->image !='defaultAvatar.png' ){
            File::delete(public_path().'/user_images/'.$dataclerk->image);
            }

        $dataclerk->forcedelete($id);
        Flash::success('Dataclerk supprimé avec succès.');
        return redirect(route('dataclerks.index'));
    }
}
