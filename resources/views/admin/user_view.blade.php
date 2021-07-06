<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Generate Pdf</title>

    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }
        table {
            border: 1px solid #C9CACC;
        }

        table tr td {
            width: 50%;
            padding: 5px 10px;
            border: 1px solid #C9CACC;
            border-right: 0px;
            border-left: 0px;
        }
        
        @media print {
            body {
            font-family: 'Source Sans Pro', sans-serif!important;
            font-size: 16px!important;
            line-height: 1.6!important;
        }

        table {
            border: 0px!important;
        }

        table tr {
            border: 1px solid #C9CACC!important;
        }

        table tr th,
        table tr td {
            
            padding: 10px!important;
            border-bottom: 0px!important;
            font-family: 'Source Sans Pro', sans-serif!important;
        }

        table tr td a,
        table tr th,
        table tr td b {
            color: #1F1752!important;
            font-size: 18px!important;
        }

        table tr td b {
            padding-right: 5px!important;
        }

        .border_none tr td {
            border: 0!important;
        }
        }

        @media print {
            table tr td a {
                display:none;
                height: 0px;
        }
              
        }
        
    </style>
</head>

<body>
        <table cellpadding="0" cellspacing="0" border="0" align="center" width="1000" style="border: 0px;">
            <tr>
                <td style="border:0px;">
                <a href="/member/{{$user->id}}/pdf" style="padding: 12px 25px; background: #c82333; font-size:18px;font-width:bold;text-decoration:none; color:#fff; border-radius:10px;margin-top: 10px;">Download PDF</a>
                <a href="#" onclick="window.print()" style="padding: 12px 25px; background: #007bff; font-size:18px;font-width:bold;text-decoration:none; color:#fff; border-radius:10px;margin-top: 10px;">Print</a>
                </td>
            </tr>
        </table>

    <table cellpadding="0" cellspacing="0" border="0" align="center" width="1000" style="border: 0px;">
        <tr>
            <td style="border: 0px; padding: 0px;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px !important;">
                    <tr>

                        <td width="50%" style="border: 0px !important;">
                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px; padding-right: 20px">
                                <tr>
                                    <td style="border: 0px !important">
                                        <p>Applicant's Photo:</p>

                                    </td>
                                    <td height="150" width="150" style="border: 0px">
                                    <p style="height: 150px; width: 150px !important;float: right;border-radius:50%;overflow:hidden;">
                                    <img src="{{asset('upload_image/'.$user->profile_photo_path)}}" alt="" style="height:100%;width:100%;">
                                </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="50%" style="border: 0px;">
                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px; margin-left: 20px">
                                <tr>
                                    <td style="border: 0px !important">
                                        <p>Nommies's Photo1:</p>

                                    </td>
                                    <td height="150" width="150" style="border: 0px; ">
                                        <p style="height: 150px; width: 150px !important;float: right;border-radius:50%;overflow:hidden;">
                                     <img src="{{asset('upload_image/'.$user->nominee_image)}}" alt="" style="height:100%;width:100%;">
                                </p>
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 0px !important; padding: 0 !important;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                    <tr>
                        <td>File No:</td>
                        <td>{{$user->file_no}}</td>
                    </tr>
                    <tr>
                        <td>Applicant Name:</td>
                        <td>{{$user->member_name}}</td>
                    </tr>
                    <tr>
                        <td>Father/Husband Name:</td>
                        <td>{{$user->father_name}}</td>
                    </tr>
                    <tr>
                        <td>Mother Name:</td>
                        <td>{{$user->mother_name}}</td>
                    </tr>
                    <tr>
                        <td>Malling Address:</td>
                        <td>{{$user->address}}</td>
                    </tr>
                    <tr>
                        <td>Parment Address:</td>
                        <td>{{$user->permanent_address}}</td>
                    </tr>
                    <tr>
                        <td>Mobile No 1:</td>
                        <td>{{$user->phone_no_1}}</td>
                    </tr>
                    <tr>
                        <td>Mobile No 2:</td>
                        <td>{{$user->phone_no_2}}</td>
                    </tr>
                    <tr>
                        <td>Date of Birth:</td>
                        <td>{{$user->date_of_birth}}</td>
                    </tr>
                    <tr>
                        <td>Fax:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>National ID No:</td>
                        <td>{{$user->national_id}}</td>
                    </tr>
                    <tr>
                        <td>Profession/Occupassion:</td>
                        <td>{{$user->profession}}</td>
                    </tr>
                    <tr>
                        <td>Office Address:</td>
                        <td>{{$user->office_address}}</td>
                    </tr>
                    <tr>
                        <td>Designation:</td>
                        <td>{{$user->designation}}</td>
                    </tr>
                    <tr>
                        <td>Nominee:</td>
                        <td>{{$user->nominee_name}}</td>
                    </tr>
                    <tr>
                        <td>Relation With Applicant:</td>
                        <td>{{$user->relation_with_member}}</td>
                    </tr>
                    <tr>
                        <td>Building No:</td>
                        <td>{{$user->building_no}}</td>
                    </tr>
                    <tr>
                        <td>Total Amount:</td>
                        <td>{{$user->total_amount}}</td>
                    </tr>
                    <tr>
                        <td>No of Installment:</td>
                        <td>{{$user->no_of_installment}}</td>
                    </tr>
                    <tr>
                        <td>Installment Start Form:</td>
                        <td>{{$user->installment_start_from}}</td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>{{$user->description}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <h3 style="color: red;">Total Deu</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="background: red; color: #fff;border: 0"> Total Amount : 1600000</td>
                    </tr>
                    <tr>
                        <td style="border: 0px;padding: 0px;">
                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                <tr>
                                    <td style="border-left: 0px;">Building No</td>
                                    <td style="border-left: 0px;">ddddd</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Client Name</td>
                                    <td style="border-left: 0px;">ddddd</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Total Amount</td>
                                    <td style="border-left: 0px;">ddddd</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Booking Money</td>
                                    <td style="border-left: 0px;">Paid:0 Due:00</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Down Money</td>
                                    <td style="border-left: 0px;">Paid:0 Due:00</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Car Parking</td>
                                    <td style="border-left: 0px;">Paid:0 Due:00</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Land Filling</td>
                                    <td style="border-left: 0px;">Paid:0 Due:00</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Land Filling</td>
                                    <td style="border-left: 0px;">Paid:0 Due:00</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Building Pilling </td>
                                    <td style="border-left: 0px;">Paid:0 Due:00</td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">1st flor Roof Custing: </td>
                                    <td style="border-left: 0px;">Paid:0 Due:00</td>
                                </tr>

                            </table>
                        </td>
                        <td style="border: 0px;padding: 0px;">
                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
                                <tr>
                                    <td style="border-left:0px;"><b>Total Paid :</b></td>
                                    <td>20000</td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;">Current Date Due</td>
                                    <td>ccccsdsdf</td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;"><b>Date</b></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;">Booking Date:</td>
                                    <td>>2018-02-12</td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;">Down Date</td>
                                    <td>>2018-02-12</td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;">Car Parking Date</td>
                                    <td>2018-02-12</td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;">Land Filling(1) Date </td>
                                    <td>2018-02-12</td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;">Land Filling(2) Date </td>
                                    <td>2018-02-12</td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;">Building Piling Date </td>
                                    <td>2018-02-12</td>

                                </tr>
                                <tr>
                                    <td style="border-left:0px;">!st Floor Roof Date </td>
                                    <td>2018-02-12</td>

                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
