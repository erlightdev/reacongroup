<?php $figma = get_template_directory_uri() . '/public/figma-assets'; ?>

<section class="py-16">
    <div class="mx-auto max-w-[1370px] px-4 sm:px-6">
        <!-- Section header -->
        <div class="mb-12 text-center md:mb-16 lg:mb-[72px]">
            <h2 class="mx-auto mb-4 max-w-[996px] font-display text-3xl leading-tight font-semibold text-[#1e293b] md:text-4xl lg:text-[44px] lg:leading-[1.32]">Industries We Power</h2>
            <p class="mx-auto max-w-[900px] text-base leading-relaxed text-[#383b43] md:text-[16px] lg:leading-[1.42]">Reacon partners with businesses across diverse sectors — from retail and finance to government and healthcare — delivering consistent brand experiences through design, data, and production.</p>
        </div>

        <!-- Mosaic grid -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-[32px]">
            <!-- LEFT COLUMN -->
            <div class="flex flex-col gap-6 lg:gap-[30px]">
                <!-- Banking & Finance (tall wide) -->
                <article class="group relative flex min-h-[300px] flex-col justify-between overflow-hidden rounded-3xl border border-slate-100 p-6 shadow-sm transition-shadow hover:shadow-md sm:p-8 lg:h-[346px]">
                    <img src="<?php echo esc_url($figma . '/industry-banking.png'); ?>" alt="Banking and Finance Industry" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(3,21,22,0) 43%, rgba(3,21,22,0.52) 58%, #2c8d9d 93%);"></div>

                    <div class="relative z-10 text-white">
                        <h3 class="mb-2 font-display text-xl leading-tight font-semibold sm:mb-3 sm:text-[24px] lg:leading-[1.32]">Banking &amp; Finance</h3>
                        <p class="max-w-[90%] text-sm leading-relaxed sm:text-[16px] lg:leading-[1.42]">Secure print and data workflows for statements, policies, and communication that meet strict compliance standards.</p>
                    </div>

                    <a href="#" class="relative z-10 mt-auto pt-6 flex w-fit items-center gap-1.5 text-sm font-medium text-white transition-colors group-hover:text-[#1ecad3] before:absolute before:inset-0 before:-m-8"> Explore Site </a>
                </article>

                <!-- Bottom two small cards -->
                <div class="grid flex-1 grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-[24px]">
                    <!-- Hospitality -->
                    <article class="group relative flex min-h-[300px] flex-col justify-between overflow-hidden rounded-3xl border border-slate-200 bg-[#f1f5f9] p-6 shadow-sm transition-shadow hover:shadow-md sm:p-8 lg:h-[420px]">
                        <img src="<?php echo esc_url($figma . '/industry-hospitality.png'); ?>" alt="Hospitality Industry" loading="lazy" decoding="async" class="absolute bottom-0 left-0 h-[76%] w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0" style="background:linear-gradient(to bottom, #2c8d9d 21.667%, rgba(44,141,157,0) 38.929%);"></div>

                        <div class="relative z-10 text-white">
                            <h3 class="mb-2 font-display text-xl leading-tight font-semibold sm:mb-3 sm:text-[24px] lg:leading-[1.32]">Hospitality</h3>
                            <p class="text-sm leading-relaxed sm:text-[16px] lg:leading-[1.42]">Premium branding, signage, and guest materials that shape lasting experiences from check-in to checkout.</p>
                        </div>

                        <a href="#" class="relative z-10 mt-auto pt-6 flex w-fit items-center gap-1.5 text-sm font-medium text-foreground transition-colors group-hover:text-[#1ecad3] before:absolute before:inset-0 before:-m-8"> Explore Site </a>
                    </article>

                    <!-- E-Commerce -->
                    <article class="group relative flex min-h-[300px] flex-col justify-between overflow-hidden rounded-3xl border border-slate-200 bg-[#f1f5f9] p-6 shadow-sm transition-shadow hover:shadow-md sm:p-8 lg:h-[420px]">
                        <img src="<?php echo esc_url($figma . '/industry-ecommerce.png'); ?>" alt="E-Commerce Industry" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0" style="background:linear-gradient(to bottom, #2c8d9d 21.667%, rgba(44,141,157,0) 38.929%);"></div>

                        <div class="relative z-10 text-white">
                            <h3 class="mb-2 font-display text-xl leading-tight font-semibold sm:mb-3 sm:text-[24px] lg:leading-[1.32]">E-Commerce</h3>
                            <p class="text-sm leading-relaxed sm:text-[16px] lg:leading-[1.42]">Secure print and data workflows for statements, policies, and communication that meet strict compliance standards.</p>
                        </div>

                        <a href="#" class="relative z-10 mt-auto pt-6 flex w-fit items-center gap-1.5 text-sm font-medium text-foreground transition-colors group-hover:text-[#1ecad3] before:absolute before:inset-0 before:-m-8"> Explore Site </a>
                    </article>
                </div>
            </div>

            <!-- RIGHT COLUMN -->
            <div class="flex flex-col gap-6 lg:gap-[32px]">
                <!-- Top two small cards -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:gap-[32px]">
                    <!-- Health & Pharmaceuticals -->
                    <article class="group relative flex min-h-[300px] flex-col justify-between overflow-hidden rounded-3xl border border-slate-200 p-6 shadow-sm transition-shadow hover:shadow-md sm:p-8 lg:h-[420px]">
                        <img src="<?php echo esc_url($figma . '/industry-health.png'); ?>" alt="Health and Pharmaceuticals Industry" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0" style="background:linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.2) 100%), linear-gradient(180deg, #2c8d9d 6.79%, rgba(6,43,45,0.66) 39%, rgba(6,43,45,0.45) 46.5%, rgba(6,43,45,0) 56.4%);"></div>

                        <div class="relative z-10 text-white">
                            <h3 class="mb-2 font-display text-xl leading-tight font-semibold sm:mb-3 sm:text-[24px] lg:leading-[1.32]">Health &amp; Pharmaceuticals</h3>
                            <p class="text-sm leading-relaxed sm:text-[16px] lg:leading-[1.42]">Secure print and data workflows for statements, policies, and communication that meet strict compliance standards.</p>
                        </div>

                        <a href="#" class="relative z-10 mt-auto pt-6 flex w-fit items-center gap-1.5 text-sm font-medium text-white transition-colors group-hover:text-[#1ecad3] before:absolute before:inset-0 before:-m-8"> Explore Site </a>
                    </article>

                    <!-- Charities & Not-for-Profit -->
                    <article class="group relative flex min-h-[300px] flex-col justify-between overflow-hidden rounded-3xl border border-slate-200 bg-[#f1f5f9] p-6 shadow-sm transition-shadow hover:shadow-md sm:p-8 lg:h-[420px]">
                        <img src="<?php echo esc_url($figma . '/industry-charities.png'); ?>" alt="Charities and Not-for-Profit Sector" loading="lazy" decoding="async" class="absolute bottom-0 left-0 h-[77%] w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                        <div class="absolute inset-0" style="background:linear-gradient(to bottom, #2c8d9d 21.667%, rgba(44,141,157,0) 38.929%);"></div>

                        <div class="relative z-10 text-white">
                            <h3 class="mb-2 font-display text-xl leading-tight font-semibold sm:mb-3 sm:text-[24px] lg:leading-[1.32]">Charities &amp; Not-for-Profit</h3>
                            <p class="text-sm leading-relaxed sm:text-[16px] lg:leading-[1.42]">Impactful campaigns and cost-efficient production that help your message reach more supporters.</p>
                        </div>

                        <a href="#" class="relative z-10 mt-auto pt-6 flex w-fit items-center gap-1.5 text-sm font-medium text-foreground transition-colors group-hover:text-[#1ecad3] before:absolute before:inset-0 before:-m-8"> Explore Site </a>
                    </article>
                </div>

                <!-- Government (tall wide) -->
                <article class="group relative flex min-h-[300px] flex-1 flex-col justify-between overflow-hidden rounded-3xl border border-slate-100 p-6 shadow-sm transition-shadow hover:shadow-md sm:p-8 lg:h-[346px]">
                    <img src="<?php echo esc_url($figma . '/industry-government.png'); ?>" alt="Government Sector" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(3,21,22,0) 43%, rgba(3,21,22,0.52) 58%, #2c8d9d 93%);"></div>

                    <div class="relative z-10 text-white">
                        <h3 class="mb-2 font-display text-xl leading-tight font-semibold sm:mb-3 sm:text-[24px] lg:leading-[1.32]">Government</h3>
                        <p class="max-w-[90%] text-sm leading-relaxed sm:text-[16px] lg:leading-[1.42]">Impactful campaigns and cost-efficient production that help your message reach more supporters.</p>
                    </div>

                    <a href="#" class="relative z-10 mt-auto pt-6 flex w-fit items-center gap-1.5 text-sm font-medium text-white transition-colors group-hover:text-[#1ecad3] before:absolute before:inset-0 before:-m-8"> Explore Site </a>
                </article>
            </div>
        </div>
    </div>
</section>