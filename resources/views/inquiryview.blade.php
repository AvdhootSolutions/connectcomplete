@extends('layouts.app')
@section('extra-css')
  <link rel="stylesheet" href="{{asset('public/theme/plugins/daterangepicker/daterangepicker.css')}}">
@endsection
@section('content')
 <section class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                 <li class="nav-item"><a class="nav-link active" href="#general_details" data-toggle="tab">General Details</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#payment" data-toggle="tab">Payment Details</a></li>
                                 <!-- <li class="nav-item"><a class="nav-link" href="#executive" data-toggle="tab">Executive</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#crew" data-toggle="tab">Crew</a></li> -->
                                 <li class="nav-item"><a class="nav-link" href="#document" data-toggle="tab">Documents</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#remarks" data-toggle="tab">Remarks</a></li>
                              </ul>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div class="tab-content">
                                 <div class="active tab-pane" id="general_details">
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
                                                            src="../../dist/img/user4-128x128.jpg"
                                                            alt="User profile picture">
                                                      </div>
                                                      <h3 class="profile-username text-center">{{$data['inquiry']->fullname}}</h3>
                                                      <p class="text-muted text-center">{{$data['inquiry']->email}}</p>
                                                      <ul class="list-group list-group-unbordered mb-3">
                                                         <li class="list-group-item">
                                                            <b>Total Inquiries</b> <a class="float-right">1,322</a>
                                                         </li>
                                                         <li class="list-group-item">
                                                            <b>Ongoing Inquiries</b> <a class="float-right">543</a>
                                                         </li>
                                                      </ul>
                                                   </div>
                                                   <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                                <!-- About Me Box -->
                                                <div class="card card-primary">
                                                   <div class="card-header">
                                                      <h3 class="card-title">About Customer</h3>
                                                   </div>
                                                   <!-- /.card-header -->
                                                   <div class="card-body">
                                                      <strong><i class="fa fa-envelope-o mr-1"></i> Email</strong>
                                                      <p class="text-muted">
                                                         {{$data['inquiry']->fullname}}
                                                      </p>
                                                      <hr>
                                                      <strong><i class="fas fa-volume-control-phone mr-1"></i> Phone Number</strong>
                                                      <p class="text-muted">{{$data['inquiry']->mobile_number}}</p>
                                                      <hr>
                                                      <strong><i class="fas fa-address-card mr-1"></i>Address</strong>
                                                      <p class="text-muted">
                                                         {{$data['inquiry']->full_address}}
                                                      </p>
                                                      <hr>
                                                      <strong><i class="fas fa-map-marker-alt mr-1"></i>City / Area</strong>
                                                      <p class="text-muted">{{\Helper::getCity($data['inquiry']->city_id)}} / {{\Helper::getArea($data['inquiry']->area_id)}}.</p>
                                                   </div>
                                                   <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                             </div>
                                             <!-- /.col -->
                                            @if($data['inquirydetails']!="")

                                            <div class="col-md-9">
                                                <div class="card">
                                                   <div class="card-header p-2">
                                                      <h4> Inquiry Details </h4>
                                                   </div>
                                                   <!-- /.card-header -->
                                                   <div class="card-body">
                                                      <div class="col-md-12">
                                                         <p class="p_tag"> <b>Inquiry Address :</b> {{$data['inquiry']->full_address}}
                                                         </p>
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <p class="p_tag"> <b>{{\Helper::getCity($data['inquiry']->city_id)}} :  </b> <span class="badge"> {{\Helper::getArea($data['inquiry']->area_id)}} </span> </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <p class="p_tag"> <b>Total Amount : </b>             </p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            
                                            @endif


                                             <!-- /.col -->
                                          </div>
                                          <!-- /.row -->
                                       </div>
                                       <!-- /.container-fluid -->
                                    </section>
                                 </div>
                                 <div class="tab-pane" id="payment">
                                    <section class="content">
                                       <div class="container-fluid">
                                          <div class="row">
                                             <div class="col-12">
                                                <div class="callout callout-info">
                                                   <h5><i class="fas fa-info"></i> Note:</h5>
                                                   This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                                                </div>
                                                <!-- Main content -->
                                                <div class="invoice p-3 mb-3">
                                                   <!-- title row -->
                                                   <div class="row">
                                                      <div class="col-12">
                                                         <h4>
                                                            <i class="fas fa-globe"></i> Connect Complete Private Limited
                                                            <small class="float-right">Date: 2/10/2014</small>
                                                         </h4>
                                                      </div>
                                                      <!-- /.col -->
                                                   </div>
                                                   <!-- info row -->
                                                   <div class="row invoice-info">
                                                      <div class="col-sm-4 invoice-col">
                                                         From
                                                         <address>
                                                            <strong>Admin, Inc.</strong><br>
                                                            795 Folsom Ave, Suite 600<br>
                                                            San Francisco, CA 94107<br>
                                                            Phone: (804) 123-5432<br>
                                                            Email: info@almasaeedstudio.com
                                                         </address>
                                                      </div>
                                                      <!-- /.col -->
                                                      <div class="col-sm-4 invoice-col">
                                                         To
                                                         <address>
                                                            <strong>John Doe</strong><br>
                                                            795 Folsom Ave, Suite 600<br>
                                                            San Francisco, CA 94107<br>
                                                            Phone: (555) 539-1037<br>
                                                            Email: john.doe@example.com
                                                         </address>
                                                      </div>
                                                      <!-- /.col -->
                                                      <div class="col-sm-4 invoice-col">
                                                         <b>Invoice #007612</b><br>
                                                         <br>
                                                         <b>Inquiry Code :</b> 4F3S8J<br>
                                                         <b>Invoice Date:</b> 2/22/2014<br>
                                                         <b>Payment Status:</b> 968-34567
                                                      </div>
                                                      <!-- /.col -->
                                                   </div>
                                                   <!-- /.row -->
                                                   <!-- Table row -->
                                                   <div class="row">
                                                      <div class="col-12 table-responsive">
                                                         <table class="table table-striped">
                                                            <thead>
                                                               <tr>
                                                                  <th>#</th>
                                                                  <th>Service Name</th>
                                                                  <th>Price</th>
                                                                  <th>Subtotal</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                  <td>1</td>
                                                                  <td>Call of Duty</td>
                                                                  <td>455-981-221</td>
                                                                  <td>Rs. 64.00</td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <!-- /.col -->
                                                   </div>
                                                   <!-- /.row -->
                                                   <div class="row">
                                                      <!-- accepted payments column -->
                                                      <div class="col-6">
                                                         <p class="lead">  <b>Payment Methods: </b></p>
                                                         <p class="p_tag"> <b> Transaction Id </b> <span class="badge"> 12345678910 </span> </p>
                                                         <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                            Remarks / Added by Client
                                                         </p>
                                                      </div>
                                                      <!-- /.col -->
                                                      <div class="col-6">
                                                         <p class="lead">Amount Due: Rs. </p>
                                                         <div class="table-responsive">
                                                            <table class="table">
                                                               <tr>
                                                                  <th style="width:50%">Subtotal:</th>
                                                                  <td>Rs. 250.30</td>
                                                               </tr>
                                                               <tr>
                                                                  <th>Tax (9.3%)</th>
                                                                  <td>Rs. 10.34</td>
                                                               </tr>
                                                               <tr>
                                                                  <th>Discount:</th>
                                                                  <td>10%</td>
                                                               </tr>
                                                               <tr>
                                                                  <th>Grand Total:</th>
                                                                  <td>Rs. 265.24</td>
                                                               </tr>
                                                            </table>
                                                         </div>
                                                      </div>
                                                      <!-- /.col -->
                                                   </div>
                                                   <!-- /.row -->
                                                   <!-- this row will not appear when printing -->
                                                   <div class="row no-print">
                                                      <div class="col-12">
                                                         <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                                         <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                                         Payment
                                                         </button>
                                                         <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                                         <i class="fas fa-download"></i> Generate PDF
                                                         </button>
                                                      </div>
                                                   </div>
                                                </div>
                                                <!-- /.invoice -->
                                             </div>
                                             <!-- /.col -->
                                          </div>
                                          <!-- /.row -->
                                       </div>
                                       <!-- /.container-fluid -->
                                    </section>
                                 </div>
                                 <div class="tab-pane" id="executive"> 
                                    //Tab 3
                                 </div>
                                 <div class="tab-pane" id="crew"> 
                                    //Tab 4
                                 </div>
                                 <div class="tab-pane" id="document"> 
                                      <section class="content">

                                          <!-- Default box -->
                                             <div class="card"> 
                                               <div class="card-body p-0">
                                                 <table class="table table-striped projects">
                                                     <thead>
                                                         <tr>
                                                             <th style="width: 1%">
                                                                 #
                                                             </th>
                                                             <th style="width: 20%">
                                                                Document Name
                                                             </th>
                                                             <th style="width: 20%">
                                                                 Uploaded by
                                                             </th>  
                                                             <th style="width: 50%">
                                                             </th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <tr>
                                                             <td>
                                                                 #
                                                             </td>
                                                             <td>
                                                                 Name of Document
                                                             </td>
                                                             <td>
                                                                 <ul class="list-inline">
                                                                     <li class="list-inline-item">
                                                                         <img   class="table-avatar" src="../../dist/img/avatar.png"> 
                                                                         Executive Name
                                                                     </li> 
                                                                 </ul>
                                                             </td> 
                                                             <td class="project-actions text-right">
                                                                 <a class="btn btn-primary btn-sm" href="#">
                                                                     <i class="fas fa-folder">
                                                                     </i>
                                                                     View
                                                                 </a>
                                                                 <a class="btn btn-info btn-sm" href="#">
                                                                     <i class="fas fa-pencil-alt">
                                                                     </i>
                                                                     Download
                                                                 </a>
                                                                 <a class="btn btn-danger btn-sm" href="#">
                                                                     <i class="fas fa-trash">
                                                                     </i>
                                                                     Delete
                                                                 </a>
                                                                  <a class="btn bg-gradient-success btn-sm" href="#">
                                                                     <i class="fas fa-trash">
                                                                     </i>
                                                                     Upload
                                                                 </a>
                                                             </td>
                                                         </tr>
                                                      
                                                     </tbody>
                                                 </table>
                                               </div>
                                               <!-- /.card-body -->
                                             </div>
                                          <!-- /.card -->

                                        </section>
                                 </div>
                                 <!-- /.tab-pane -->
                                 <div class="tab-pane" id="remarks">
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
                                          <i class="fas fa-comments bg-primary"></i>
                                          <div class="timeline-item">
                                             <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                             <h3 class="timeline-header"><a href="#">Support Team</a>(Remark By)</h3>
                                             <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                             </div>
                                             <div class="timeline-footer"> 
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div>
                                          <i class="fas fa-comments bg-primary"></i>
                                          <div class="timeline-item">
                                             <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                             <h3 class="timeline-header"><a href="#">Support Team</a>(Remark By)</h3>
                                             <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                             </div>
                                             <div class="timeline-footer"> 
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div>
                                          <i class="fas fa-comments bg-primary"></i>
                                          <div class="timeline-item">
                                             <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                             <h3 class="timeline-header"><a href="#">Support Team</a>(Remark By)</h3>
                                             <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                             </div>
                                             <div class="timeline-footer"> 
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- END timeline item -->
                                       <!-- timeline item -->
                                       <div>
                                          <i class="far fa-clock bg-gray"></i>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- /.tab-pane -->
                                 <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </section>
@endsection
@section('extra-scripts')
<script src="{{asset('public/theme/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript">
    $('#reservation').daterangepicker({autoclose: 1});
</script>
@endsection