@extends('layouts.app')

@section('title', 'Contact - Hubungi Kami')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-3 border-b">
    <div class="container mx-auto px-4">
        <div class="flex items-center text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-[#4a6741]">Start page</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900">Contact</span>
        </div>
    </div>
</div>

<!-- Main Contact Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column - Contact Info and Form -->
            <div>
                <div class="bg-blue-50 p-8 rounded-lg mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">We are glad to assist you</h1>
                    <p class="text-blue-800 leading-relaxed">
                        We will be glad to assist you if you have any questions about our products and services or have any 
                        personal requests. Just send us a short message. Please always quote the order number if you have 
                        questions concerning your orders. We will look into your enquiry and reply as soon as possible.
                    </p>
                </div>

                <!-- Contact Form -->
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Topic Selection -->
                    <div>
                        <label for="topic" class="block text-sm font-medium text-gray-700 mb-2">
                            What can we do for you?
                        </label>
                        <select 
                            id="topic" 
                            name="topic" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4a6741] focus:border-transparent"
                            required>
                            <option value="">-- Please select --</option>
                            <option value="product-inquiry">Product Inquiry</option>
                            <option value="order-status">Order Status</option>
                            <option value="technical-support">Technical Support</option>
                            <option value="billing">Billing Question</option>
                            <option value="design-help">Design Help</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Your message
                        </label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="6"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4a6741] focus:border-transparent"
                            placeholder="Please describe your inquiry..."
                            required></textarea>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Your email address
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4a6741] focus:border-transparent"
                            placeholder="email@example.com"
                            required>
                    </div>

                    <!-- Order Number (Optional) -->
                    <div>
                        <label for="order_number" class="block text-sm font-medium text-gray-700 mb-2">
                            Order number (optional)
                        </label>
                        <input 
                            type="text" 
                            id="order_number" 
                            name="order_number"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4a6741] focus:border-transparent"
                            placeholder="e.g., OP-2024-12345">
                    </div>

                    <!-- Privacy Notice -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-xs text-gray-600 leading-relaxed">
                            The personal information collected by Onlineprinters GmbH as well as your e-mail address will only be used - without requesting your explicit permission - for order placement and 
                            processing your enquiries. You have the right to information, blocking or deletion of these data at any time. For further information, see 
                            <a href="#" class="text-[#4a6741] hover:underline">Data Protection</a>
                        </p>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4">
                        <a 
                            href="{{ route('home') }}" 
                            class="px-8 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                            Back
                        </a>
                        <button 
                            type="submit"
                            class="flex-1 px-8 py-3 bg-yellow-500 text-gray-900 font-semibold rounded-lg hover:bg-yellow-600 transition-colors">
                            Send request
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right Column - Contact Image and Sidebar -->
            <div class="space-y-6">
                <!-- Contact Image -->
                <div class="rounded-lg overflow-hidden shadow-md">
                    <img 
                        src="{{ asset('images/contact-blocks.jpg') }}" 
                        alt="Contact Us" 
                        class="w-full h-auto object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center\'><svg class=\'w-24 h-24 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z\'/></svg></div>'">
                </div>

                <!-- Help Box with Tip -->
                <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4">
                    <div class="flex items-start gap-3 mb-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            <p class="font-bold text-blue-900 text-sm">Tip</p>
                            <p class="text-blue-800 text-sm">When you sign in, many fields are filled automatically.</p>
                        </div>
                    </div>
                </div>

                <!-- We're Here to Help Box -->
                <div class="bg-white border border-gray-200 rounded-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">We're here to help</h3>
                    <p class="text-sm text-gray-600 mb-6">
                        Our service team is available from Monday to Friday from <strong>08:00 a.m. until 5 p.m.</strong>
                    </p>

                    <!-- Live Chat -->
                    <a href="#" class="block bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow mb-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                <div>
                                    <p class="font-bold text-gray-900">Live Chat</p>
                                    <p class="text-xs text-gray-500">available 24/7</p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- Telephone -->
                    <div class="bg-white border border-gray-200 rounded-lg p-4 mb-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div>
                                <p class="font-bold text-gray-900">Telephone no.</p>
                                <p class="text-sm text-gray-600">+49 9161 6209801</p>
                            </div>
                        </div>
                    </div>

                    <!-- Help -->
                    <a href="#" class="block bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow mb-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                            <div>
                                <p class="font-bold text-gray-900">Help</p>
                            </div>
                        </div>
                    </a>

                    <!-- Search Help Center -->
                    <div class="relative">
                        <input 
                            type="text" 
                            placeholder="Search the help center"
                            class="w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4a6741] focus:border-transparent text-sm">
                        <button class="absolute right-3 top-1/2 -translate-y-1/2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
