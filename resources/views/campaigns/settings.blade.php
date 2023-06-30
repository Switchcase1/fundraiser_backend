 @include('includes.header')
 
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Settings
                            </div>
                            <div class="card-body">
                                @if(session('error'))
                                            <p class="alert alert-danger">{{session('error')}}</p>
                                @endif
                                @if(session('success'))
                                            <p class="alert alert-success">{{session('success')}}</p>
                                @endif
                                <form method="POST" action="{{url('/save-settings')}}" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="convince_fee" step=".01" type="number" min="0" placeholder="Enter Title" value="{{$setting->convince_fee}}" required/>
                                                        <label for="inputFirstName">Convince Fee</label>
                                                    </div>
                                                </div>
                                            </div>
                                           <input type="hidden" name="id" value="{{$setting->id}}" />
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Save Settings</button></div>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>
        </div>
 @include('includes.footer')