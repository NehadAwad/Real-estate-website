<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Installment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class InstallmentController extends Controller
{
    public function show()
    {
        return view('admin.create');
    }

    public function addInstallments(Request $request){
        
    $user = DB::table('users')->where('file_no', $request->file_no)->first();
    $user_id=$user->id;
    $user_file_table = $user->file_no;
    $user_name_table = $user->member_name;
    $total_amount_table = $user->total_amount;
    $last_installment=$request->installment;
    
    $current_date= Carbon::today();
      
    $today=$current_date->toDateString();
    

    // $due =  DB::table('installments')->where('total_due', $request->file)->get();
    // $due_table = $due->id;
    
    
    //INSTALLMENT database part
    $installment = new Installment();
    $installment->user_id = $user_id;
    $installment->installment_amount = $request->installment;
    $installment->installment_date=$today;
    $installment->save();

    $ins =  DB::table('installments')->where('user_id', $user_id)->get();
    $num_ins_table = $ins->count();

    //DUE money calculation
    // $due_money = $user->total_amount - $user->booking_money - $user->car_parking - $user->land_filling_1 - $user->land_filling_2 - $user->first_roof_casting - $user->finishing_work - $user->after_handover_money - $last_installment; 


    $data = User::find($user->id);
    $data->due_amount = $data->due_amount- $last_installment;
    $due = $data->due_amount;
    $data->save();
   
    //return value part
    return view('admin.add')->with(compact('user_file_table','last_installment','user_name_table', 'today', 'total_amount_table','num_ins_table', 'due'));
	}

}