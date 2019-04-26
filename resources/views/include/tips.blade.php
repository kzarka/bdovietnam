<?php
use App\Models\Tips;
	$tip = Tips::inRandomOrder()->limit(1)->get()->first();
?>
<div class="col-lg-12">
    <div class="news-tracker-wrap">
        <h6><span><strong>Tips:</strong></span>   <a href="#">{{ isset($tip->content) ? $tip->content : '' }}</a></h6>
    </div>
</div>