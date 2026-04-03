<section
  id="reacon-faq-section"
  class="w-full bg-white py-16"
  aria-labelledby="reacon-faq-heading"
  itemscope
  itemtype="https://schema.org/FAQPage"
  x-data="{ activeIndex: 0 }">

  <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
      <div class="flex flex-col gap-6">
        <h2
          id="reacon-faq-heading"
          class="font-sans text-3xl font-semibold leading-tight text-black sm:text-4xl lg:text-5xl">
          Frequently Asked Questions
        </h2>
        <p class="max-w-4xl text-base leading-snug text-black">
          Find quick answers to how Reacon works, what we deliver, and how we
          support brands across print, production, and data-driven automation.
        </p>
      </div>
    </div>

    <!-- FAQ Items -->
    <div class="mt-10 flex flex-col gap-3 sm:mt-12 lg:mt-14" aria-label="Frequently asked questions list">

      <!-- Item 1 -->
      <div
        class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
        :class="activeIndex === 0 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
        itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <button
          type="button"
          @click="activeIndex = activeIndex === 0 ? null : 0"
          :aria-expanded="activeIndex === 0"
          aria-controls="faq-answer-0"
          class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
          <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
            What services does Reacon provide?
          </span>
          <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 0 ? '−' : '+'"></span>
        </button>
        <div
          id="faq-answer-0"
          x-show="activeIndex === 0"
          x-transition:enter="transition-all duration-300 ease-in-out"
          x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
          x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
          x-transition:leave="transition-all duration-250 ease-in-out"
          x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
          x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
          class="overflow-hidden"
          itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
          <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
            Reacon delivers end-to-end brand execution including content design,
            printing, packaging, warehousing, fulfilment, logistics, and
            data-driven communication systems.
          </p>
        </div>
      </div>

      <!-- Item 2 -->
      <div
        class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
        :class="activeIndex === 1 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
        itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <button
          type="button"
          @click="activeIndex = activeIndex === 1 ? null : 1"
          :aria-expanded="activeIndex === 1"
          aria-controls="faq-answer-1"
          class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
          <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
            Does Reacon offer project management solutions?
          </span>
          <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 1 ? '−' : '+'"></span>
        </button>
        <div
          id="faq-answer-1"
          x-show="activeIndex === 1"
          x-transition:enter="transition-all duration-300 ease-in-out"
          x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
          x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
          x-transition:leave="transition-all duration-250 ease-in-out"
          x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
          x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
          class="overflow-hidden"
          itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
          <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
            Yes, we provide end-to-end project management. Our team coordinates everything from initial design and planning to production and final delivery, ensuring your campaigns run smoothly and on budget.
          </p>
        </div>
      </div>

      <!-- Item 3 -->
      <div
        class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
        :class="activeIndex === 2 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
        itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <button
          type="button"
          @click="activeIndex = activeIndex === 2 ? null : 2"
          :aria-expanded="activeIndex === 2"
          aria-controls="faq-answer-2"
          class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
          <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
            What digital marketing strategies do you specialize in?
          </span>
          <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 2 ? '−' : '+'"></span>
        </button>
        <div
          id="faq-answer-2"
          x-show="activeIndex === 2"
          x-transition:enter="transition-all duration-300 ease-in-out"
          x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
          x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
          x-transition:leave="transition-all duration-250 ease-in-out"
          x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
          x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
          class="overflow-hidden"
          itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
          <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
            Absolutely. Our digital marketing experts craft data-driven strategies spanning SEO, paid media, email automation, and social media to maximize your brand's reach and return on investment.
          </p>
        </div>
      </div>

      <!-- Item 4 -->
      <div
        class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
        :class="activeIndex === 3 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
        itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <button
          type="button"
          @click="activeIndex = activeIndex === 3 ? null : 3"
          :aria-expanded="activeIndex === 3"
          aria-controls="faq-answer-3"
          class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
          <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
            Do you offer innovative solutions in software development?
          </span>
          <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 3 ? '−' : '+'"></span>
        </button>
        <div
          id="faq-answer-3"
          x-show="activeIndex === 3"
          x-transition:enter="transition-all duration-300 ease-in-out"
          x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
          x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
          x-transition:leave="transition-all duration-250 ease-in-out"
          x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
          x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
          class="overflow-hidden"
          itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
          <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
            Yes, our technology teams build scalable custom software, powerful web applications, and seamless system integrations tailored to support your specific operational and marketing needs.
          </p>
        </div>
      </div>

      <!-- Item 5 -->
      <div
        class="transition-colors duration-300 rounded-2xl p-5 sm:p-6"
        :class="activeIndex === 4 ? 'bg-[#F9FAFB]' : 'border border-[#E7E7E7]'"
        itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <button
          type="button"
          @click="activeIndex = activeIndex === 4 ? null : 4"
          :aria-expanded="activeIndex === 4"
          aria-controls="faq-answer-4"
          class="flex w-full cursor-pointer items-center justify-between gap-4 rounded-md text-left outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2">
          <span itemprop="name" class="font-sans text-sm font-medium leading-tight text-[#383B43] sm:text-xl">
            How does Reacon approach sustainable product design?
          </span>
          <span class="text-xl leading-none text-[#383B43] select-none" aria-hidden="true" x-text="activeIndex === 4 ? '−' : '+'"></span>
        </button>
        <div
          id="faq-answer-4"
          x-show="activeIndex === 4"
          x-transition:enter="transition-all duration-300 ease-in-out"
          x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
          x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
          x-transition:leave="transition-all duration-250 ease-in-out"
          x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
          x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
          class="overflow-hidden"
          itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
          <p itemprop="text" class="mt-4 text-base leading-snug text-[#666666] sm:mt-5">
            We are deeply committed to sustainability. Our eco-friendly practices encompass sustainable packaging design, responsible material sourcing, and waste-reducing production methods.
          </p>
        </div>
      </div>

      <!-- CTA card -->
      <div class="mt-1 rounded-2xl bg-[#E9FBFC] p-5 sm:p-6">
        <div class="flex flex-col gap-2">
          <p class="text-base font-medium leading-snug text-[#383B43]">
            Have additional questions about Reacon Group?
          </p>
          <p class="text-base leading-snug text-[#666666]">
            Our Australian-based customer experience team has licensed
            specialists standing by to help.
          </p>
        </div>
        <div class="my-4 h-px w-full bg-[#ECEFF2] sm:my-5" aria-hidden="true"></div>
        <a
          href="#"
          class="group flex w-full items-center justify-between gap-4 text-base font-medium leading-snug text-[#0A969B] transition-colors duration-300 hover:text-black focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0A969B] focus-visible:ring-offset-2 rounded-md">
          <span>Contact our Lead Team</span>
          <!-- Added group-hover to animate the arrow dynamically on hover -->
          <i class="ph ph-arrow-right transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true"></i>
        </a>
      </div>

    </div>
  </div>
</section>