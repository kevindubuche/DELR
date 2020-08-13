<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContamineRequest;
use App\Http\Requests\UpdateContamineRequest;
use App\Repositories\ContamineRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Contamine;
use App\Models\Epidemiologiste;

use App\Mail\NewContamineNotification;
use Illuminate\Support\Facades\Mail;
class ContamineController extends AppBaseController
{
    /** @var  ContamineRepository */
    private $contamineRepository;

    public function __construct(ContamineRepository $contamineRepo)
    {
        $this->contamineRepository = $contamineRepo;
    }

    /**
     * Display a listing of the Contamine.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contamines = $this->contamineRepository->all();

        return view('contamines.index')
            ->with('contamines', $contamines);
    }

    /**
     * Show the form for creating a new Contamine.
     *
     * @return Response
     */
    public function create()
    {
        return view('contamines.create');
    }

    /**
     * Store a newly created Contamine in storage.
     *
     * @param CreateContamineRequest $request
     *
     * @return Response
     */
    public function store(CreateContamineRequest $request)
    {
        $input = $request->all();

        $contamine = $this->contamineRepository->create($input);

        Flash::success('Contaminé enregistré.');

        $totalContamines = Contamine::get()->count();
        $institution = $input['institution'];


//####################################3

    
//#################################333


         
           
    //   $sendmail=  Mail::send([], [], function ($message) 
    // //   use ($request)
    //   {
    //         $message->to('kevin.dubuche@student.ueh.edu.ht')
    //           ->subject('Il y a un nouveau cas de COVID-19 dans l’institution $X')
    //           // here comes what you want
    //           ->setFrom(['kevindubuche@gmail.com' => 'John Doe'])
    //           ->setBody('test msg'); // assuming text/plain
    //       });



            // if (empty($sendmail)) {
            //     return response()->json(['message' => 'Mail Sent Sucssfully'], 200);
            // }else{
            //     return response()->json(['message' => 'Mail Sent fail'], 400);
            // }
        // }
        // $sendNotification= sendEmail($request);

        //SEND EMAIL*****************************************
        
            $objDemo = new \stdClass();
            $objDemo->totalContamines = $totalContamines;
            $objDemo->institution = $institution;
            
            // $objDemo->demo_two = 'Demo Two Value';
            // $objDemo->sender = 'SenderUserName';
            // $objDemo->receiver = 'ReceiverUserName';
            $epidemiologistes = Epidemiologiste::all();
            foreach($epidemiologistes as  $epidemiologiste){
                $objDemo->receiver = $epidemiologiste->nom.' '.$epidemiologiste->prenom;
                Mail::to($epidemiologiste->email)->send(new NewContamineNotification($objDemo));
            }
            
        // }
        // $sendNotification= send();
        //FIN SEND EMAIL*****************************************

        return redirect(route('contamines.index'));
    }

    /**
     * Display the specified Contamine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contamine = $this->contamineRepository->find($id);

        if (empty($contamine)) {
            Flash::error('Contaminé introuvable');

            return redirect(route('contamines.index'));
        }

        return view('contamines.show')->with('contamine', $contamine);
    }

    /**
     * Show the form for editing the specified Contamine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contamine = $this->contamineRepository->find($id);

        if (empty($contamine)) {
            Flash::error('Contaminé introuvable');

            return redirect(route('contamines.index'));
        }

        return view('contamines.edit')->with('contamine', $contamine);
    }

    /**
     * Update the specified Contamine in storage.
     *
     * @param int $id
     * @param UpdateContamineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContamineRequest $request)
    {
        $contamine = $this->contamineRepository->find($id);

        if (empty($contamine)) {
            Flash::error('Contaminé introuvable');

            return redirect(route('contamines.index'));
        }

        $contamine = $this->contamineRepository->update($request->all(), $id);

        Flash::success('Contaminé modifié.');

        return redirect(route('contamines.index'));
    }

    /**
     * Remove the specified Contamine from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contamine = $this->contamineRepository->find($id);

        if (empty($contamine)) {
            Flash::error('Contaminé introuvable');

            return redirect(route('contamines.index'));
        }

        $this->contamineRepository->delete($id);

        Flash::success('Contaminé supprimé.');

        return redirect(route('contamines.index'));
    }

    public function exportCsv(Request $request)
{
   $fileName = 'MSPP_DELR_Contamines_COVID_19.csv';
   $contamines = Contamine::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
            "Charset"             =>"UTF-8",
            "Content-Encoding"    => "UTF-8"
        );

        // $columns = array('Title', 'Assign', 'Description', 'Start Date', 'Due Date');
        $columns = array('Nom',	'Prénom','Sexe','Commune','Département','Adresse','Institution','Téléphone','Date de création');
        
        $callback = function() use($contamines, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
           // dd('kkk');
            foreach ($contamines as $contamine) {
                $row['Nom']  = $contamine->nom;
                $row['Prénom']    = $contamine->prenom;
                if($contamine->sexe==0){
                  $row['Sexe']    = "Masculin";  
                }
                else{
                    $row['Sexe']    = "Féminin";
                }
                $row['Commune']  = $contamine->commune;
                $row['Département']  = $contamine->departement;
                $row['Adresse']  = $contamine->adresse;
                $row['Institution']  = $contamine->institution;
                $row['Téléphone']  = $contamine->telephone;
                $row['Date de création']  = $contamine->created_at->format('d-m-y');

                fputcsv($file, array($row['Nom'], $row['Prénom'], $row['Sexe'], $row['Commune'], $row['Département'], $row['Adresse'], $row['Institution'], $row['Téléphone'], $row['Date de création']));
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
