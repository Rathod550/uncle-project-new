@extends('frontTheme.default')

@section('title')

<title>Home Page - Sampad Finserv</title>

@endsection

@section('content')

<section class="wrapper !bg-[#edf2fc]">
    <div
        class="container pt-10 pb-36 xl:pt-[2rem] lg:pt-[2rem] md:pt-[2rem] xl:pb-25 lg:pb-25 md:pb-25 !text-center">
        <div class="flex flex-wrap mx-[-15px]">
            <div
                class="sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-6/12 xxl:w-5/12 w-full flex-[0_0_auto] !px-[15px] max-w-full !mx-auto">
                <h1
                    class="!text-[calc(1.365rem_+_1.38vw)] font-bold !leading-[1.2] xl:!text-[2.4rem] !mb-3 !text-[#343f52]">
                    Smart Tools</h1>
                <nav class="inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb  flex flex-wrap bg-[none] p-0 !rounded-none list-none !mb-[20px]">
                        <li class="breadcrumb-item flex !text-[#60697b]"><a
                                class="!text-[#60697b] hover:!text-[#3f78e0]" href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item flex !text-[#60697b] !pl-2 before:font-normal before:!flex before:items-center before:text-[rgba(96,105,123,.35)] before:content-['\e931'] before:text-[0.9rem] before:-mt-px before:!pr-2 before:font-Unicons active"
                            aria-current="page">Smart Tools</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- /section -->
<section
    class="wrapper !bg-[#ffffff]  angled upper-end relative border-0 before:top-[-4rem] before:border-l-transparent before:border-r-[100vw] before:border-t-[4rem] before:border-[#fefefe] before:content-[''] before:block before:absolute before:z-0 before:border-y-transparent before:border-0 before:border-solid before:right-0 after:content-[''] after:block after:absolute after:z-0 after:border-y-transparent after:border-[#fefefe] after:border-0 after:border-solid after:right-0">
    <div class="flex flex-wrap mx-[-15px] !text-center">
        <div class="xl:w-9/12 lg:w-9/12 w-full flex-[0_0_auto] !px-[15px] max-w-full !mx-auto">

            <livewire:front.smart-tools.smart-tools />

        </div>
        <!-- /column -->
    </div>
    <div class="flex flex-wrap mx-[-15px] !text-center">
        <div class="xl:w-9/12 lg:w-9/12 w-full flex-[0_0_auto] !px-[15px] max-w-full !mx-auto">
            <h2 class="!text-[.75rem] uppercase !text-[#aab0bc] !mb-3 !mt-[3.5rem] !tracking-[0.02rem]">RETIREMENT CALCULATOR</h2>
            <h3 class="!text-[calc(1.305rem_+_0.66vw)] font-bold xl:!text-[1.8rem] !leading-[1.3]  !mb-3 !text-center xl:!px-10 xxl:!px-20">{{ $frontSetting['smart-tools-retirement-title']->value }}</h3>
            <p>{{ $frontSetting['smart-tools-retirement-description']->value }}</p>
        </div>
        <!-- /column -->
    </div>
</section>

@endsection