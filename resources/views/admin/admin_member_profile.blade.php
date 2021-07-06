@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ (!empty($user->profile_photo_path))?url('Upload_image/' 
                       .$user->profile_photo_path):url('storage/profile-photos/8o0QK4BIs6SkJESuPhm1N7adEo2eEG7HaIU224Yi.jpg') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->member_name}}</h3>

                <p class="text-muted text-center">{{$user->profession}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Total Taka</b> <a class="float-right">{{$user->total_amount}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Paid</b> <a class="float-right">{{ $paid_amount }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Due</b> <a class="float-right">{{ $user->due_amount }}</a>
                  </li>
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Profession</strong>

                <p class="text-muted">{{ $user->profession }}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Address</strong>

                <p class="text-muted"> {{ $user->address }}</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  
                  
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    
                    <!-- /.post -->

                    <!-- Post -->
                   
                    <!-- /.post -->

                    <!-- Post -->
                    <di
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form method="POST" action="/update/{{$user->id}}" enctype="multipart/form-data">
                      @csrf
                      <h2 class="text-center mb-4 mt-4">Update Member</h2>
                      <div class="container">            
                          
                          <div class="form-group mb-3">
                              <label>Member Name</label>
                              <input type="text" name="member_name" value="{{$user->member_name}}" id="member-name" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Father/Husband Name</label>
                              <input type="text" name="father_name" value="{{$user->father_name}}" id="father_name" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Mother Name</label>
                              <input type="text" name="mother_name" id="mother-name" value="{{$user->mother_name}}" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Mailing Address</label>
                              <input type="text" name="mailing_address" value="{{$user->address}}" id="mailing-address" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Permanent Address</label>
                              <input type="text" name="permanent_address" id="permanent-address" value="{{$user->permanent_address}}" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Mobile Number 1</label>
                              <input type="tel" name="mobile_1" value="{{$user->phone_no_1}}"  id="mobile-no-1" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Mobile Number 2</label>
                              <input type="tel" name="mobile_2" value="{{$user->phone_no_2}}" id="mobile-no-2" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Date of Birth/Age</label>
                              <input type="date" name="birth_date" value="{{$user->date_of_birth}}" id="birth-date" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Email Address</label>
                              <input type="email" name="email" value="{{$user->email}}" id="email" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>National ID Number</label>
                              <input type="text" name="NID" id="NID" value="{{$user->national_id}}" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Profession</label>
                              <input type="text" name="profession" value="{{$user->profession}}" id="profession" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Office Address</label>
                              <input type="text" name="office_address" value="{{$user->office_address}}" id="office-address" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Designation</label>
                              <input type="text" name="designation" value="{{$user->designation}}" id="designation" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Nominee Name</label>
                              <input type="text" name="nominee_name" value="{{$user->nominee_name}}" id="nominee-name" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Relation With Member</label>
                              <input type="text" name="relation" value="{{$user->relation_with_member}}" id="relation" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Building Number</label>
                              <input type="text" name="building_number" value="{{$user->building_no}}" id="building-number" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Total Amount</label>
                              <input type="text" name="amount" value="{{$user->total_amount}}" id="amount" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>No. Of Installment</label>
                              <input type="text" name="installment_number" value="{{$user->no_of_installment}}" id="installment-number" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Installment Start From</label>
                              <input type="date" name="installment_start" value="{{$user->installment_start_from}}" id="installment-start" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Description</label>
                              <input type="text" name="description" value="{{$user->description}}" id="description" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Member Image</label>
                              <input type="file" name="member_img" id="member-img" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Nominee Image</label>
                              <input type="file" name="nominee_img" id="nominee-img" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Booking Money</label>
                              <input type="text" name="booking_money" value="{{$user->booking_money}}" id="booking-money" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Down Payment</label>
                              <input type="text" name="down_payment" value="{{$user->down_payment}}" id="down-payment" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Car Parking</label>
                              <input type="text" name="car_parking" value="{{$user->car_parking}}" id="car-parking" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Land Filling(1st)</label>
                              <input type="text" name="land_filling_1" value="{{$user->land_filling_1}}" id="land-filling-1" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Land Filling(2nd)</label>
                              <input type="text" name="land_filling_2" value="{{$user->land_filling_2}}" id="land-filling-2" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Building Pilling</label>
                              <input type="text" name="building_pilling" value="{{$user->building_pilling}}" id="building-pilling" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>1st floor Roof Casting</label>
                              <input type="text" value="{{$user->first_roof_casting}}" name="roof_casting" id="roof-casting" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>Finishing Work</label>
                              <input type="text" name="finishing_work" value="{{$user->finishing_work}}" id="finishing-work" class="form-control">
                          </div>
                          <div class="form-group mb-3">
                              <label>After Handover Money</label>
                              <input type="text" name="after_handover_money" value="{{$user->after_handover_money}}" id="after-handover-money" class="form-control">
                          </div>
                          {{-- <div class="form-group mb-3">
                              <label>Password</label>
                              <input type="password" name="password" id="password" class="form-control">
                          </div> --}}
                          <button type="submit" class="btn btn-primary mb-3">Submit</button>
                      </div>
                  </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">User Information</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Booking Money</th>
                      <th>Amount</th>
                      <th>Due</th>
                      <th>Start Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                      <td>{{ $user->booking_money}}</td>
                      <td>{{ $user->total_amount}}</td>
                      <td>{{ $user->due_amount }}</td>
                      <td>{{ $user->installment_start_from }}</td>
                    </tr>
                    </tbody>
                 
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

      <!-- for pdf  -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <a href="/member/{{$user->id}}/viewpdf" class="btn btn-lg btn-danger my-3">View PDF</a>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

    </div>

     
  @endsection

