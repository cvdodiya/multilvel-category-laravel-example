<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    @if($category->id != $subcategory->id )
        <option value="{{$subcategory->id}}" @if($category->parent_id == $subcategory->id ) selected @endif >
        	{{$dash}}{{$subcategory->category_title}}
        </option>
    @endif
    @if(count($subcategory->subcategory))
        @include('category.sub_category_list_option_for_update',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach