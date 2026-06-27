<header class="relative wrapper bg-soft-primary {{ request()->routeIs('front.home') ? '' : '!bg-[#edf2fc]' }}">
    <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
        <div class="container xl:!flex-row lg:!flex-row !flex-nowrap items-center">
            <div class="navbar-brand w-full">
                <a href="{{ route('front.home') }}">
                    <img src="{{ asset('frontTheme/images/sampad_logo.svg') }}" alt="image">
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div
                    class="offcanvas-header xl:!hidden lg:!hidden flex items-center justify-between flex-row p-6">
                    <a href="{{ route('front.home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('frontTheme/images/sampad_favicon_o.png') }}" class="w-15" alt="image">
                        <span><h3 class="!text-white xl:!text-[1.5rem] !text-[calc(1.275rem_+_0.3vw)] !mb-0">SAMPAD</h3></span>
                    </a>
                    <button type="button"
                        class="btn-close btn-close-white !mr-[-0.75rem] m-0 p-0 leading-none !text-[#343f52] transition-all duration-[0.2s] ease-in-out border-0 motion-reduce:transition-none before:text-[1.05rem] before:text-white before:content-['\ed3b'] before:w-[1.8rem] before:h-[1.8rem] before:leading-[1.8rem] before:shadow-none before:transition-[background] before:duration-[0.2s] before:ease-in-out before:!flex before:justify-center before:items-center before:m-0 before:p-0 before:rounded-[100%] hover:no-underline bg-inherit before:bg-[rgba(255,255,255,.08)] before:font-Unicons hover:before:bg-[rgba(0,0,0,.11)]"
                        data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body xl:!ml-auto lg:!ml-auto flex  flex-col !h-full">
                    <ul class="navbar-nav flex-row gap-x-4">
                        <li class="nav-item">
                            <a class="nav-link font-bold !tracking-[-0.01rem] hover:!text-[#54a8c7]" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-bold !tracking-[-0.01rem] hover:!text-[#54a8c7]" href="#">Insurances</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-bold !tracking-[-0.01rem] hover:!text-[#54a8c7]" href="#">Investment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-bold !tracking-[-0.01rem] hover:!text-[#54a8c7]" href="{{-- route('smart.tools') --}}">Smart Tools</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle font-bold hover:!text-[#54a8c7]" href="#" data-bs-toggle="dropdown">Resources</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="dropdown-item" href="#">Blog Classic</a></li>
                                <li class="nav-item"><a class="dropdown-item" href="#">News</a></li>
                                <li class="nav-item"><a class="dropdown-item" href="#">Faq</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other w-full !flex !ml-auto">
                <ul class="navbar-nav !flex-row !items-center !ml-auto">
                    <li class="nav-item hidden xl:block lg:block md:block">
                        <a href="#"
                            class="btn btn-sm btn-primary !text-white !bg-[#3f78e0] border-[#3f78e0] hover:text-white hover:bg-[#3f78e0] hover:!border-[#3f78e0]   active:text-white active:bg-[#3f78e0] active:border-[#3f78e0] disabled:text-white disabled:bg-[#3f78e0] disabled:border-[#3f78e0] !rounded-[50rem] hover:translate-y-[-0.15rem] hover:shadow-[0_0.25rem_0.75rem_rgba(30,34,40,0.15)]">Contact</a>
                    </li>
                    <li class="nav-item xl:!hidden lg:!hidden">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>