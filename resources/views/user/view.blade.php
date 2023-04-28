<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<section class="content" style="padding:50px 20%;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="panel-heading">Dashboard</div>
                    Welcome {{ Auth::user()->name }}
                    <br>
                    <a class="add-new" href="{{Route('allUsers')}}">
                        <button class="btn btn-primary btn-xs">All Users</button>
                    </a>
                    <a class="add-new" href="{{Route('allCategories')}}">
                        <button class="btn btn-primary btn-xs">All Category</button>
                    </a>
                    <a class="add-new" href="{{Route('treeview')}}">
                        <button class="btn btn-primary btn-xs">Treeview</button>
                    </a>
                    
                    @if (Auth::guest())
                        
                    @else
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="btn btn-primary pull-right">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                    

                </div>

                <br>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No.</th>
                            <th> Name</th>
                            <th>Email Slug</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($users))
                            <?php $_SESSION['i'] = 0; ?>
                            @foreach($users as $user)
                                <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                                <tr>
                                    <td>{{$_SESSION['i']}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                 </tr>
                                 

                            @endforeach
                            <?php unset($_SESSION['i']); ?>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
