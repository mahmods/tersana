<nav class="quick-nav">
    <a class="quick-nav-trigger" href="#0">
        <span aria-hidden="true"></span>
    </a>
    <ul>
        <li>
            <a href="{{route('getFrontHome')}}" target="_blank" class="active">
                <span>Go To HOME</span></span>
                <i class="fa fa-reply-all"></i>
            </a>
        </li>
        <li>
            <a href="{{route('getFrontServices')}}" target="_blank" class="active">
                <span>Go To SERVICES</span>
                <i class="fa fa-reply-all"></i>
            </a>
        </li>
        <li>
            <a href="{{route('getFrontBlog')}}" target="_blank" class="active">
                <span>Go To BLOG</span>
                <i class="fa fa-reply-all"></i>
            </a>
        </li>

        <li>
            <a href="{{route('getFrontPhotos')}}" target="_blank" class="active">
                <span>Go To PHOTOS</span>
                <i class="fa fa-reply-all"></i>
            </a>
        </li>
        <li>-
            <a href="{{route('getFrontPageById',['pageId'=>1,'title'=>'about_us'])}}" target="_blank" class="active">
                <span>Go To ABOUT US</span>
                <i class="fa fa-reply-all"></i>
            </a>
        </li>
        <li>
            <a href="{{route('getContacts" target="_blank" class="active">
                <span>Go To CONTACT US</span>
                <i class="fa fa-reply-all"></i>
            </a>
        </li>

        
    </ul>
    <span aria-hidden="true" class="quick-nav-bg"></span>
</nav>
<div class="quick-nav-overlay"></div>