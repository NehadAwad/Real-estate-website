<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Throwable;
use Session;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Pipeline;
use App\Actions\Fortify\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\LoginResponse;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
         
    }

    public function loginForm(){
    	return view('auth.adminlogin', ['guard' => 'admin']);
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    public function postLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        

       
            
        $admin=Admin::where ('email','=',$request->email)->first();
        if($admin){
            if (Hash::check($request->password, $admin->password)) {
                // Success
                return redirect('admin/dashboard');
            }

            
        
    }
        else{
        return back()->with('fail','No such email exist');
        }

            
        

    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }


    public function all_member()
    {
        $user = user::orderBy('id','DESC')->get();         
        return view('admin.all_member',compact('user'));
    }


    public function add(Request $request)
    {
        $add_user = new User;
        $add_user->file_no=$request->get('file-no');
        $add_user->member_name=$request->get('member-name');
        $add_user->father_name=$request->get('father-or-husband-name');
        $add_user->mother_name=$request->get('mother-name');
        $add_user->address=$request->get('mailing-address');
        $add_user->permanent_address=$request->get('permanent-address');
        $add_user->phone_no_1=$request->get('mobile-no-1');
        $add_user->phone_no_2=$request->get('mobile-no-2');
        $add_user->date_of_birth=$request->get('birth-date');
        $add_user->email=$request->get('email');
        $add_user->national_id=$request->get('NID');
        $add_user->profession=$request->get('profession');
        $add_user->office_address=$request->get('office-address');
        $add_user->designation=$request->get('designation');
        $add_user->nominee_name=$request->get('nominee-name');
        $add_user->relation_with_member=$request->get('relation');
        $add_user->building_no=$request->get('building-number');
        $add_user->total_amount=$request->get('amount');
        $add_user->no_of_installment=$request->get('installment-number');
        $add_user->installment_start_from=$request->get('installment-start');
        $add_user->description=$request->get('description');
        if($request->hasfile('member_img'))
            {
                $file = $request->file('member_img');
                $extension = $file->getClientOriginalExtension();
                $filename = time().".".$extension;
                $file->move("Upload_image/", $filename);
                $add_user->profile_photo_path = $filename;
            }
        if($request->hasfile('nominee_img'))
            {
                $file = $request->file('nominee_img');
                $extension = $file->getClientOriginalExtension();
                $filename = strtotime("+1 minutes").".".$extension;
                $file->move('Upload_image/', $filename);
                $add_user->nominee_image = $filename;
            }
        $add_user->booking_money=$request->get('booking-money');
        $add_user->down_payment=$request->get('down-payment');
        $add_user->car_parking=$request->get('car-parking');
        $add_user->land_filling_1=$request->get('land-filling-1');
        $add_user->land_filling_2=$request->get('land-filling-2');
        $add_user->building_pilling=$request->get('building-pilling');
        $add_user->first_roof_casting=$request->get('roof-casting');
        $add_user->finishing_work=$request->get('finishing-work');
        $add_user->after_handover_money=$request->get('after-handover-money');
        
        
        
        
        $add_user->password=Hash::make($request->get('password'));
       
        echo "<h1>Data Inserted Successfully<h1>";

        //Initial DUE amount adding
        $due_money = $request->get('amount') - $request->get('booking-money') - $request->get('car-parking') - $request->get('land-filling-1') - $request->get('land-filling-2') - $request->get('building-pilling') - $request->get('roof-casting') - $request->get('finishing-work') - $request->get('after-handover-money');
        
        //saving intial due to the database
        $add_user->due_amount=$due_money;

        $add_user->save();
        return redirect("/member/{$add_user->id}");
    
        
    }

    public function profile($id)
    {
        $user= user::find($id);

      
        //DUE money calculation
        $paid_amount = $user->total_amount - $user->due_amount;  //have to fetch last installment

        return view('admin.admin_member_profile',compact('user', 'paid_amount'));
    }
    //for pdf creation
    public function viewPDF($id){
        $user= user::find($id);
        return view('admin.user_view',compact('user'));

    }
    public function pdfDownload($id){
        $user= user::find($id);
        $pdf = PDF::loadView('admin.user_pdf', compact('user'));
        return $pdf->stream('user_pdf.pdf');

    }

    public function adminData(){

        $user= User::all();
        $count = $user->count();
        //dd($count);
        return view('admin.index', ['count'=> $count ]);
    }
    public function update_member(Request $request,$id)
    {
        $add_user=User::find($id);
        
        $add_user->member_name=$request->member_name;
        $add_user->father_name=$request->father_name;
        $add_user->mother_name=$request->mother_name;
        $add_user->address=$request->mailing_address;
        $add_user->permanent_address=$request->permanent_address;
        $add_user->phone_no_1=$request->mobile_1;
        $add_user->phone_no_2=$request->mobile_2;
        $add_user->date_of_birth=$request->birth_date;
        $add_user->email=$request->email;
        $add_user->national_id=$request->NID;
        $add_user->profession=$request->profession;
        $add_user->office_address=$request->office_address;
        $add_user->designation=$request->designation;
        $add_user->nominee_name=$request->nominee_name;
        $add_user->relation_with_member=$request->relation;
        $add_user->building_no=$request->building_number;
        $add_user->total_amount=$request->amount;
        $add_user->no_of_installment=$request->installment_number;
        $add_user->installment_start_from=$request->installment_start;
        $add_user->description=$request->description;
        if($request->hasfile('member_img'))
            {
                $file = $request->file('member_img');
                $extension = $file->getClientOriginalExtension();
                $filename = time().".".$extension;
                $file->move("Upload_image/", $filename);
                $add_user->profile_photo_path = $filename;
            }
        if($request->hasfile('nominee_img'))
            {
                $file = $request->file('nominee_img');
                $extension = $file->getClientOriginalExtension();
                $filename = strtotime("+1 minutes").".".$extension;
                $file->move('Upload_image/', $filename);
                $add_user->nominee_image = $filename;
            }
        $add_user->booking_money=$request->booking_money;
        $add_user->down_payment=$request->down_payment;
        $add_user->car_parking=$request->car_parking;
        $add_user->land_filling_1=$request->land_filling_1;
        $add_user->land_filling_2=$request->land_filling_2;
        $add_user->building_pilling=$request->building_pilling;
        $add_user->first_roof_casting=$request->roof_casting;
        $add_user->finishing_work=$request->finishing_work;
        $add_user->after_handover_money=$request->after_handover_money;
        $add_user->password=Hash::make($request->get('password'));
        $add_user->save();
        echo "<h1>Data Updated Successfully<h1>";
        return redirect("/member/{$add_user->id}");

    


    }
}

