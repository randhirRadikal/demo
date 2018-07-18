<div id="sidebar-wrapper">
    <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
        <li>
            <a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'index')); ?>"  class="waves-effect waves-light">
               <span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span> Users
           </a>
       </li>
       <li>
           <a href="<?php echo $this->Url->build(array('controller'=>'Males','action'=>'index')); ?>" class="waves-effect waves-light active">
               <span class="fa-stack fa-lg pull-left"><i class="fa fa-map-marker fa-stack-1x "></i></span> Males
           </a>
       </li>
	   <li>
           <a href="<?php echo $this->Url->build(array('controller'=>'Females','action'=>'index')); ?>" class="waves-effect waves-light active">
               <span class="fa-stack fa-lg pull-left"><i class="fa fa-map-marker fa-stack-1x "></i></span> Females
           </a>
       </li>
	   <!-- <li>
           <a href="< ?php echo $this->Url->build(array('controller'=>'Categories','action'=>'index')); ?>" class="waves-effect waves-light active">
               <span class="fa-stack fa-lg pull-left"><i class="fa fa-map-marker fa-stack-1x "></i></span> Categories
           </a>
       </li> -->
   </ul>
</div><!-- /#sidebar-wrapper -->
