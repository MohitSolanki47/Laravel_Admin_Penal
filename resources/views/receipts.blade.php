<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                    <div class="card-header">
                        <!-- <h4 class="card-title">Category</h4> -->
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add Receipts
                        </button>
                    </div>
                     @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @elseif(session('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                    @endif
                  <div class="card-body">
                     <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                           <tr>
                              <!-- <th>#</th> -->
                              <th>Receipts No</th>
                              <th>Donor_Name</th>
                              <th>Donor_Mobile</th>
                              <th>Donor_Pan_No</th>
                              <th>Amount</th>
                              <th>Payment_Method</th>
                              <th>Action</th>
                              <th>Donor_Address</th>
                              <th>Donor_Email</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach ($Receipt_data as $data) 
                            {
                        ?>
                           <tr>
                              <!-- <td>{{$data->id}}</td> -->
                              <td>{{$data->Receipt_No}}</td>
                              <td>{{$data->Donor_Name}}</td>
                              <td>{{$data->Donor_Mobile}}</td>
                              <td>{{$data->Donor_Pan_No}}</td>
                              <td>{{$data->Amount}}</td>
                              <td>{{$data->Payment_Method}}</td>
                              <td>
                                <a href="generate_Pdf/{{ $data->id }}" id="" class="btn btn-outline-secondary btn-sm editIcon" title="Download">
                                    <i class="fas fa-download" title="Download"></i>
                                </a>
                                <a href="delete/{{ $data->id }}" class="btn btn-outline-secondary btn-sm edit" title="delete">
                                <i class="fas fa-trash-alt" title="delete"></i>
                                </a>
                            </td>                            
                            <td>{{$data->Donor_Address}}</td>
                            <td>{{$data->Donor_Email}}</td>
                           </tr>
                           <?php 
                            }
                        ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- end cardaa -->
            </div>
            <!-- end col -->
         </div>
      </div>
   </div>
</div>
<!-- ----------- Insert Product Data ----------- -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Add_Receipts" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Receipts No</label>
                                <input type="text" class="form-control" name='Receipts_No' id="Receipts_No" placeholder="Receipts No" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Receipts No.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Donor Name</label>
                                <input type="text" class="form-control" name='Donor_Name' id="Donor_Name" placeholder="Donor Name" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Donor Name.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="Category">Donor Mobile</label>
                                <input type="text" class="form-control" name='Donor_Mobile' id="Donor_Mobile" placeholder="Donor Mobile" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Donor Mobile.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Category">Donor Pan No</label>
                                <input type="text" class="form-control" name='Donor_Pan_No' id="Donor_Pan_No" placeholder="Donor Pan No" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Donor Pan No.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Category">Amount</label>
                                <input type="text" class="form-control" name='Amount' id="Amount" placeholder="Amount" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Amount.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="Category">Donor Email</label>
                                <input type="email" class="form-control" name='Donor_Email' id="Donor_Email" placeholder="Donor Email" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Donor Email.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Category">Donor Address</label>
                                <input type="text" class="form-control" name='Donor_Address' id="Donor_Address" placeholder="Donor Address" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Donor Address.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Category">Payment Method</label>
                                <input type="text" class="form-control" name='Payment_Method' id="Payment_Method" placeholder="Payment Method" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Payment Method.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name='Add Receipts' class="btn btn-primary">Add Receipts</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ----------- Update Product Data ----------- -->
<div class="modal fade" id="UpdatestaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Update_Product" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="Product_id" id="Product_id">
                    <input type="hidden" name="Product_Image" id="Product_Image">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name='Update_Product_Name' id="Update_Product_Name" placeholder="Product Name" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Product Name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label">Product Size</label>
                                <input type="text" class="form-control" name='Update_Product_Size' id="Update_Product_Size" placeholder="Product Size" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Product Size.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="Category">Colour</label>
                                <input type="text" class="form-control" name='Update_Colour' id="Update_Colour" placeholder="Colour" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Colour.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="Category">Image</label>
                                <input type="file" class="form-control" name='Update_Image' id="Update_Image" placeholder="Image" >
                                <div class="invalid-feedback">
                                    Please provide a valid Image.
                                </div>
                            </div>
                            <label class="form-label" for="Category">Last Uploded Image</label>
                            <div class="mb-3" id="avatar">
                            
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name='Update Procuct' class="btn btn-primary">Update Procuct</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>