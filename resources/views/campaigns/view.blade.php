 @include('includes.header')
 
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4 mt-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               View Campaign Details
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{url('/save-campaign')}}" enctype="multipart/form-data">
                                   {{ csrf_field() }}
                                            <div class="row mb-3">
                                                 <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <h2><b>{{$campaign->title}}</b></h2>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                              <div class="row mb-3">
                                                <h4>About</h4>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <p>{{$campaign->description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input readonly class="form-control" name="required_funds" type="number" placeholder="Enter Funds"  value="{{$campaign->required_funds}}"/>
                                                        <label for="inputFirstName">Funds required (INR)</label>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input readonly class="form-control" name="required_funds" type="number" placeholder="Enter Funds"  value="{{$fundsCollected}}"/>
                                                        <label for="inputFirstName">Funds Collected (INR)</label>
                                                    </div>
                                                </div>
                                            </div>
                                      
                                          
                                        </form>
                            </div>
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Contributors
                            </div>
                            <div class="card-body">
                                
                                
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Funds Given</th>
                                            <th>Date</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($contributors as $contri)
                                                <td>
                                                    <?php 
                                                    $user = App\Models\User::where('id',$contri->contributor_id)->first();
                                                    ?>
                                                    {{ $user->name }}</td>
                                                <td>INR {{ $contri->fund_given }}</td>
                                                <td>{{ $contri->created_at }}</td>
                                                
                                            </tr>
                                        @endforeach
                                       
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
 @include('includes.footer')