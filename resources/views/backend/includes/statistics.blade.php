
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <div><h1>سرعة الوصول</h1></div>
            <i class="icon-settings font-green-sharp"></i>
            <span class="caption-subject font-green-sharp bold uppercase"></span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-cloud-upload"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-wrench"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-trash"></i>
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <a href="{{route('getAllUsers')}}" class="icon-btn">
            <i class="fa fa-group"></i>
            <div> {{trans('backend.users')}} </div>
            <span class="badge badge-danger"> {!! \App\Repositories\StatisticsRepository::countUsers() !!} </span>
        </a>
        <a href="{{route('getAllServices')}}" class="icon-btn">
            <i class="fa fa-barcode"></i>
            <div> {{trans('backend.services')}} </div>
            <span class="badge badge-success"> {!! \App\Repositories\StatisticsRepository::countServices() !!} </span>
        </a>
        <a href="{{route('getAllBlogs')}}" class="icon-btn">
            <i class="fa fa-sitemap"></i>
            <div> {{trans('blog.blogs')}} </div>
            <span class="badge badge-success"> {!! \App\Repositories\StatisticsRepository::countBlogs() !!} </span>
        </a>
        <a href="{{route('getAllContacts')}}" class="icon-btn">
            <i class="fa fa-phone"></i>
            <div>رسائل الأعضاء</div>
            <span class="badge badge-success"> {!! \App\Repositories\StatisticsRepository::countContacts() !!} </span>
        </a>
       
    </div>
</div>
<h1>الإحصائيات</h1>
<div class="row widget-row">
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">{{trans('backend.services')}}</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-green icon-bulb"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">{{trans('backend.number')}}</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{!! \App\Repositories\StatisticsRepository::countServices() !!}">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">{{trans('backend.users')}}</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-red icon-layers"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">{{trans('backend.number')}}</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{!! \App\Repositories\StatisticsRepository::countUsers() !!}">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">{{trans('backend.pages')}}</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">{{trans('backend.number')}}</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{!! \App\Repositories\StatisticsRepository::countPages() !!}">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-3">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">{{trans('backend.clients')}}</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">{{trans('backend.number')}}</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{!! \App\Repositories\StatisticsRepository::countClients() !!}">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
</div>



    
   
    <!--
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="567"></span>
                    </h3>
                    <small>NEW ORDERS</small>
                </div>
                <div class="icon">
                    <i class="icon-basket"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
                        <span class="sr-only">45% grow</span>
                    </span>
                </div>
                <div class="status">
                    <div class="status-title"> grow </div>
                    <div class="status-number"> 45% </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-purple-soft">
                        <span data-counter="counterup" data-value="276"></span>
                    </h3>
                    <small>NEW USERS</small>
                </div>
                <div class="icon">
                    <i class="icon-user"></i>
                </div>
            </div>
            <div class="progress-info">
                <div class="progress">
                    <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                        <span class="sr-only">56% change</span>
                    </span>
                </div>
                <div class="status">
                    <div class="status-title"> change </div>
                    <div class="status-number"> 57% </div>
                </div>
            </div>
        </div>
    </div>
-->
</div>


