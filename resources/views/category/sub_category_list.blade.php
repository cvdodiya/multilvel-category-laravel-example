<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}">{{$dash}}{{$subcategory->category_title}}</option>
    @if(count($subcategory->subcategory))
        @include('category.sub_category_list',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach

