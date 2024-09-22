 

<option data-href="" value="">Select Sub Category</option>
@foreach($cat->subcategories as $sub)
<option value="{{ $sub->id }}">{{ $sub->title_ar ??  $sub->title_en}}</option>
@endforeach
 