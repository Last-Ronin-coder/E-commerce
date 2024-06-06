<div id="newspaper" class="z-20 fixed w-screen h-screen hidden items-center justify-center">
    <div id="newspaperOverlay" class="z-10 fixed top-0 w-screen h-screen bg-[#00000066]"></div>
    <div id="newspaperBox" class="z-20 w-4/5 lg:w-3/6 h-2/5 lg:h-3/5 bg-white flex items-center rounded-md overflow-hidden border shadow-md">
        <div class="hidden md:flex md:w-1/2 h-full">
            <img class="w-full h-full" src="https://images.unsplash.com/photo-1626840362735-afb64615318d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGJpa2VzfGVufDB8fDB8fHww" alt="newsletter" />
        </div>
        <div class="w-full md:w-1/2 h-full flex flex-col justify-center p-12 px-8 gap-4 relative">
            <button class="closeButton absolute top-4 right-4 text-2xl hover:text-red-500">
                <ion-icon name="close-circle-outline"></ion-icon>
            </button>
            <h3 class="text-xl font-bold text-gray-800">
                Subscribe Newsletter.
            </h3>
            <p class="text-md text-gray-600 font-semibold">
                Subscribe the
                <span class="text-lg font-semibold">Anon</span> to get
                latest products and discount update.
            </p>
            <input class="border p-2" type="email" placeholder="Email Address" />
            <button class="rounded-md self-center py-2 px-3 bg-gray-900 text-white hover:bg-red-500">
                SUBSCRIBE
            </button>
        </div>
    </div>
</div>