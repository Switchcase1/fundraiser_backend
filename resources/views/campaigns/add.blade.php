 @include('includes.header')
 
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Add New Campaign
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{url('/save-campaign')}}" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="title" type="text" placeholder="Enter Title" required/>
                                                        <label for="inputFirstName">Title</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea style="height:200px" class="form-control" name="description"  placeholder="Enter description" required/></textarea>
                                                        <label for="inputFirstName">Description</label>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="required_funds" type="number" placeholder="Enter Funds" required/>
                                                        <label for="inputFirstName">Funds required (INR)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="image" type="file"  accept="image/gif, image/jpeg, image/png" placeholder="select image" required/>
                                                <label for="inputEmail">Select Image</label>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Create Campaign</button></div>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>
        </div>
 @include('includes.footer')