 <nav class="navbar navbar-default navbar-fixed-top navbar-custom no-margin">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right hidden-xs">
                <li class="dropdown">
                    <a class="waves-effect dropdown-toggle" href="javascript:void(0)"
                       data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Guest <img src="<?php echo $this->Url->build('/', TRUE); ?>admin_assets/images/prof-img1.jpg" alt="" class="img-responsive img-thumb img-circle" style="width:32px; height:32px; border:1px solid #FFF; display:inline-block; vertical-align:top; position:relative; top:0px; margin-right:8px; margin-left:8px;"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'logout')); ?>"><span class="fa fa-power-off"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
                <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header fixed-brand">
              <a type="button" class="navbar-toggle" href="#" data-activates="slide-out">
                  <span class="material-icons ">menu</span>
                </a>
                <a class="navbar-brand" href="">
                    <img style="height: 50px; width: 50px;" src="<?php echo $this->Url->build('/', TRUE); ?>admin_assets/images/pokemap.png" alt="Logo Registration">
                </a>
                <ul id="slide-out" class="side-nav">
                  <li>
                      <a href="<?php echo $this->Url->build(array('controller'=>'users','action'=>'index')); ?>"  class="waves-effect waves-light">
                         <span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span> Users
                     </a>
                 </li>
                 <!-- <li>
                     <a href="<?php echo $this->Url->build(array('controller'=>'Categories','action'=>'index')); ?>" class="waves-effect waves-light">
                         <span class="fa-stack fa-lg pull-left"><i class="fa fa-map-marker fa-stack-1x "></i></span> Categories
                     </a>
                 </li> -->
                </ul>
            </div>

            <!-- <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active" ><button class="navbar-toggle waves-effect waves-light collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="material-icons ">menu</span></button></li>
                </ul>
            </div> -->
            <!-- bs-example-navbar-collapse-1 -->
        </div>
    </nav>
