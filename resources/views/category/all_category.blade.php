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
                    <a class="add-new" href="{{Route('createCategory')}}">
                        <button class="btn btn-primary btn-xs">Add New Category</button>
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
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Parent Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($categories))
                            <?php $_SESSION['i'] = 0; ?>
                            @foreach($categories as $category)
                                <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                                <tr>
                                    <?php $dash=''; ?>
                                    <td>{{$_SESSION['i']}}</td>
                                    <td>{{$category->category_title}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        @if(isset($category->parent_id))
                                            Parent
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{Route('editCategory', $category->id)}}">
                                            <button class="btn btn-sm btn-info">Edit</button>
                                        </a>
                                        <a href="{{Route('deleteCategory', $category->id)}}">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </a>
                                    </td>
                                 </tr>
                                 @if(count($category->subcategory))
                                     @include('category.subcategory',['subcategories' => $category->subcategory])
                                 @endif

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
