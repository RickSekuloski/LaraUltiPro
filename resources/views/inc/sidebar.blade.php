
        <!--sidebar start -->
        <section class="side">
            <div class="left-side">
                <div class="sidebar" id="leftSidebar">
                <a href="{{route('user.profile.index')}}">
                        <i class="fa fa-user sidebar-iclass sidebar-iclass--user "></i>
                        <span class="sidebar-text">Profile</span>
                    </a>
                <a href="{{route('user.post.index')}}">
                     <i class="fa fa-eye sidebar-iclass sidebar-iclass--eye "></i>
                     <span class="sidebar-text">View Posts</span>
                    </a>
                    <a href="{{ route('user.post.create') }}">
                     <i class="fa fa-plus sidebar-iclass sidebar-iclass--plus "></i>
                     <span class="sidebar-text">Create Post</span>
                    </a>
                    <a href="#">
                     <i class="fa fa-comment sidebar-iclass sidebar-iclass--comment "></i>
                     <span class="sidebar-text">Comments</span>
                    </a>
                </div>
            </div>
        </section>
         <!--sidebar end -->