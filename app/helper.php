<?php

	function category_tree_style($parent_id = 0,$sub_mark = ''){
		$categories = App\Models\Category::where('parent_id',$parent_id)->get();
		
		if(count($categories) > 0){
			foreach($categories as $key => $category){
				if(!empty($sub_mark)){
					$count_data = (Int) strlen($sub_mark);
					$ul_start = $ul_end = '';
					for($i=0;$i<$count_data;$i++){
						$ul_start .= '<ul>';		
						$ul_end .= '</ul>';
					}
					echo $ul_start."<li value='{{ $category->id }}'  >".$category->category_title.'</li>'.$ul_end;		

				} else {
					echo "<li value='{{ $category->id }}'  >".$category->category_title."</li>";		
				}
				
				category_tree_style($category->id,$sub_mark.'-');
			}		
		}
	}
?>