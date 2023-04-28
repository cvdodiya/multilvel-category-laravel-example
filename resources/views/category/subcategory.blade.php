<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <?php $_SESSION['i']=$_SESSION['i']+1; ?>
    <tr>
        <td>{{$_SESSION['i']}}</td>
        <td>{{$dash}}{{$subcategory->category_title}}</td>
        <td>{{$subcategory->slug}}</td>
        <td>{{$subcategory->parent->category_title}}</td>
        <td>
            <a href="{{Route('editCategory', $subcategory->id)}}">
                <button class="btn btn-sm btn-info">Edit</button>
            </a>
            <a href="{{Route('deleteCategory', $category->id)}}">
                <button class="btn btn-sm btn-danger">Delete</button>
            </a>
        </td>
    </tr>
    @if(count($subcategory->subcategory))
        @include('category.subcategory',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach