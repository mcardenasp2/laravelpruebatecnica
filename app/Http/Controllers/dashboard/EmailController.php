<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailPost;
use App\Jobs\SendEmail;
use App\Models\ClientMail;
use App\Models\Email;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);
    }
    public function index()
    {

        // $emails = Job::join("email","email.estado", "=", "job.clave");

        // $emails=Email::
        // join('jobs','jobs.id','=','emails.estado')->
        // join('categories','categories.id','=','posts.category_id')->
        // select('emails.*','jobs')->
        

        // DB::table('emails')
        //     ->where('id', $emp_Id)->distinct()
        //     ->update(array( 'emp_Apellido' => Input::get('Apellido'),
        //                              'emp_Nombre'   => Input::get('Nombres')));

        // $sql = "UPDATE email set email.estado=0  FROM job WHERE email.estado <> job.id";
        // DB::select($sql);
        // dd(Auth::user()->id);
        // $emails=Email::with('job')->where('user_id',Auth::user()->id);
        // $emails=Email::all();
        $emails=Email::all();
        // dd($emails);

        // $this->sendEmail();



        return view('dashboard.email.index',
        compact('emails')
        
    );

    }

    public function create()
    {

        return view('dashboard.email.create');
    }

    public function store(StoreEmailPost $request)
    {
        // dd($request['asunto']);


        $data=$request->cuerpo;
        $destinatario=$request['destinatario'];
        $asunto=$request['asunto'];
        

        // Mail::send('dashboard.email.email', $data, function($message) use ($asunto,$destinatario) {
        //     $message->to( $destinatario, "Marco")->subject($asunto);
        // });
        // dd(Auth::user()->email);
        // Mail::to("mcardenasp2@unemi.edu.ec")->send(new ClientMail());

        // a quien recibe
        // dd(Auth::user()->email);
        // SendEmail::dispatch('mcardenasp5@unemi.edu.ec','envio por colas');
        SendEmail::dispatch($destinatario,$data,$asunto);

        // dd($valor);

        // DB::beginTransaction();
            $job=Job::orderby('created_at','DESC')->take(1)->pluck('id')->first();
            // dd($job);
            // $job+=1;
            $user = Email::create([
                'destinatario' => $request['destinatario'],
                'asunto' => $request['asunto'],
                'cuerpo' => $request['cuerpo'],
                'user_id'=>Auth::user()->id,
                'estado'=>$job,
                
            ]);
        // DB::commit();

        return $this->index();

    }

    public function sendEmail()
    {
        $data['title']="datos de prueba";

        Mail::send('dashboard.email.email',$data,function($message){
            $message->to('mcardenasp2@unemi.edu.ec','Pepito')->
            subject("Gracias por escribinos");

        });
    }
}
