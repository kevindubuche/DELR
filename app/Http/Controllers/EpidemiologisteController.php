<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEpidemiologisteRequest;
use App\Http\Requests\UpdateEpidemiologisteRequest;
use App\Repositories\EpidemiologisteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Epidemiologiste;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
use File;

class EpidemiologisteController extends AppBaseController
{
    /** @var  EpidemiologisteRepository */
    private $epidemiologisteRepository;

    public function __construct(EpidemiologisteRepository $epidemiologisteRepo)
    {
        $this->epidemiologisteRepository = $epidemiologisteRepo;
    }

    /**
     * Display a listing of the Epidemiologiste.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $epidemiologistes = $this->epidemiologisteRepository->all();

        return view('epidemiologistes.index')
            ->with('epidemiologistes', $epidemiologistes);
    }

    /**
     * Show the form for creating a new Epidemiologiste.
     *
     * @return Response
     */
    public function create()
    {
        return view('epidemiologistes.create');
    }

    /**
     * Store a newly created Epidemiologiste in storage.
     *
     * @param CreateEpidemiologisteRequest $request
     *
     * @return Response
     */
    public function store(CreateEpidemiologisteRequest $request)
    {
        try{
   
            $input = $request->all();
            //NAP ADD NAN USER TABLE LA AVANN
            $user = new User;
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->username = $request->username;
            $user->role = 2;
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
    
                $epidemiologiste = new Epidemiologiste;
                $epidemiologiste->nom = $request->nom;
                $epidemiologiste->prenom = $request->prenom;
                $epidemiologiste->username = $request->username;
                $epidemiologiste->sexe = $request->sexe;
                $epidemiologiste->email = $request->email;
                $epidemiologiste->telephone = $request->telephone;
                $epidemiologiste->user_id = $user_id;
                $epidemiologiste->image = $image_name;
                //   dd($epidemiologiste->user_id);
                $epidemiologiste->save();
            }
                
    
            // $epidemiologiste = $this->epidemiologisteRepository->create($input);
    
            Flash::success('Epidémiologiste enregistré avec succès.');
    
            return redirect(route('epidemiologistes.index'));
        }catch(\Illuminate\Database\QueryException $e){
            //if email  exist before in db redirect with error messages
            Flash::error('Email ou username existant');
            return redirect(route('epidemiologistes.index'));
           }
    }

    /**
     * Display the specified Epidemiologiste.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $epidemiologiste = $this->epidemiologisteRepository->find($id);

        if (empty($epidemiologiste)) {
            Flash::error('Epidemiologiste not found');

            return redirect(route('epidemiologistes.index'));
        }

        return view('epidemiologistes.show')->with('epidemiologiste', $epidemiologiste);
    }

    /**
     * Show the form for editing the specified Epidemiologiste.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $epidemiologiste = $this->epidemiologisteRepository->find($id);

        if (empty($epidemiologiste)) {
            Flash::error('Epidemiologiste not found');

            return redirect(route('epidemiologistes.index'));
        }

        return view('epidemiologistes.edit')->with('epidemiologiste', $epidemiologiste);
    }

    /**
     * Update the specified Epidemiologiste in storage.
     *
     * @param int $id
     * @param UpdateEpidemiologisteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEpidemiologisteRequest $request)
    {
        // try{
        $epidemiologiste = $this->epidemiologisteRepository->find($id);

        //NAP SAVE USER A AVAN POU SI EMAIL LA TA DUPLIKE POU LI GENTAN EXIT
        $user = array(
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email, 
            'username' => $request->username      
            
        );
        User::findOrFail($epidemiologiste->user_id)->update($user);

        if (empty($epidemiologiste)) {
            Flash::error('Epidémiologiste non trouvé');

            return redirect(route('epidemiologistes.index'));
        }
            //CHECK IF THE IMAGE HAS CHANGED
        if($request->image != $epidemiologiste->image){
            //DELETE OLD IMAGE
            if( $epidemiologiste->image !='defaultAvatar.png' 
          && $request->image != null ){
                  File::delete(public_path().'/user_images/'.$epidemiologiste->image);
      
            }
        }
        $image = $request->file('image');
        
        if($image ==null){
            $image_name = $epidemiologiste->image;
          
        }else{
            $image_name = uniqid()."_".time().date("Ymd")."_IMG".'.'.$image->getClientOriginalExtension();
            $image->move(public_path('user_images'), $image_name);

        }
        $epidemiologiste->fill($request->except(['token','image']));
        // $epidemiologiste = $this->epidemiologisteRepository->update($request->all(), $id);
        $epidemiologiste->image= $image_name ;
        $epidemiologiste->save();
        Flash::success('Epidémiologiste modifié avec succès.');

        return redirect(route('epidemiologistes.index'));
    // }catch(\Illuminate\Database\QueryException $e){
    //     //if email  exist before in db redirect with error messages
    //     Flash::error('Email ou username existant');
    //     return redirect(route('epidemiologistes.index'));
    //    }
    }

    /**
     * Remove the specified Epidemiologiste from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $epidemiologiste = $this->epidemiologisteRepository->find($id);

        if (empty($epidemiologiste)) {
            Flash::error('Epidemiologiste not found');

            return redirect(route('epidemiologistes.index'));
        }

        $this->epidemiologisteRepository->delete($id);

        Flash::success('Epidemiologiste deleted successfully.');

        return redirect(route('epidemiologistes.index'));
    }
}
