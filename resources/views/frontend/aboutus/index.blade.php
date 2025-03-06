@extends('layouts.frontend')
@section('content')
<div class="relative mb-42">
    <!-- Top Yellow Section -->
    <div class="relative">
        <!-- Yellow Background -->
        <div class="bg-[#E9C46A] h-[400px]">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 pt-20">
                <h1 class="text-center text-6xl font-black text-black">
                    ABOUT US
                </h1>
            </div>
        </div>

        <!-- Overlapping Image Container -->
        <div class="absolute left-1/2 transform -translate-x-1/2 top-[60%] w-full max-w-4xl px-4 z-10">
            <img src="{{ asset('uploads/about'.'/'.$about->image) }}"
                alt="About Us Image"
                class="w-full h-[400px] object-cover">
        </div>
    </div>

    <!-- White Section -->
    <div class="bg-white pt-[300px] pb-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Modern Header -->
            <div class="text-center mb-5me">
                <!-- <h2 class="text-[120px] font-black text-black/5 leading-none select-none">ABOUT</h2> -->
                <h3 class="text-5xl font-bold text-black mt-6 mb-2">DESCRIPTION</h3>
                <div class="w-24 h-1 bg-[#2A9D8F] mx-auto"></div>
            </div>

            <div class="max-w-5xl mx-auto">
                <!-- Main Content with Modern Split Design -->
                <div class="bg-gradient-to-br from-[#2A9D8F]/[0.02] to-[#E9C46A]/[0.02] rounded-3xl p-12 relative overflow-hidden">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-96 h-96 bg-[#2A9D8F]/[0.02] rounded-full translate-x-1/2 -translate-y-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#E9C46A]/[0.02] rounded-full -translate-x-1/2 translate-y-1/2"></div>

                    <!-- Content -->
                    <div class="relative">
                        <div class="prose prose-lg prose-headings:text-[#2A9D8F]">
                            {!! $about->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .prose {
        max-width: none;
    }

    .prose p {
        color: #1a1a1a;
        line-height: 1.9;
        font-size: 1.25rem;
        margin-bottom: 2em;
        position: relative;
        transition: all 0.3s ease;
    }

    .prose p:hover {
        transform: translateX(8px);
    }

    .prose strong {
        color: #2A9D8F;
        font-weight: 600;
    }

    .prose h1,
    .prose h2,
    .prose h3,
    .prose h4 {
        font-weight: 700;
        position: relative;
        display: inline-block;
    }

    .prose h2::after,
    .prose h3::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(to right, #2A9D8F, #E9C46A);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .prose h2:hover::after,
    .prose h3:hover::after {
        transform: scaleX(1);
    }
</style>
@endsection