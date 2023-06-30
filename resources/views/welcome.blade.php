 @include('includes.header')
 
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="mt-4  mb-4"><a class="btn btn-primary" href="{{ url('/add-campaign') }}">Add New</a></div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Campaigns
                            </div>
                            <div class="card-body">
                                @if(session('error'))
                                            <p class="alert alert-danger">{{session('error')}}</p>
                                @endif
                                @if(session('success'))
                                            <p class="alert alert-success">{{session('success')}}</p>
                                @endif
                               <?php //print_r($campaigns); ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>description</th>
                                            <th>Image</th>
                                            <th>Required Funds</th>
                                            <th>Collected Funds</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($campaigns as $campaign)
                                             <tr>
                                                <td><a href="{{ url('/view-campaign/') }}/{{ $campaign->id}}"> {{ $campaign->title }}</a></td>
                                                 <td>{{ $campaign->description }}</td>
                                                 
                                                 <?php  
                                                
                                                 ?>
                                                  <td><img src="{{$campaign->image}}" width=100 height=100 /></td>
                                                <td>{{ $campaign->required_funds }}</td>
                                                <td>-</td>
                                                
                                                <td><a onClick="return confirm('Are you sure?')" href="{{url('/delete-campaign/')}}/{{ $campaign->id }}">Delete</a></td>
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