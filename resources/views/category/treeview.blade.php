<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<section class="content" style="padding:50px 20%;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    @if(Auth::user()->user_type == 'admin')
                        Welcome, {{ Auth::user()->name }}

                        <h2>Admin Dashboard</h2>
                        <hr>
                        <a class="add-new" href="{{Route('allCategories')}}">
                            <button class="btn btn-primary btn-xs">All Category</button>
                        </a>
                        <a class="add-new" href="{{Route('createCategory')}}">
                            <button class="btn btn-primary btn-xs">Add Category</button>
                        </a>
                    @else 
                        Welcome, {{ Auth::user()->name }} - User Dashboard <br>
                    @endif
                    
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

                    <hr>
                	<h4>Treeview</h4>
                    <ul>
                	   <?php category_tree_style(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>